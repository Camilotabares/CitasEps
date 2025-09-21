<x-admin-layout 
title="Usuarios|CitasEps"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Usuarios',
        'href' => route('admin.users.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
]">

<x-wire-card>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
    
        <div class="space-y-4">
            <div class="grid lg:grid-cols-2 gap-4">
                <x-wire-input
                name="name"
                label="Nombre"
                placeholder="Nombre del usuario"
                required
                :value="old('name')"
                />
    
    
                <x-wire-input
                name="email"
                label="Correo Electrónico"
                type="email"
                placeholder="Correo Electrónico del usuario"
                required    
                :value="old('email')"
                />
                <x-wire-input
                name="password"
                label="Contraseña"
                type="password"
                placeholder="Contraseña del usuario"
                required
                />
                <x-wire-input
                name="password_confirmation"
                label="Confirmar Contraseña"
                type="password"
                placeholder="Confirma la contraseña del usuario"
                required
                />
                {{-- DNI --}}
                <x-wire-input
                name="dni"
                label="DNI"
                placeholder="DNI del usuario"
                required
                :value="old('dni')"
                />
                {{-- Phone --}}
                <x-wire-input
                name="phone"
                label="Teléfono"
                placeholder="Teléfono del usuario"
                required
                :value="old('phone')"
                />
            </div>
            {{-- Address --}}
            <x-wire-input
            name="address"
            label="Dirección"
            placeholder="Dirección del usuario"
            required
            :value="old('address')"
            />
            {{-- Role --}}
            <x-wire-native-select name="role_id" label="Rol">
                <option value="">
                    Seleccione un rol
                </option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id}}" @selected(old('role_id')==$role->id) >  
                        {{ $role->name }}
                    </option>
                @endforeach
            </x-wire-native-select>
            
            <div class="flex justify-end">
                <x-wire-button type="submit" blue >
                    Guardar 
                </x-wire-button>
            </div>
        </div>
    </form>
</x-wire-card>


</x-admin-layout>