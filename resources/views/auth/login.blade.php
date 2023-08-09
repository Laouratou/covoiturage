<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Connexion</title>
</head>
<body>
    <nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class="container mx-auto px-4">
          <div class="flex items-center justify-between py-4">
            <a href="/" class="flex items-center space-x-2">
              <!-- Remplacer le logo par une image personnalisée -->
              <img src="img/logo.png" alt="Logo Blabberide" class="w-10 h-10 rounded-full">
              <span class="text-2xl font-bold text-white">Blabberide</span>
            </a>
            <button class="md:hidden focus:outline-none">
              <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>
            <div class="hidden md:flex space-x-4 text-white">
              <a href="/" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Accueil</span>
              </a>
              @auth
              <a id="reservation-link" href="#" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Réservation</span>
              </a>
            @endauth
    @auth
    <a href="/messages" class="hover:text-pink-200 transition duration-300 ease-in-out">
        <span class="text-lg">Messages</span>
      </a>
    @endauth


              @if (Auth::check() && Auth::user()->role !== 'passager')
              <a href="/trajets" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Voir tous ses trajets</span>
              </a>
              @endif
              @guest
              <a href="/inscription" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Inscription</span>
              </a>
              <a href="/login" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Connexion</span>
              </a>
              @endguest
              @auth
              <div class="relative">
                <button id="profileDropdown"
                  class="flex items-center hover:text-pink-200 focus:outline-none transition duration-300 ease-in-out"
                  type="button">
                  <span class="mr-2">
                    @if(Auth::user()->photo)
                      <!-- Replace with the photo of the user's profile -->
                      <img src="{{ '/storage/' . Auth::user()->photo }}" alt="Profil Picture"class="w-10 h-10 rounded-full">
                    @else
                      <!-- Show a default profile image or an empty image -->
                      <img src="/path/to/default-profile-image.png" alt="Profil Picture"
                        class="w-10 h-10 rounded-full">
                    @endif
                  </span>
                  <svg class="w-4 h-4 text-white fill-current" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 14l5-5H5l5 5z"></path>
                  </svg>
                </button>

                <!-- Contenu du dropdown -->
                <div id="profileDropdownContent"
                  class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg hidden">

    <h6 class="px-4 py-2 font-bold text-black border-b-2">
        <span class="text-animation">{{ Auth::user()->name }}</span>
      </h6>

                  <div class="px-4 py-2">
                    <div class="">
                      <a href="/profile" class="hover:text-pink-200 block transition duration-300 ease-in-out">
                        <span class="text-lg text-black hover:text-red-700">Mon profil</span>
                      </a>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="py-2">
                      @csrf
                      <button type="submit" class=" hover:text-red-700 border-b-2 text-black">Déconnexion</button>
                    </form>
                  </div>
                </div>
              </div>
              @endauth
            </div>
          </div>
        </div>
      </nav>

    <div class="grid grid-cols-2  gap-4 mt-8 py-14 ">
        <!-- Image Section -->
        <div class="">
            <img src="img/connexion1.jpg" alt="Image" class="h-90 w-90 object-cover transform translate-x-9">
        </div>
        <!-- Login Form Section -->
        <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded shadow-lg">
            @csrf
            <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse e-mail</label>
                <div class="relative">
                    <i class="absolute left-2 top-2 text-gray-400 fas fa-envelope"></i>
                    <input type="email" id="email" name="email" required autofocus
                        class="w-full border border-gray-300 rounded-md py-2 px-4 pl-10 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="example@example.com">
                </div>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <div class="relative">
                    <i class="absolute left-2 top-2 text-gray-400 fas fa-lock"></i>
                    <input type="password" id="password" name="password" required
                        class="w-full border border-gray-300 rounded-md py-2 px-4 pl-10 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="********">
                </div>
            </div>
            <div class="mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-700">Se souvenir de moi</span>
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    window.addEventListener('scroll', function() {
var nav = document.querySelector('nav');
var scrolled = window.scrollY > 0;
nav.classList.toggle('scrolled', scrolled);
});
 </script>
 <section class="py-10 mt-28 bg-gray-200">
     <div class="mx-auto max-w-7xl">
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
         <div class=" p-4">
           <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
       <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire.<span class="text-red-500 hover:text-blue-500">Lire plus</span></p>
         </div>
         <div class=" p-4">
           <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Mentions légales</h2>
          <div class="py-3">
            <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"class="text-gray-500 hover:text-blue-700">Politique de Confidentialité</a> </p>
            <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"class="text-gray-500 hover:text-blue-700">Conditions générales</a>  </p>
           </div>
           </div>
         <div class=" p-4">
           <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Contactez-nous</h2>
        <div class="py-3">
       <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i>   Burkina Faso-Ouagadougou</p>
     <p class="my-2"><i class="fas fa-phone"></i>     (+226) 63 17 48 48  / 64 20 37 86</p>
     <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"class="text-black  hover:underline">traorelaw687@gmail.com</a> </p>
     </div>
         </div>
         <div class=" p-4">
           <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Guide d'utilisation</h2>
        <div class="py-3">
        <p class="my-2"> <i class="fas fa-angle-double-right"></i><a href="#"class="text-gray-500 hover:text-blue-700">   Comment ça marche</a>    </p>
        <p class="my-2"><i class="fas fa-angle-double-right"></i>  <a href="#"class="text-gray-500 hover:text-blue-700">  Le covoiturage en 4 points</a>  </p>
        </div>
        <img src="img/paiement.png" alt=""class="w-36">
         </div>
       </div>
     <div class="text-center">
      <p> Copyright © 2023 <a href="https://www.votreplateforme.com"><span class="text-red-500">Plateforme</span></a>. Tous droits réservés.</p>
     </div>
     </div>
     </section>
</body>
</html>
