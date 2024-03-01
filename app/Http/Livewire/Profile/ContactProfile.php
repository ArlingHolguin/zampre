<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;




class ContactProfile extends Component
{
    public $phone;
    public $address;
    public $city;
    public $empresa;
    public $document_type;
    public $document_number;

    public function mount()
    {
        $userAuth = auth()->user()->profile;
        $this->phone = $userAuth ? $userAuth->phone : '';
        $this->address = $userAuth ? $userAuth->address : '';
        $this->city = $userAuth ? $userAuth->city : '';
        $this->empresa = $userAuth ? $userAuth->empresa : '';
        $this->document_type = $userAuth ? $userAuth->document_type : '';
        $this->document_number = $userAuth ? $userAuth->document_number : '';
    }

   

    public function updateProfileContact()
    {
        // $this->validate([
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'city' => 'required',
        //     'empresa' => '',
        //     'document_type' => 'required|unique_with:profiles,document_number',
        //     'document_number' => 'required|min:6,max:15',
        // ]);

        $this->validate([
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'empresa' => 'nullable',
            'document_type' => 'required|unique_with:profiles,document_number',            
            'document_number' => 'required|min:6,max:15',
        ]);

       
        


        Profile::updateOrCreate(
            ['user_id' => auth()->user()->id],
            
            ['phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'empresa' => $this->empresa,
            'document_type' => $this->document_type,
            'document_number' => $this->document_number
            ]           
            
        );

        $this->emit('updateProfileContact');
    }

    public function render()
    {
        return view('livewire.profile.contact-profile');
    }
}
