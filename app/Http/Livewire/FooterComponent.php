<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class FooterComponent extends Component
{
    public $socialLinks = [];

    public function mount()
    {
        $settings = Setting::first();
        if ($settings && $settings->social) {
            $this->socialLinks = json_decode($settings->social, true);
        }
    }

    public function render()
    {
        return view('livewire.footer-component');
    }
}
