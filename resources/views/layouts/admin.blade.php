  @props(['breadcrumbs' => [], 'title' => config('app.name', 'Laravel')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/9161014f5f.js" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Sweet alert 2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- WireUI SIN Alpine (clave) --}}
  <wireui:scripts :alpine="false" />

  @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-50">
  @include('layouts.includes.admin.navigation')
  @include('layouts.includes.admin.sidebar')

  <div class="p-4 sm:ml-64">
    <div class="mt-14 flex items-center justify-between w-full">
      @include('layouts.includes.admin.breadcrumb')
    </div>
    {{ $slot }}
  </div>

  @stack('modals')

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

  {{-- Mostrar Sweet alert --}}
  @if (session('swal'))
    <script>
      Swal.fire(@json(session('swal')));
    </script>
  @endif

  <script>
    // Buscar todos los elementos con la clase .delete-form
    const forms = document.querySelectorAll('.delete-form');

    forms.forEach(form => {
      // Escuchar el evento submit
      form.addEventListener('submit', function(e) {
        // Evitar envío automático
        e.preventDefault();

        Swal.fire({
          title: '¿Estás seguro?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, eliminar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  </script>
</body>
</html>
