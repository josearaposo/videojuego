<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="mb-3">
        <label for="distribuidora" class="form-label">Distribuidora</label>
        <select class="form-control" wire:model.live="distrId">
            <option value="">Seleccione</option>
            @foreach ($distribuidoras as $distribuidora )
            <option value="{{ $distribuidora->id }}"> {{ $distribuidora->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="desarrolladora" class="form-label">Desarrolladora</label>
        <select class="form-control" wire:model.live="desarId">
            <option value="">Seleccione</option>
            @foreach ($desarrolladoras as $desarrolladora )
            <option value="{{ $desarrolladora->id }}"> {{ $desarrolladora->nombre }}</option>
            @endforeach
        </select>
    </div>
</div>
