<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;

class CarouselHome extends Component
{
    public $banners = [];

    public function mount()
    {
        $settings = Setting::first();
        if ($settings && $settings->banner) {
            $this->banners = json_decode($settings->banner, true);
        }
    }
    public function render()
    {
        return view('livewire.carousel-home');
    }
}
