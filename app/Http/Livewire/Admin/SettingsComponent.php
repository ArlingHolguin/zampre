<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingsComponent extends Component
{

    use WithFileUploads;

    public $banner_name;
    public $banner_image;
    public $rand;
    public $items = [];

    public function mount(){
        $this->items = $this->getBanners();
        $this->rand = rand();

    }

    public function getBanners(){
        $settings = Setting::first();
        if($settings){
            $banners = json_decode($settings->banner, true);
            return $banners;
        }
    }

    public function save()
    {
        $this->validate([
            'banner_name' => 'required',
            'banner_image' => 'mimes:jpg,bmp,png|max:1024|dimensions:width=1200,height=300',
        ]);

        if ($this->banner_image) {
            // Almacenar la imagen y obtener el nombre del archivo
            $imageName = $this->banner_image->store('banners', 'public');

            // Obtener los datos actuales del banner
            $settings = Setting::first() ?? new Setting;
            // Decodificar el JSON existente a un array de PHP, o iniciar un array vacío si no hay datos
            $currentBanners = $settings->banner ? json_decode($settings->banner, true) : [];

            // Crear un nuevo elemento de banner
            $newBannerItem = [
                'name' => $this->banner_name,
                'image' => $imageName,
            ];

            // Añadir el nuevo ítem al array de banners
            array_push($currentBanners, $newBannerItem);

            // Codificar de nuevo a JSON y guardar en la base de datos
            $settings->banner = json_encode($currentBanners);
            $settings->save();
            $this->rand = rand();
            //limpiar los campos del formulario
            $this->banner_name = '';
            $this->banner_image = '';
            $this->emit('saved');
        }
    }

    public function deleteBanner($imagePath)
{
    // Obtener los banners actuales
    $settings = Setting::first();
    if($settings) {
        $currentBanners = json_decode($settings->banner, true);

        // Filtrar para eliminar el ítem seleccionado
        $currentBanners = array_filter($currentBanners, function ($item) use ($imagePath) {
            return $item['image'] != $imagePath;
        });

        // Actualizar los banners en la base de datos
        $settings->banner = json_encode(array_values($currentBanners));
        $settings->save();

        // Actualizar la propiedad de ítems
        $this->items = $this->getBanners();
    }
}


    public function render()
    {
        $this->items = $this->getBanners(); 
        return view('livewire.admin.settings-component')->layout('layouts.admin');
    }
}
