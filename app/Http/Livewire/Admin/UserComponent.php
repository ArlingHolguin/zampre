<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserComponent extends Component
{
    use WithPagination;

    public $search;
    public $open = false;
    public $role;
    public $roles;
    public $user;

    protected $rules = [
        'role' => 'required'
    ];
    
    public function mount(){
        $this->roles = Role::all();
        $this->user = new User();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(User $user)
    {
        $this->user = $user;
       $this->open = true;
        $role = $user->roles->first();
        $this->role = $role ? $role->name : null;


    }

    public function save()
    {
        $this->validate();
        // dd($this->role, $this->user);
        $this->user->syncRoles($this->role);
        // $this->user->assignRole($this->role); asigna varios roles
        
        $this->open = false;
        $this->emit('render');
       
    }

    public function render()
    {
        // $users = User::paginate(10);
        //consulra para habilitar el searh en la tabla
        
            $users = User::where('id', '<>', auth()->user()->id)
            ->where(function($query){
                $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
            })->paginate(10);
        
        return view('livewire.admin.user-component', compact('users'))->layout('layouts.admin');
    }
}
