<?php

namespace App\Livewire\Cup;

use App\Models\krugi\Cup;
use Livewire\Component;
use Livewire\WithFileUploads;

class CupCreate extends Component
{

    use WithFileUploads;

    public $name, $lat, $lon;
    public $img = [];

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'lat' => 'nullable|numeric',
            'lon' => 'nullable|numeric',
            'img.*' => 'nullable|image|max:2048', // max 2MB per file
        ]);

        $data = [
            'name' => $this->name,
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];

        // Сохраняем картинки (до 10 штук)
        for ($i = 1; $i <= 10; $i++) {
            if (isset($this->img[$i])) {
                $path = $this->img[$i]->store("krugi/cups", "public");
                $data["img{$i}"] = $path;
            }
        }

        Cup::create($data);

        $this->reset();
        session()->flash('success', 'Кружка успешно добавлена!');
    }

    public function render()
    {
        return view('livewire.cup.cup-create');
    }
}
