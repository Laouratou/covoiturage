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
    <nav class="z-50 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class=" mx-auto px-4">
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
    <div class="grid grid-cols-2 gap-4 sticky left-0 right-0 top-0 "style="background-color: #34bfc6;">
        <div>
            <section class="flex justify-center items-center h-32">
                <span class="mr-1">
                    <img src="{{ '/storage/' . auth()->user()->photo }}" alt="Photo de profil" class="logo w-10 h-10 rounded-full">
                </span>
                <span class="text-2xl">{{ auth()->user()->name }}</span>
            </section>
        </div>
        <div class="flex justify-center items-center">
            <a href="/profile">
            <button class="bg-white font-bold py-2 px-4 rounded">
                Modifier le profil
            </button>
        </a>
        </div>
    </div>
<section  class="bg-gray-700">
    <div class="flex justify-center items-center">
        <svg width="250" height="68" viewBox="0 0 250 68" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 8h242v56L4 59.625V8Z" fill="#9AED66"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8c0-2.20914 1.79086-4 4-4h242c2.209 0 4 1.79086 4 4v56c0 1.0734-.431 2.1018-1.197 2.8539s-1.802 1.1648-2.875 1.1454L3.9277 63.6243C1.7471 63.5849 0 61.806 0 59.625V8Zm4 51.625V8h242v56L4 59.625Z" fill="#054752"></path>
            <path opacity=".5" d="m157.461 44.646-4.461.4052.993 12.1775 4.461-.4053-.993-12.1774ZM96.7085 12.8396l4.4655-.3928.97 12.1749-4.4656.3928-.9699-12.1749ZM232.67 14.878l4.466-.3927.97 12.1749-4.466.3927-.97-12.1749ZM105.583 28.8454l3.248-3.249 7.985 8.8426-3.248 3.2609-7.985-8.8545ZM209 47.895l3.248-3.249 7.984 8.8426-3.248 3.2609L209 47.895ZM92.4429 52.318l.8796-4.6296 11.3445 2.3802-.879 4.6534-11.3451-2.404ZM81.5517 25.6719l3.6538 2.7372-6.7099 9.9732-3.6538-2.7611 6.7099-9.9493ZM192.111 57.033l.473-4.7128 11.503 1.3329-.473 4.701-11.503-1.3211ZM122.154 52.6489 120 48.4954l10.149-5.8911 2.154 4.1416-10.149 5.903Z" fill="#fff"></path>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Arial" font-size="16" fill="#fff">
                <tspan x="50%" dy="-8" text-anchor="middle" font-size="24" font-weight="bold">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 125 34" to="360 125 34" dur="5s" repeatCount="indefinite" />
                    50,000 FCFA
                </tspan>
                <tspan x="50%" dy="24" text-anchor="middle" font-size="16" font-weight="bold">bonus convoiturage</tspan>
            </text>
        </svg>
    </div>
    <h1 class="text-4xl text-center text-white py-5">Bénéficier de la Prime Covoiturage de 50.000fcfa</h1>
<p class="text-center text-2xl text-white">Pour en profiter, covoiturez et nous nous occupons de tout !</p>
<div class="flex justify-center items-center py-10">
    <a href="trajets/create">
        <button class="bg-blue-500 hover:bg-gray-300 hover:text-black text-white font-bold py-2 px-4 rounded">
            Savoir plus
        </button>
    </a>
</div>

</section>
<div class="bg-gray-100 py-20 flex justify-center items-center ">
    <div class="grid grid-cols-2">
        <div class="bg-gray-200 p-8">
          <!-- Contenu de la première colonne -->
          <h2 class="text-2xl py-3">Vous avez des questions ?</h2>
    <p class="py-4">Notre communauté s'occupe de vous repondre</p>
    <a href="#">
        <button class="bg-white text-blue-500 font-bold py-2 px-4 rounded-full">
           Poser une question
        </button>
    </a>
        </div>
        <div class="bg-gray-400 p-8 flex">
          <!-- Contenu de la deuxième colonne -->
          <img src="img/photo8.jpg" alt=""class="w-32 h-32 rounded-full">
          <img src="img/photo7.JPG" alt=""class="w-32 h-32 rounded-full object-cover">
        </div>
      </div>
    </div>
    <section class="py-10  bg-gray-200 shadow-md">
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
    <script>
        window.addEventListener('scroll', function() {
    var nav = document.querySelector('nav');
    var scrolled = window.scrollY > 0;
    nav.classList.toggle('scrolled', scrolled);
    });
     </script>
</body>
</html>
