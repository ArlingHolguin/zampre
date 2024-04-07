<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AddressComponent extends Component
{
    public $departamento, $ciudad, $direccion;

    public function mount()
    {
        $settings = Setting::first();
        if ($settings && $settings->address) {
            $address = json_decode($settings->address, true);
            $this->departamento = $address['departamento'] ?? '';
            $this->ciudad = $address['ciudad'] ?? '';
            $this->direccion = $address['direccion'] ?? '';
        }
    }

    public function save()
    {
        $this->validate([
            'departamento' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
        ]);

        $settings = Setting::first() ?? new Setting;
        $settings->address = json_encode([
            'departamento' => $this->departamento,
            'ciudad' => $this->ciudad,
            'direccion' => $this->direccion
        ]);
        $settings->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.address-component');
    }
}
