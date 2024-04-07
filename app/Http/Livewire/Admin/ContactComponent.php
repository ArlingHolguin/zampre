<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class ContactComponent extends Component
{
    public $celular, $email;


    public function mount()
    {
        $settings = Setting::first();
        if ($settings && $settings->contact) {
            $contact = json_decode($settings->contact, true);
            $this->celular = $contact['celular'] ?? '';
            $this->email = $contact['email'] ?? '';
        }
    }

    public function save()
    {
        $this->validate([
            'celular' => 'required|numeric|digits:10',
            'email' => 'required|email',
        ]);

        $settings = Setting::first() ?? new Setting;
        $settings->contact = json_encode([
            'celular' => $this->celular,
            'email' => $this->email,
        ]);
        $settings->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.contact-component');
    }
}
