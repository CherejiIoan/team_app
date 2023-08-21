<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>TeamApp</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
        tr td:last-child {
    width: 1%;
    white-space: nowrap;
}
        </style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.0/datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.css" integrity="sha512-mVHgwOt18poO8pV1oH45RyQKuDbCXJr2e0BzGTRr1XjV2eAp+BijRLYMP8KjdHJsQbXF/BG67eBijbOb2hw24g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap');
* {
    font-family: 'Outfit', sans-serif;   
}
</style>
@vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');

        modalToggles.forEach((toggle) => {
            const targetModal = document.getElementById(toggle.dataset.modalTarget);

            if (targetModal) {
                toggle.addEventListener('click', function () {
                    targetModal.classList.toggle('hidden');
                });
            }
        });
    });
</script>
<script>
    // Funcția pentru afișarea modalului
    function showModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
    }

    // Funcția pentru ascunderea modalului
    function hideModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    }

    const editButtons = document.querySelectorAll('[data-modal-show^="editUserModal"]');
    editButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const modalId = event.currentTarget.getAttribute('data-modal-show');
            showModal(modalId);
        });
    });

    const closeButtons = document.querySelectorAll('[data-modal-hide]');
    closeButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            const modalId = event.currentTarget.getAttribute('data-modal-hide');
            hideModal(modalId);
        });
    });



</script>

    </body>
</html>
