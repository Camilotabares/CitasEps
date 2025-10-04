<div>
    <x-wire-card>
        <p class="text-xl font-semibold mb-1 text-slate-800">
            Buscar Disponibilidad
        </p>

        <p class="mt-4">
            Encuentra el horario perfecto para tu cita 
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4 mt-4">
            <x-wire-input
                label="Fecha"
                type="date"
                wire:model="search.date"
                placeholder="Selecciona una fecha"
            />

            <x-wire-select
                label="Hora"
                wire:model="search.hour"
                placeholder="Seleccione una hora">
            
                @foreach($this->hourBlocks as $hourBlock)
                <x-wire-select.option
                    :label="$hourBlock->format('H:i:s') . ' - ' . $hourBlock->copy()->addMinutes(60)->format('H:i:s')"
                    :value="$hourBlock->format('H:i:s')"
                />
                @endforeach
            </x-wire-select>

            <x-wire-select
                label="Especialidad Opcional"
                wire:model="search.speciality_id"
                placeholder="Seleccione una especialidad">
        
                @foreach($specialities as $speciality)
                <x-wire-select.option
                    :label="$speciality->name"
                    :value="$speciality->id"
                />
                @endforeach
            </x-wire-select>

            <div class="lg:pt-6">
                <x-wire-button
                    class=" w-full"
                    wire:click="searchAvailability"
                    color="primary"
                >
                    <i class="fa-solid fa-magnifying-glass"></i>
                    Buscar Disponibilidad 
                </x-wire-button>
            </div>
        </div>
    </x-wire-card>
</div>
