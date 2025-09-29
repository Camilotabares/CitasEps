@props([
    'title' => config('app.name', 'Laravel'),
    'breadcrumbs'=> []
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


        <!-- Sweeltaler2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- wire ui -->
        <wireui:scripts />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/2f13018d2f.js" crossorigin="anonymous"></script>


        <!-- Styles -->
        @livewireStyles

        @stack('css')
    </head>
    <body class="font-sans antialiased">

        @include('layouts.includes.admin.navigation')
        @include('layouts.includes.admin.sidebar')


<div class="p-4 sm:ml-64">
        <div class=" mt-14 flex items-center">
        @include('layouts.includes.admin.breadcrumb')

        @isset($action)
            <div class="ml-auto">
                {{ $action }}
            </div>
        @endisset
        </div>
        {{ $slot }}
</div>

        @stack('modals')

        @livewireScripts

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

        @if (session('swal'))
        <script>
            swal.fire(@json(session('swal')));
        </script>

        @endif

        <script>
            forms= document.querySelectorAll('.delete-form');

            forms.forEach(form=>{
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡Esta acción no se puede deshacer!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            });

        </script>

        @stack('js')
    </body>
</html>