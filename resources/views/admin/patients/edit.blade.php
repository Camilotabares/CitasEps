<x-admin-layout 
title="Pacientes |Citas Eps"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Pacientes',
        'href' => route('admin.patients.index'),
    ],
    [
        'name' => 'Editar',
    
    ]
]">

<form action="{{route('admin.patients.update',$patient) }}" method="POST">
    @csrf
    @method('PUT')

    <form action="{{ route('admin.patients.update',$patient)}}" method="POST">
        @csrf
        @method('PUT')
        <x-wire-card>
            <div class=" lg:flex lg:justify-between lg:items-center">
                <div class="flex items-center space-x-5">
                    <img src="{{ $patient->user->patient->user->profile_photo_url }}" class="h-20 w-20 rounded-full object-cover object-center" alt="{{ $patient->user->name }}">
                    <div>
                        <p class="text-2x1 font-bold space-x text-gray-900">
                            {{ $patient->user->name }}
                        </p>
                    </div>
                </div>
                <div class="flex  space-x-3 mt-6 lg:mt-0">
                    <x-wire-button outline gray href="{{ route('admin.patients.index') }}">
                        Volver
                    </x-wire-button>
    
                    <x-wire-button type="submit" >
                        <i class="fa-solid fa-check"></i>
                        Guardar Cambios 
                    </x-wire-button>

                </div>
            </div>

            
            {{-- Tabs --}}
        </x-wire-card>
        <x-wire-card class="mb-6">
        <x-tabs active="datos-personales">
            
                <x-slot name="header">
                        <x-tab-link tab="datos-personales">
                        {{-- class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"--}}> 
                            <i class="fa-solid fa-user me-2"></i>
                            Datos Personales 
                        </x-tab-link>
                    <li class="me-2">
                        <a href="#"
                        x-on:click="tab='antecedentes'"
                        :class="{
                            'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group': tab === 'antecedentes',
                            'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group': tab !== 'antecedentes'
                        }"
                        {{-- class="inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group" aria-current="page"--}}> 
                            <i class="fa-solid fa-file-lines m-2"></i>
                            Antecendentes
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#"
                        x-on:click="tab='informacion-general'"
                        :class="{
                            'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group': tab === 'informacion-general',
                            'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group': tab !== 'informacion-general'
                        }"
                        {{-- class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"--}}> 
                            <i class="fa-solid fa-info me-2"></i>
                            Informacion General
                        </a>
                    </li>
                    <li class="me-2">
                        <a href="#"
                        x-on:click="tab='contacto-emergencia'"
                        :class="{
                            'inline-flex items-center justify-center p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active dark:text-blue-500 dark:border-blue-500 group': tab === 'contacto-emergencia',
                            'inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group': tab !== 'contacto-emergencia'
                        }" 
                        {{-- class="inline-flex items-center justify-center p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 group"--}}> 
                            <i class="fa-solid fa-heart me-2"></i>
                            Contacto de Emergencia 
                        </a>
                    </li>
                </x-slot>

                {{-- Datos Personales  --}}
                <div x-show="tab === 'datos-personales'">
                    <x-wire-alert info title="Edicion de Usuario" class="mb-4">
                        
                            <p>Para editar esta informacion, por favor dirigete al <a href="{{ route('admin.users.edit',$patient->user) }}"
                                class="text-indigo-500 hover:underline" 
                                target="_blank">
                                Perfil de Usuario
                                </a> 
                                asociado a este paciente
                            </p>
                        
                    </x-wire-alert>
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">
                                Telefono:
                            </span>
                            <span class="text-gray-900 text-sm ml-1">
                                {{ $patient->user->phone }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">
                                Email:
                            </span>
                            <span class="text-gray-900 text-sm ml-1">
                                {{ $patient->user->email }}
                            </span>
                        </div>
                        <div>
                            <span class="text-gray-500 font-semibold text-sm">
                                Direccion:
                            </span>
                            <span class="text-gray-900 text-sm ml-1">
                                {{ $patient->user->address }}
                            </span>
                        </div>
                        
                    </div>
                </div>
                {{-- Antecedentes --}}
                <div x-show="tab === 'antecedentes'">
                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-wire-textarea class=font-semibold 
                            label="Alergias Conocidas"
                            name="allergies">
                            {{ old('allergies',$patient->allergies) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea 
                            label="Enfermedades Cronicas"
                            name="Chronic_conditions">
                            {{ old('Chronic_conditions',$patient->Chronic_conditions) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea 
                            label="Antecedentes Quirurgicos"
                            name="surgical_history">
                            {{ old('surgical_history',$patient->surgical_history) }}
                            </x-wire-textarea>
                        </div>
                        <div>
                            <x-wire-textarea 
                            label="Antecedentes familiares"
                            name="family_history">
                            {{ old('family_history',$patient->family_history) }}
                            </x-wire-textarea>
                        </div>
                    </div>
                    
                </div>
                {{-- Informacion General --}}
                <div x-show="tab === 'informacion-general'">
                    <x-wire-native-select 
                    label="Tipo de Sangre" 
                    class="mb-4" 
                    name="blood_type_id"
                    >

                        <option value=""> Seleccione un tipo de sangre </option>
                        @foreach ($bloodTypes as $bloodType)
                        <option value="{{ $bloodType->id }}" @selected($bloodType->id === $patient->blood_type_id)>
                            {{ $bloodType->name }}
                        </option>
                        @endforeach

                    </x-wire-native-select>

                    <x-wire-textarea label="Observaciones">
                        {{ old('observations',$patient->observations) }}
                    </x-wire-textarea>
                </div>
                {{-- Contacto de Emergencia --}}
                <div x-show="tab === 'contacto-emergencia'">
                    <div class="space-y-4">
                        <x-wire-input 
                        label="Nombre del Contacto"
                        name="emergency_contact_name"
                        value="{{ old('emergency_contact_name',$patient->emergency_contact_name) }}"
                        />
                        <x-wire-input 
                        label="Telefono del Contacto"
                        name="emergency_contact_phone"
                        value="{{ old('emergency_contact_phone',$patient->emergency_contact_phone) }}"
                        />
                        <x-wire-input 
                        label="Relacion con el Contacto"
                        name="emergency_contact_relationship"
                        value="{{ old('emergency_contact_relationship',$patient->emergency_contact_relationship) }}"
                        />
                    </div>
                </div>
            
        </x-tabs>

    
        </x-wire-card>
    </form>

</form>

</x-admin-layout>