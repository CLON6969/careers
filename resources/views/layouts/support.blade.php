@php 
    $logo = App\Models\Logo::first(); // Changed from $icons = ... to $logo = ...
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

      <!-- icon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">


   <!-- fontawsome -->
   <link href="/public/vendor/fontawesome/css/all.min.css" rel="stylesheet">
   
          <!-- fontawsome back up-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">
      <!-- tailwind CSS -->      <!-- tailwind CSS -->
<link href="{{ asset('/public/css/app.css') }}" rel="stylesheet">


   <!-- CSS Scripts -->
      <link href="{{ asset('/public/resources/css/more-nav.css') }}" rel="stylesheet">
   <link href="{{ asset('/public/resources/css/partners.css') }}" rel="stylesheet">
 
   <link href="{{ asset('/public/resources/css/support.css') }}" rel="stylesheet">
   
   <!--JS Scripts -->
   <script src="{{ asset('/public/resources/js/app.js') }}" defer></script>
   <title>Kumoyo | support sales</title>
      <style>
        /* Preloader full screen */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #0a1a3f; /* dark blue */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

/* Logo animation */
.preloader-logo {
    width: 80px; /* Adjust size */
    height: 80px;
    animation: blinkZoom 1s infinite alternate;
}

/* Keyframes for blinking & zooming */
@keyframes blinkZoom {
    0% {
        opacity: 0.3;
        transform: scale(0.8);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
    100% {
        opacity: 0.3;
        transform: scale(0.8);
    }
}

     </style>
</head>


<body>
   <div id="preloader">
    <img src="{{ asset('/public/uploads/pics/' . $logo->picture2) }}" alt="logo" class="preloader-logo">
</div>
<!-- Nav1 Content -->
    <x-nav1 />

    <!-- Dynamic Content -->
    <main>
        @yield('content')
    </main>

    <!-- partiners Content -->
    <x-partiners />


<!-- footer Content -->
    <x-footer />

       <script>
    window.addEventListener('load', function() {
        const preloader = document.getElementById('preloader');
        if (preloader) {
            preloader.style.opacity = '0';
            setTimeout(() => preloader.style.display = 'none', 300);
        }
    });
</script>

</body>
</html>
