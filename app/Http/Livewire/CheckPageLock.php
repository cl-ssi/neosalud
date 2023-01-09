<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageLock;

class CheckPageLock extends Component
{ 
    /**
     * Modo de uso:
     * Time: tiempo de bloqueo, esto enviara peticiones cada x tiempo 
     *       para mantener bloqueada la página, evitar tiempos muy pequeños
     *       ya que bombardeará con trafico e inserts en la bd.
     * Path: es la url que se quiere bloquear, por defecto es la actual = path()
     * 
     *  @livewire('check-page-lock', [
     *    'time' => 30,
     *    'path' => request()->path()
     *  ])
     */
    public $time;

    public $pageLock;

    /**
    * Mount
    */
    public function mount($time, $path)
    {
        $this->time = $time;
        $this->pageLock = PageLock::firstOrCreate(
            [
                'path' => $path
            ],
            [
                'locked_to' => now()->addSeconds($this->time),
                'user_id' => auth()->id()
            ]);

        if($this->pageLock->locked_to < now() AND $this->pageLock->user_id != auth()->id()) {
            $this->pageLock->user_id = auth()->id();
            $this->pageLock->locked_to = now()->addSeconds($this->time + 5);
            $this->pageLock->save();
        }
    }

    /**
    * Keep Alive
    */
    public function keepAlive()
    {
        $this->pageLock->locked_to = now()->addSeconds($this->time + 5);
        $this->pageLock->save();
    }

    public function render()
    {
        return view('livewire.check-page-lock');
    }
}
