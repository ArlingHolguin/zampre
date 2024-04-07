<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class SocialComponent extends Component
{

    public $selectedTab = 'instagram';
    public $instagramName, $instagramUrl;
    public $facebookName, $facebookUrl;
    public $whatsappNumber, $whatsappUrl;

    public function mount()
    {
        $settings = Setting::first();
        $socialData = $settings->social ? json_decode($settings->social, true) : [];

        // Asegúrate de que estas líneas coincidan con las estructuras de datos en tu base de datos
        $this->instagramUrl = $socialData['instagram']['url'] ?? '';
        $this->facebookUrl = $socialData['facebook']['url'] ?? '';
        $this->whatsappUrl = $socialData['whatsapp']['url'] ?? '';
    }

    public function setTab($tabName)
    {
        $this->selectedTab = $tabName;
    }



    public function save()
    {
        // Validar los campos segun el tab seleccionado
        if ($this->selectedTab == 'instagram') {
            $this->validate([
                'instagramUrl' => 'required|url',
            ]);
        } elseif ($this->selectedTab == 'facebook') {
            $this->validate([
                'facebookUrl' => 'required|url',
            ]);
        } elseif ($this->selectedTab == 'whatsapp') {
            $this->validate([
                'whatsappUrl' => 'required|numeric|digits:10',
            ]);
        }

        // dd($this->instagramUrl, $this->facebookUrl, $this->whatsappUrl);    


        $settings = Setting::first() ?? new Setting;

        $settings = Setting::first() ?? new Setting;
        $socialData = $settings->social ? json_decode($settings->social, true) : [];

        // Actualizar los datos de la red social seleccionada
        if ($this->selectedTab == 'instagram') {
            $socialData['instagram'] = [
                'url' => $this->instagramUrl,
            ];
        } elseif ($this->selectedTab == 'facebook') {
            $socialData['facebook'] = [
                'url' => $this->facebookUrl,
            ];
        } elseif ($this->selectedTab == 'whatsapp') {
            $socialData['whatsapp'] = [
                'url' => $this->whatsappUrl,
            ];
        }

        // Convertir el array socialData de nuevo a JSON y guardarlo
        $settings->social = json_encode($socialData);
        $settings->save();

        $this->emit('saved');
    }



    public function render()
    {
        return view('livewire.admin.social-component');
    }
}
