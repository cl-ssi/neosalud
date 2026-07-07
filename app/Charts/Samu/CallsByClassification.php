<?php

namespace App\Charts\Samu;

use App\Models\Commune;
use App\Models\Samu\Call;
use Illuminate\Support\Carbon;

class CallsByClassification
{
    public $year;
    public $month;
    public $mobilesFilter;
    public $classificationFilter;
    public $dataset;
    public $legend;


    /**
     * Initializes the chart.
     *
     * @param  string  $year
     * @param  string  $month
     * @return void
     */
    public function __construct($year = null, $month = null, $mobilesFilter = 'all', $classificationFilter = 'all')
    {
        $this->year = $year ?? now()->year;
        $this->month = $month ?? now()->month;
        $this->mobilesFilter = $mobilesFilter;
        $this->classificationFilter = $classificationFilter;

        $this->setDataset();
    }

    /**
     * Set the data stats
     *
     * @return void
     */
    public function setDataset()
    {
        $start = Carbon::parse("$this->year/$this->month/01");
        $start = $start->startOfMonth();

        $end = $start->copy()->endOfMonth();

        // Obtener las comunas
        $communes = Commune::select('id', 'name')->get();

        // Preparar los datos
        $records = Call::query()
            ->selectRaw('count(*) as total, classification, commune_id')
            ->groupBy('classification', 'commune_id')
            ->whereNull('call_id')
            ->whereBetween('hour', [$start, $end])

            ->when($this->mobilesFilter === 'samu', function ($query) {
                $query->whereHas('events.mobile', function ($query) {
                    $query->where('managed', 1);
                });
            })
            ->when($this->classificationFilter === 't1_t2', function ($query) {
                $query->whereIn('classification', ['T1', 'T2']);
            })
            ->get();

        // Inicializar array para los datos
        $data = [];

        // Inicializar array para rastrear comunas con registros
        $communeHasRecords = array_fill(0, count($communes), false);

        // Inicializar array para totales por clasificación
        $totalsByClassification = [];

        // Agrupar los datos por clasificación
        $groupedData = [];
        foreach ($records as $record) {
            if ($record->total === 0 || $record->total === null) {
                continue;
            }

            if (!isset($groupedData[$record->classification])) {
                $groupedData[$record->classification] = array_fill(0, count($communes), 0); // Inicializar en 0
            }

            foreach ($communes as $index => $commune) {
                if ($commune->id == $record->commune_id) {
                    $groupedData[$record->classification][$index] += $record->total;
                    $communeHasRecords[$index] = true;
                }
            }

            if (!isset($totalsByClassification[$record->classification])) {
                $totalsByClassification[$record->classification] = 0;
            }
            $totalsByClassification[$record->classification] += $record->total;
        }

        $filteredCommunes = [];
        $filteredIndexes = [];
        foreach ($communes as $index => $commune) {
            if ($communeHasRecords[$index]) {
                $filteredCommunes[] = $commune->name;
                $filteredIndexes[] = $index;
            }
        }

        $header = array_merge(['Classification'], $filteredCommunes, ['Total', ['role' => 'tooltip', 'type' => 'string', 'p' => ['html' => true]]]);
        $data[] = $header;

        foreach ($groupedData as $classification => $communeTotals) {
            $filteredTotals = [];
            $total = $totalsByClassification[$classification] ?? 0;
            foreach ($filteredIndexes as $index) {
                $filteredTotals[] = $communeTotals[$index];
            }

            $filteredTotals[] = 0; // Añadir un valor nulo para la columna 'Total' que no debe graficarse

            $tooltip = $total;
            $row = array_merge([$classification], $filteredTotals, [$tooltip]);
            $data[] = $row;
        }

        $this->dataset = $data;
    }

    /**
     * Get the dataset
     *
     * @return array
     */
    public function getDataset()
    {
        return $this->dataset;
    }
}
