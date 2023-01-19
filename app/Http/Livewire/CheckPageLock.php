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
     * backRoute: es el nombre de la ruta a la que se irá al presionar el boton "Volver"
     * 
     * ejemplo:
     * 
     *  @livewire('check-page-lock', [
     *    'time' => 30,
     *    'backRoute' => 'samu.welcome'
     *  ])
     */
    
    public $time;

    public $pageLock;
    public $backRoute;

    /**
    * Mount
    */
    public function mount($time, $backRoute)
    {
        $this->time = $time;
        $this->backRoute = $backRoute;

        $this->pageLock = PageLock::firstOrCreate(
            [
                'path' => request()->path()
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
