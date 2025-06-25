<?php

namespace App\Http\Livewire\Samu;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Samu\Shift;
use App\Models\Samu\Noveltie;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class Novelties extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $date; // Para el filtro principal de la tabla

    public $openShift;

    // Propiedades para el modal de PDF
    public $showPdfModal = false;
    public $pdfDate;
    public $pdfPeriod = 'all'; // Opciones: 'all', 'morning', 'afternoon', 'night'

    /**
     * mount
     */
    public function mount()
    {
        $this->openShift = Shift::where('status', true)->first();
        // $this->date ya no se inicializa aquí para no forzar el filtro
        // $this->pdfDate se inicializará cuando se abra el modal
    }

    public function render()
    {
        $query = Noveltie::with('shift', 'creator')->latest();

        if ($this->search) {
            $query->where('detail', 'like', '%' . $this->search . '%');
        }

        // Aplicar filtro de fecha solo si $this->date tiene un valor
        if ($this->date) {
            $query->whereDate('created_at', $this->date);
        }

        $novelties = $query->paginate(25);

        return view(
            'livewire.samu.novelties',
            [
                'novelties' => $novelties
            ]
        );
    }

    public function openPdfModal()
    {
        $this->pdfDate = Carbon::today()->format('Y-m-d'); // Por defecto la fecha de hoy para el modal
        $this->pdfPeriod = 'all'; // Por defecto todos los periodos
        $this->showPdfModal = true;
    }

    public function closePdfModal()
    {
        $this->showPdfModal = false;
    }

    public function exportSelectedPdf()
    {
        if (!$this->pdfDate) {
            // Opcional: mostrar un error o simplemente no hacer nada si la fecha no está seleccionada
            session()->flash('error', 'Por favor, seleccione una fecha para el PDF.');
            return;
        }

        $targetDate = Carbon::parse($this->pdfDate);

        $query = Noveltie::with('creator')
            ->whereDate('created_at', $targetDate)
            ->orderBy('created_at', 'asc');

        // Aplicar filtro de período si no es 'all'
        if ($this->pdfPeriod != 'all') {
            $query->where(function ($q) {
                if ($this->pdfPeriod == 'morning') {
                    $q->whereTime('created_at', '>=', '08:00:00')
                        ->whereTime('created_at', '<=', '16:59:59');
                } elseif ($this->pdfPeriod == 'afternoon') {
                    $q->whereTime('created_at', '>=', '17:00:00')
                        ->whereTime('created_at', '<=', '23:59:59');
                } elseif ($this->pdfPeriod == 'night') {
                    $q->whereTime('created_at', '>=', '00:00:00')
                        ->whereTime('created_at', '<=', '07:59:59');
                }
            });
        }

        $noveltiesOfTheDay = $query->get();

        $morningNovelties = collect();
        $afternoonNovelties = collect();
        $nightNovelties = collect();

        if ($this->pdfPeriod == 'all' || $this->pdfPeriod == 'morning') {
            $morningNovelties = $noveltiesOfTheDay->filter(function ($noveltie) {
                $hour = $noveltie->created_at->hour;
                return $hour >= 8 && $hour < 15;
            });
        }

        if ($this->pdfPeriod == 'all' || $this->pdfPeriod == 'afternoon') {
            $afternoonNovelties = $noveltiesOfTheDay->filter(function ($noveltie) {
                $hour = $noveltie->created_at->hour;
                return $hour >= 15 && $hour <= 23;
            });
        }

        if ($this->pdfPeriod == 'all' || $this->pdfPeriod == 'night') {
            $nightNovelties = $noveltiesOfTheDay->filter(function ($noveltie) {
                $hour = $noveltie->created_at->hour;
                return $hour >= 0 && $hour <= 7;
            });
        }

        // Si se seleccionó un período específico y no hay novedades para ese período,
        // las otras colecciones estarán vacías, lo cual es correcto para la vista PDF.

        $periodTitle = match ($this->pdfPeriod) {
            'morning' => 'Mañana',
            'afternoon' => 'Tarde',
            'night' => 'Noche',
            default => 'Todos los Períodos'
        };

        $data = [
            'date' => $targetDate->format('d/m/Y'),
            'period' => $periodTitle,
            'pdfPeriod' => $this->pdfPeriod,
            'showAllPeriods' => ($this->pdfPeriod == 'all'),
            'morningNovelties' => $morningNovelties,
            'afternoonNovelties' => $afternoonNovelties,
            'nightNovelties' => $nightNovelties,
        ];

        $filename = 'novedades_' . str_replace(' ', '_', strtolower($periodTitle)) . '_' . $targetDate->format('Y_m_d') . '.pdf';

        $pdf = Pdf::loadView('samu.noveltie.pdf', $data);

        $this->closePdfModal(); // Cerrar el modal después de generar

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename);
    }
}
