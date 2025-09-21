<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Site</title>
  </head>
  <body class="bg-gray-100 text-gray-900">
    <!-- Top Navigation -->
    <nav class="bg-gray-800 text-white px-6 py-4">
      <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-xl font-bold">{{ $heading }}</h1>
        <ul class="flex space-x-6">
          <li><x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link></li>
          <li><x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link></li>
        </ul>
      </div>
    </nav>

    <!-- Page Content -->
    <main class="container mx-auto px-6 py-10">
        {{ $slot }}
      

      </p>
    </main>
  </body>
</html>