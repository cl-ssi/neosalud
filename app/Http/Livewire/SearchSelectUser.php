<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;


class SearchSelectUser extends Component
{
    /** Uso:
     * @livewire('search-select-user')
     *
     * Se puede definir el nombre del campo que almacenará el id de usuario
     * @livewire('search-select-user', ['selected_id' => 'user_id'])
     *
     * Si necesitas que aparezca precargado el usuario
     * @livewire('search-select-user', ['user' => $user])
     */
    public $query;
    public $users;
    /** Para cuando viene precargado */
    public $user;
    public $selectedName;
    public $selected_id = 'user_id';
    public $msg_too_many;

    public function resetx()
    {
        $this->query = '';
        $this->users = [];
        $this->user = null;
        $this->selectedName = null;
    }

    public function mount()
    {
        if($this->user) {
            $this->setUser($this->user);
        }
    }

    public function setUser(User $user)
    {
        $this->resetx();
        $this->user = $user;
        $this->selectedName = $user->officialFullName;
    }

    public function updatedQuery()
    {
        $this->users = User::getUsersBySearch($this->query)
            ->get()
            ->sortBy('actualOfficialHumanName.text');

        /** Más de 50 resultados  */
        if(count($this->users) >= 25)
        {
            $this->users = [];
            $this->msg_too_many = true;
        }
        else {
            $this->msg_too_many = false;
        }
    }

    public function render()
    {
        return view('livewire.search-select-user');
    }
}
