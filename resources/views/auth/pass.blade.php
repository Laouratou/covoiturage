<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>.message-image {
    position: relative;
    display: inline-block;
  }


  .message-image .overlay-text {
    position: absolute;
    top: 80%;
left: 20%;
    background-color: rgba(0, 0, 0, 0.518);
    color: #fff;
    padding: 5px 8px;
    font-size: 12px;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .message-image:hover .overlay-text {
    opacity: 1;
  }
  </style>
</head>
<body class="">
    <nav class=" w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class="mx-auto px-4">
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

    <div class=" flex items-center justify-center gap-x-6 mt-8 mb-8">
        <div class="w-10/12 p-4  bg-white shadow-md rounded-lg ">
            <h1 class="text-xl font-bold mb-4 text-center bg-purple-600 text-white py-3">Tableau de bord</h1>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 py-6">

                <a href="/prime" class="flex items-center justify-center bg-gray-200 hover:bg-gray-300 h-36 transition duration-300 shadow-md rounded-lg p-4">
                    <i class="fas fa-award text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light ">Ma prime convoiturage</p>

                    </div>
                </a>
                <a href="/coordonnees" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4">
                    <i class="fas fa-envelope text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light text-primary">Mes coordonnées</p>

                    </div>
                </a>
                <a href="/profile" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4">
                    <i class="fas fa-user text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light ">Mon profil</p>

                    </div>
                </a>
                <a href="/trajets" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4">
                    <i class="fas fa-newspaper text-primary text-3xl mr-2"></i>
                    <div class="text-center">
                        <p class="font-light text-lg ">Mes annonces</p>
                        <p class=" mt-4 animate-pulse">Nombre de trajets publiés : <span class="text-blue-600 text-lg">{{ $nombreTrajetsPublies }}</span></p>
                    </div>
                </a>
                <a href="/alerte" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4 h-24">
                    <i class="fas fa-exclamation-circle text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light">Mes alertes</p>
                    </div>
                </a>
                <a href="/voitures" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4 h-24">
                    <i class="fas fa-envelope text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light">Mes voitures</p>
                    </div>
                </a>
                <a href="/preference" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4 h-24">
                    <i class="fas fa-envelope text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light text-primary">Mes preferences de convoiturage</p>
                    </div>
                </a>
                <a href="/reservations" class="flex items-center justify-center bg-gray-200 h-36 hover:bg-gray-300 transition duration-300 shadow-md rounded-lg p-4 h-24">
                    <i class="fas fa-envelope text-primary text-3xl mr-2"></i>
                    <div>
                        <p class="text-center font-light text-primary">Mes reservations</p>
                    </div>
                </a>
            </div>
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
        // Récupérer les éléments du dropdown
        const dropdownTrigger = document.getElementById('profileDropdown');
        const dropdownContent = document.getElementById('profileDropdownContent');

        // Ajouter un écouteur d'événement pour le clic sur le lien de déclenchement
        dropdownTrigger.addEventListener('click', () => {
          dropdownContent.classList.toggle('hidden');
        });

        // Fermer le dropdown lorsque l'utilisateur clique en dehors de celui-ci
        window.addEventListener('click', (event) => {
          if (!dropdownTrigger.contains(event.target)) {
            dropdownContent.classList.add('hidden');
          }
        });
      </script>
</body>
</html>
