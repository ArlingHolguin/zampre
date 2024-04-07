<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use App\Models\UserContact;
use Livewire\Component;

class WhatsappContactForm extends Component
{
    public $showForm = false;
    public $name;
    public $phone;
    public $whatsappNumber;

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|numeric|digits:10',
    ];

    public function mount()
{
    $settings = Setting::first();
    if ($settings && $settings->social) {
        $socialLinks = json_decode($settings->social, true);

        // Verifica si existe la clave 'whatsapp' y asigna el número
        if (isset($socialLinks['whatsapp']['url'])) {
            $this->whatsappNumber = $socialLinks['whatsapp']['url'];
        }
    }
}


    public function submitForm()
    {
        $this->validate();

        // Guardar en la base de datos
        UserContact::create([
            'name' => $this->name,
            'phone' => $this->phone,
        ]);

        // Redirigir a WhatsApp
        return redirect()->to("https://wa.me/{$this->whatsappNumber}?text=Hola, mi nombre es {$this->name}. Quiero mas informacion sobre: ");
    }

    public function render()
    {
        return view('livewire.whatsapp-contact-form');
    }
}
