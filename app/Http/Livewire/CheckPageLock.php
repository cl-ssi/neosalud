<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PageLock;

class CheckPageLock extends Component
{ 
    /**
     * Modo de uso:
     * Path: es la url que se quiere bloquear, por defecto es la actual = path()
     * Time: tiempo de bloqueo, esto enviara peticiones cada x tiempo 
     *       para mantener bloqueada la página, evitar tiempos muy pequeños
     *       ya que bombardeará con trafico e inserts en la bd.
     * 
     *  @livewire('check-page-lock', [
     *    'path' => request()->path(),
     *    'time' => 30
     *  ])
     */
    public $time;

    public $model;
    public $locked = true;

    /**
    * Mount
    */
    public function mount($path, $time)
    {
        $this->time = $time;
        $this->model = PageLock::firstOrCreate(
            [
                'path' => $path
            ],
            [
                'locked_to' => now()->addSeconds($this->time),
                'user_id' => auth()->id()
            ]);

        if($this->model->locked_to < now() AND $this->model->user_id != auth()->id()) {
            $this->model->user_id = auth()->id();
            $this->model->locked_to = now()->addSeconds($this->time + 5);
            $this->model->save();
        }
    }

    /**
    * Keep Alive
    */
    public function keepAlive()
    {
        $this->model->locked_to = now()->addSeconds($this->time + 5);
        $this->model->save();
    }

    public function render()
    {
        // app('debugbar')->info(now());
        return view('livewire.check-page-lock');
    }
}
