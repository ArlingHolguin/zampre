<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Illuminate\Validation\Rule;
use Livewire\Component;




class ContactProfile extends Component
{
    public $phone;
    public $address;
    public $city;
    public $profile;
    public $document_type;
    public $document_number;

    public function mount()
    {
        $userAuth = auth()->user()->profile;
        $this->phone = $userAuth ? $userAuth->phone : '';
        $this->address = $userAuth ? $userAuth->address : '';
        $this->city = $userAuth ? $userAuth->city : '';
        $this->document_type = $userAuth ? $userAuth->document_type : '';
        $this->document_number = $userAuth ? $userAuth->document_number : '';
        $this->profile = Profile::where('user_id', auth()->user()->id)->first();
    }

   

    public function updateProfileContact()
{        
    $this->validate([
        'phone' => 'required|numeric',
        'address' => 'required',
        'city' => 'required',
        'document_type' => 'required',
        'document_number' => [
            'required',
            'numeric',
            Rule::unique('profiles')->where(function ($query) {
                // Excluir el perfil actual de la consulta
                return $query->where('document_type', $this->document_type)
                             ->where('document_number', $this->document_number)
                             ->where('id', '!=', $this->profile->id); 
            })
        ]
    ]);        

    // Actualizar los datos del perfil
    $this->profile->update([
        'phone' => $this->phone,
        'address' => $this->address,
        'city' => $this->city,
        'document_type' => $this->document_type,
        'document_number' => $this->document_number
    ]);

    // Emitir evento de guardado exitoso
    $this->emit('saved');
}

    

    public function render()
    {
        return view('livewire.profile.contact-profile');
    }
}
