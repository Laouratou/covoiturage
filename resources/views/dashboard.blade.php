<!-- component -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="">
<style>
    /* Compiled dark classes from Tailwind */
    .dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
      border-color: rgba(55, 65, 81);
    }
    .dark .dark\:bg-gray-50 {
      background-color: rgba(249, 250, 251);
    }
    .dark .dark\:bg-gray-100 {
      background-color: rgba(243, 244, 246);
    }
    .dark .dark\:bg-gray-600 {
      background-color: rgba(75, 85, 99);
    }
    .dark .dark\:bg-gray-700 {
      background-color: rgba(55, 65, 81);
    }
    .dark .dark\:bg-gray-800 {
      background-color: rgba(31, 41, 55);
    }
    .dark .dark\:bg-gray-900 {
      background-color: rgba(17, 24, 39);
    }
    .dark .dark\:bg-red-700 {
      background-color: rgba(185, 28, 28);
    }
    .dark .dark\:bg-green-700 {
      background-color: rgba(4, 120, 87);
    }
    .dark .dark\:hover\:bg-gray-200:hover {
      background-color: rgba(229, 231, 235);
    }
    .dark .dark\:hover\:bg-gray-600:hover {
      background-color: rgba(75, 85, 99);
    }
    .dark .dark\:hover\:bg-gray-700:hover {
      background-color: rgba(55, 65, 81);
    }
    .dark .dark\:hover\:bg-gray-900:hover {
      background-color: rgba(17, 24, 39);
    }
    .dark .dark\:border-gray-100 {
      border-color: rgba(243, 244, 246);
    }
    .dark .dark\:border-gray-400 {
      border-color: rgba(156, 163, 175);
    }
    .dark .dark\:border-gray-500 {
      border-color: rgba(107, 114, 128);
    }
    .dark .dark\:border-gray-600 {
      border-color: rgba(75, 85, 99);
    }
    .dark .dark\:border-gray-700 {
      border-color: rgba(55, 65, 81);
    }
    .dark .dark\:border-gray-900 {
      border-color: rgba(17, 24, 39);
    }
    .dark .dark\:hover\:border-gray-800:hover {
      border-color: rgba(31, 41, 55);
    }
    .dark .dark\:text-white {
      color: rgba(255, 255, 255);
    }
    .dark .dark\:text-gray-50 {
      color: rgba(249, 250, 251);
    }
    .dark .dark\:text-gray-100 {
      color: rgba(243, 244, 246);
    }
    .dark .dark\:text-gray-200 {
      color: rgba(229, 231, 235);
    }
    .dark .dark\:text-gray-400 {
      color: rgba(156, 163, 175);
    }
    .dark .dark\:text-gray-500 {
      color: rgba(107, 114, 128);
    }
    .dark .dark\:text-gray-700 {
      color: rgba(55, 65, 81);
    }
    .dark .dark\:text-gray-800 {
      color: rgba(31, 41, 55);
    }
    .dark .dark\:text-red-100 {
      color: rgba(254, 226, 226);
    }
    .dark .dark\:text-green-100 {
      color: rgba(209, 250, 229);
    }
    .dark .dark\:text-blue-400 {
      color: rgba(96, 165, 250);
    }
    .dark .group:hover .dark\:group-hover\:text-gray-500 {
      color: rgba(107, 114, 128);
    }
    .dark .group:focus .dark\:group-focus\:text-gray-700 {
      color: rgba(55, 65, 81);
    }
    .dark .dark\:hover\:text-gray-100:hover {
      color: rgba(243, 244, 246);
    }
    .dark .dark\:hover\:text-blue-500:hover {
      color: rgba(59, 130, 246);
    }

    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }
    .sidebar:hover {
        width: 16rem;
    }
    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
  </style>
  <div x-data="setup()" :class="{ 'dark': isDark }">
      <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

        <!-- Header -->
        <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
            <div class="flex space-x-6 flex-wrap w-14 md:w-64 h-14 bg-blue-800 dark:bg-gray-800 border-none">
                @auth
                <img src="{{ Auth::user()->photo }}" alt="Avatar utilisateur" class="w-10 md:w-12 h-12 rounded-full" />
                <div class="text-center">
                    <h2 class="font-medium text-xs md:text-sm mt-1 text-teal-500">{{ Auth::user()->name }}</h2>
                    <span class="hidden md:block text-xs text-gray-900">ADMIN</span>
                </div>
                @endauth
            </div>

            <div class="flex justify-between items-center h-14 bg-blue-800 dark:bg-gray-800 header-right">
                <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                    <button class="outline-none focus:outline-none">
                        <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                            </path>
                        </svg>
                    </button>
                    <input type="search" name="" id="" placeholder="Rechercher"
                        class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                </div>
                <ul class="flex items-center">
                    <li>
                        <button aria-hidden="true" @click="toggleTheme"
                            class="group p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-200 hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 text-gray-900 focus:outline-none">
                            <svg x-show="isDark" width="24" height="24"
                                class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                </path>
                            </svg>
                            <svg x-show="!isDark" width="24" height="24"
                                class="fill-current text-gray-700 group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                </path>
                            </svg>
                        </button>
                    </li>
                    <li>
                        <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700"></div>
                    </li>
                    <li class="mx-3">
                        <form method="POST" action="/logout">
                            @csrf <!-- Ajoutez le jeton CSRF pour la sécurité -->
                            <button type="submit" class="text-sm text-gray-300 hover:text-gray-500 focus:outline-none">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ./Header -->

        <!-- Sidebar -->
        <div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
          <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
            <ul class="flex flex-col py-4 space-y-1">
              <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center h-8">
                  <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Principal</div>
                </div>
              </li>
              <li>
                <a href="/dashboard" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Tableau de bord</span>
                </a>
              </li>
             <!-- Dans votre fichier de vue (blade) -->
