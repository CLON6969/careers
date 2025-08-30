<!DOCTYPE html>
<html lang="en" class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, // animation duration in ms
    once: true,    // animate only once
  });
</script>

 <!-- tailwindcss -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>

  <title> Careers | Jobs</title>
  
     <!-- icon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">

        <!-- fontawsome back up-->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css">


    <link href="{{ asset('/public/resources/css/more-nav.css') }}" rel="stylesheet">


</head>
<body class="min-h-screen flex flex-col">
<!-- Nav1 Content -->
    <x-nav1 />

 
            @yield('content')


    
<!-- footer Content -->
    <x-footer />
</body>
</html>