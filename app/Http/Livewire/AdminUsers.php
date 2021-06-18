<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Admin\UserController;
use Livewire\Component;

use App\Models\User;

//paginación livewire
use Livewire\WithPagination;

class AdminUsers extends Component
{
    use WithPagination;
    //adminLTE (paginación carga mal pq usa tailwin)
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->search.'%')
            ->orWhere('email','LIKE','%'.$this->search.'%')
            ->paginate(8);
        return view('livewire.admin-users',compact('users'));
    }

    //con esto se corrige los resultados de una busqueda nueva sobre una pagina anterior.
    public function limpiar_page(){
        //page es una propiedad de WithPagination
        $this->reset('page');
    }
}
