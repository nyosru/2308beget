<form wire:submit.prevent="save" enctype="multipart/form-data">
    @csrf
    <div>
        <label>Название</label>
        <input type="text" wire:model="name">
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label>Широта (lat)</label>
        <input type="text" wire:model="lat">
        @error('lat') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label>Долгота (lon)</label>
        <input type="text" wire:model="lon">
        @error('lon') <span>{{ $message }}</span> @enderror
    </div>
    @for($i = 1; $i <= 10; $i++)
        <div>
            <label>Картинка {{ $i }}</label>
            <input type="file" wire:model="img.{{ $i }}">
            @error('img.'.$i) <span>{{ $message }}</span> @enderror
        </div>
    @endfor
    <button type="submit">Добавить</button>
</form>
