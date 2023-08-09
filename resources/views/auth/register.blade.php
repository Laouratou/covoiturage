<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
nav.scrolled {
    font-weight: bold;
    background-color: white;
  /* Ajoutez d'autres styles de votre choix pour le menu défilé */
}
    </style>
    <title>Inscription</title>
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
        Bienvenue, <span class="text-animation">{{ Auth::user()->name }}</span>
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
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mt-8 py-14">
        <!-- Image Section -->
        <div class="">
          <img src="img/welcome3.jpeg" alt="Image" class="w-full md:max-w-full object-cover md:transform md:translate-x-0 md:translate-x-16 h-full ">
        </div>
        <div>

            <x-guest-layout>
                <h1 class="text-bold text-center text-2xl shadow-sm ">INSCRIVEZ-VOUS</h1>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" x-data="{ open: false }">
                    @csrf

                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Photo -->
                    <div class="mt-4">
                        <x-input-label for="photo" :value="__('Photo')" />

                        <input id="photo" class="block mt-1 w-full" type="file" name="photo" required accept="image/*" />

                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>

                    <!-- CNIB -->
                    <div class="mt-4">
                        <x-input-label for="cnib" :value="__('CNIB')" />

                        <input id="cnib" class="block mt-1 w-full" type="file" name="cnib" required accept="image/*" />

                        <x-input-error :messages="$errors->get('cnib')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <label for="telephone" class="block font-medium text-gray-700">Téléphone</label>
                        <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" placeholder="+226 63174848" class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0">
                        @error('telephone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

<!-- Conditions d'utilisation -->
<div class="mt-4">
    <div class="flex items-center">
        <input type="checkbox" id="accept_conditions" name="accept_conditions" class="mr-2">
        <label for="accept_conditions" class="text-sm text-gray-700">J'accepte les <a href="/conditions" class="text-blue-500 hover:underline">conditions d'utilisation</a></label>
    </div>
    <x-input-error :messages="$errors->get('accept_conditions')" class="mt-2" />
</div>

                    <div class="flex items-center justify-end mt-6">
                        <a class="underline text-sm text-gray-500 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Déjà enregistrer?') }}
                        </a>

                        <x-primary-button class="ml-4 text-blue-500">
                            {{ __('Enregistrer') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
        </div>
</div>
<script>
    window.addEventListener('scroll', function() {
var nav = document.querySelector('nav');
var scrolled = window.scrollY > 0;
nav.classList.toggle('scrolled', scrolled);
});
 </script>

<section class="py-10 mt-28 bg-gray-100 shadow-md">
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
                <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des
                    conducteurs et des passagers partageant le même itinéraire.
                      </p>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Mentions légales</h2>
                <div class="py-3">
                    <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="politique"
                            class=" hover:text-blue-700">Politique de Confidentialité</a> </p>
                    <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="/conditions"
                            class=" hover:text-blue-700">Conditions générales</a> </p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Contactez-nous</h2>
                <div class="py-3">
                    <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i> Burkina Faso-Ouagadougou
                    </p>
                    <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                    <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"
                            class="text-black  hover:underline">traorelaw687@gmail.com</a> </p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Guide d'utilisation</h2>
                <div class="py-3">
                    <p class="my-2"> <i class="fas fa-angle-double-right"></i><a href="#"
                            class=" hover:text-blue-700"> Comment ça marche</a> </p>
                    <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="#"
                            class=" hover:text-blue-700"> Le covoiturage en 4 points</a> </p>
                </div>
                <img src="img/paiement.png" alt="" class="w-36">
            </div>
        </div>
        <div class="text-center">
            <p>Copyright © 2023
                <a href="https://www.votreplateforme.com"><span class="text-red-500">Plateforme</span></a>. Tous
                droits réservés.</p>
        </div>
    </div>
</section>
</body>
</html>
