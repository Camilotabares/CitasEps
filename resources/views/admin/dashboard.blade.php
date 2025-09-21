<x-admin-layout 
title="Dashboard"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'pruebas',
    ]
]"> 
    <x-slot name="action">
        hola mundo 
    </x-slot>


    Hola desde el Admin 
</x-admin-layout>