<!-- Dans votre fichier de vue (blade) -->
<li>
    <a href="/gestion" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
        <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Trajets</span>
        @if (request()->is('gestion/nouveaux'))
            <span class="md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">Nouveau</span>
        @endif
    </a>
</li>

              <li>
                <a href="messages/create1" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
                </a>
              </li>

              <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center mt-5 h-8">
                  <div class="text-sm font-light tracking-wide text-gray-400 uppercase">PARAMÈTRES</div>
                </div>
              </li>
              <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                  </span>
                  <span class="ml-2 text-sm tracking-wide truncate">Profil</span>
                </a>
              </li>
              <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                  <span class="inline-flex justify-center items-center ml-4">

                  </span>

                </a>
              </li>
            </ul>
            <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2023</p>
          </div>
        </div>
        <!-- ./Sidebar -->

        <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

          <!-- Statistics Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg class="w-8 h-8 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6l-6 4v8a2 2 0 002 2h8a2 2 0 002-2v-8l-6-4zm0 0l6 4m-6 4v6m6-6h6m-6 0H6"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $trajetsCount }}</p>
                    <p>Trajets</p>
                </div>
            </div>

            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-4 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group flex items-center justify-between">
                <div class="flex justify-center items-center w-16 h-16 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a3 3 0 100 6 3 3 0 000-6zM6 8a3 3 0 100 6 3 3 0 000-6zm8 0a3 3 0 100 6 3 3 0 000-6zM2 12.5a5.5 5.5 0 1111 0 5.5 5.5 0 01-11 0z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold">{{ $usersCount }}</p>
                    <p>Utilisateurs</p>
                </div>
            </div>


            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
                <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg class="w-8 h-8 text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9l-8 4v6l8-4 8 4v-6l-8 4"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl">{{ $reservationsCount }}</p>
                    <p>Réservations</p>
                </div>
            </div>

            <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md p-4 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group flex items-center justify-between">
                <div class="flex justify-center items-center w-16 h-16 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                    <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold">{{ $totalAcceptedTripsPrice }} FCFA</p>
                    <p>Prix total des trajets acceptés</p>
                </div>
            </div>

          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 p-4 gap-4">


            <div class="relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="px-4 py-4">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Liste des utilisateurs</h2>
                </div>
                <div class="block w-full overflow-x-auto">
                    @if ($users->count() > 0)
                        <table class="items-center w-full bg-transparent border-collapse">
                            <!-- Your table headers and content here -->
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 bg-gray-100 dark:bg-gray-700">Nom</th>
                                    <th class="px-4 py-2 bg-gray-100 dark:bg-gray-700">Email</th>
                                    <th class="px-4 py-2 bg-gray-100 dark:bg-gray-700">Rôle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="text-gray-700 dark:text-gray-100">
                                        <td class="border-t-0 px-4 py-2 border-l-0 border-r-0 text-xs whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="border-t-0 px-4 py-2 border-l-0 border-r-0 text-xs whitespace-nowrap">{{ $user->email }}</td>
                                        <td class="border-t-0 px-4 py-2 border-l-0 border-r-0 text-xs whitespace-nowrap">{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="px-4 py-2 text-gray-700 dark:text-gray-100">Aucun utilisateur trouvé.</p>
                    @endif
                </div>
            </div>

            <!-- ./Social Traffic -->

            <!-- Recent Activities -->
            <div class="relative flex flex-col min-w-0 break-words bg-gray-50 dark:bg-gray-800 w-full shadow-lg rounded">
                <div class="rounded-t mb-0 px-0 border-0">
                  <div class="flex flex-wrap items-center px-4 py-2">
                    <div class="relative w-full max-w-full flex-grow flex-1">
                      <h3 class="font-semibold text-base text-gray-900 dark:text-gray-50">Activités récentes</h3>
                    </div>
                    <div class="relative w-full max-w-full flex-grow flex-1 text-right">
                      <button class="bg-blue-500 dark:bg-gray-100 text-white active:bg-blue-600 dark:text-gray-800 dark:active:text-gray-700 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Voir tout</button>
                    </div>
                  </div>

                  <!-- Affichage des activités récentes pour les trajets -->
                  <div class="block w-full">
                    <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                      Trajets recent
                    </div>
                    <ul class="my-1">
                      @foreach($recentTrajets as $trajet)
                      <li class="flex px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out">
                        <div class="w-9 h-9 rounded-full flex-shrink-0 bg-indigo-500 my-2 mr-3">
                          <svg class="w-9 h-9 fill-current text-indigo-50" viewBox="0 0 36 36">
                            <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z"></path>
                          </svg>
                        </div>
                        <div class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100">
                          <div class="flex-grow flex justify-between items-center">
                            <div class="self-center">
                              <span class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100">
                                {{ $trajet->user->name }}
                              </span> a proposé un trajet
                            </div>
                            <div class="flex-shrink-0 ml-2">
                              <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                                Voir<span>
                                  <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                                </span>
                              </a>
                            </div>
                          </div>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>

                  <!-- Affichage des activités récentes pour les messages -->
                 <!-- Affichage des activités récentes pour les messages -->
<div class="block w-full">
    <div class="px-4 bg-gray-100 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
      Messages recent
    </div>
    <ul class="my-1">
      @foreach($recentMessages as $message)
      <li class="flex px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-300 ease-in-out">
        <div class="flex-grow flex items-center border-b border-gray-100 dark:border-gray-400 text-sm text-gray-600 dark:text-gray-100">
          <div class="flex-grow flex justify-between items-center">
            <div class="self-center">
              <span class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100">
                {{ $message->sender->name }}
              </span> a envoyé un message à <span class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-50 dark:hover:text-gray-100">
                {{ $message->receiver->name }}
              </span>
            </div>
            <div class="flex-shrink-0 ml-2">
              <a class="flex items-center font-medium text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-500" href="#0" style="outline: none;">
                Voir<span>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                  </svg>
                </span>
              </a>
            </div>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
  </div>
                </div>
              </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script>
      const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }
          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

        return {
          loading: true,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
        }
      }
    </script>
</body>
</html>
