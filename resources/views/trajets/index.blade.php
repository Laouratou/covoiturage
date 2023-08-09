<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .animate-pulse {
            animation: pulse 1s ease-in-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body class="">


    <nav class=" w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
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
              <a id="reservation-link" href="/reservations" class="hover:text-pink-200 transition duration-300 ease-in-out">
                <span class="text-lg">Réservation</span>
              </a>
            @endauth
    @auth
    <a href="/messages" class="hover:text-pink-200 transition duration-300 ease-in-out">
        <span class="text-lg">Messages</span>
      </a>
    @endauth


              @if (Auth::check() && Auth::user()->role !== 'passager')

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

    <div class="flex justify-center items-center min-h-screen">
        <div class=" bg-white w-3/4 rounded-md transition-transform transform hover:scale-105 shadow-lg">
            <div class="container mx-auto py-8 bg-purple-600">
                <div class="grid grid-cols-3 gap-4 ">
                    <div class="px-4">
                        <h2>
                            <span class="text-2xl">&#x25B6;</span>
                            <a href="/pass" class="text-white hover:text-white hover:underline">Retour au tableau de bord</a>
                        </h2>
                    </div>
                    <div class="">
                        <h2 class="text-2xl font-light text-white px-4 ">Mes annonces</h2>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('trajets.create') }}" class="underline">
                        <button class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded mr-4">
                            Publier une annonce
                        </button>
                    </a>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <ul class="space-y-4">
                    <a href=""></a>
                    @foreach ($trajets as $trajet)
                    <li class="">
                        <div class="flex justify-between items-center">
                            <div>
                                <h2 class="text-lg font-bold">{{ $trajet->ville_de_depart }} - {{ $trajet->ville_d_arrivee }}</h2>
                                <p class="text-gray-500 mb-2"><i class="far fa-calendar-alt"></i> Date de départ : {{ $trajet->date_depart }}</p>
                                <p class="text-gray-500 mb-2"><i class="far fa-clock"></i> Heure de départ : {{ $trajet->heure_depart }}</p>
                                <p class="text-gray-500 mb-2"><i class="fas fa-chair text-green-500"></i> Place disponible : {{ $trajet->place_disponibles }}</p>
                                <p class="text-gray-500 mb-2"><i class="fas fa-dollar-sign"></i> Prix par place: {{ $trajet->prix_par_place }}  FCFA</p>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-blue-500 text-white rounded-full h-10 w-10 flex justify-center items-center">
                                    <p class="text-xl font-bold">{{ $trajet->reservations->count() }}</p>
                                </div>
                                <div class="ml-2">
                                    <i class="fas fa-people-arrows text-blue-500 animate-pulse"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <div class="space-x-2">

                                <a href="{{ route('trajets.edit', $trajet->id) }}" class="text-green-500 hover:underline hover:text-green-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 15v4a2 2 0 01-2 2H7a2 2 0 01-2-2v-4m14-6v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4m6-2h4m-4 0a2 2 0 012-2V5a2 2 0 01-2-2h0a2 2 0 01-2 2v4a2 2 0 012 2z" />
                                    </svg>
                                    Modifier
                                </a>
                                <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline hover:text-red-700" onclick="confirmDelete()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        if (confirm("Voulez-vous vraiment supprimer ce trajet et toutes les réservations associées ?")) {
                                            document.getElementById('deleteForm').submit();
                                        }
                                    }
                                </script>

                            </div>
                        </div>
                        @unless ($loop->last)
                            <hr class="my-4 border-gray-300">
                        @endunless
                    </li>
                @endforeach
</a>
                </ul>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Fermer</title>
                <path
                    d="M14.348 5.651a1 1 0 011.415 1.414L6.414 15H10a1 1 0 010 2H5a1 1 0 01-1-1V4a1 1 0 011-1h5a1 1 0 110 2H6.414l9.349 9.349a1 1 0 11-1.415 1.414L5.586 5.414A1 1 0 014.172 4.002L14 13.83V10a1 1 0 112.002-.002V15a1 1 0 01-1 1H4a1 1 0 01-1-1V4a1 1 0 011-1h10a1 1 0 110 2H5.172l9.176 9.175z" />
            </svg>
        </span>
    </div>
@endif

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

<script><div class="relative">
    <button id="profile-dropdown" class="flex items-center focus:outline-none">
        <span class="mr-1">
            <img src="{{ '/storage/' . Auth::user()->photo }}" alt="" class="logo w-10 h-10 rounded-full">
        </span>
        <i id="dropdown-icon" class="fas fa-caret-down transform transition duration-300"></i>
    </button>
    <div id="dropdown-menu" class="hidden bg-white absolute right-0 mt-2 w-56 rounded-md shadow-lg">
        <hr class="my-1 border-gray-300">
        <form method="POST" action="{{ route('logout') }}" class="inline text-black">
            @csrf
            <button type="submit" class="flex items-center space-x-2 px-4 py-2 hover:bg-gray-100 leading-10 mb-2">
                <i class="fas fa-power-off"></i> <!-- Icône de déconnexion -->
                <span>Déconnexion</span>
                <i class="fas fa-chevron-right ml-auto"></i> <!-- Icône de chevron à droite -->
            </button>
        </form>
        <hr class="my-1 border-gray-300">
        <a href="profile" class="block px-4 py-2 hover:bg-gray-100 leading-10 mb-2 text-black">
            <i class="fas fa-sign-out-alt mr-2"></i> Profil
            <i class="fas fa-chevron-right float-right"></i>
        </a>
    </div>
</div>

<script>
    const dropdownButton = document.getElementById('profile-dropdown');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const dropdownIcon = document.getElementById('dropdown-icon');

    dropdownButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
        dropdownIcon.classList.toggle('fa-caret-down');
        dropdownIcon.classList.toggle('fa-caret-up');
    });
</script>


<section class="py-12 bg-gray-200 shadow-md">
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
<script type="text/javascript">
  window.addEventListener('DOMContentLoaded', function() {
    var message = "Vos frais de déplacement atteignent des sommets ? Publiez votre trajet régulier et partagez vos frais de transport quotidiens.";

    var cardContainer = document.createElement('div');
    cardContainer.className = 'fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center';

    var card = document.createElement('div');
    card.className = 'bg-yellow-500 rounded-lg shadow-md p-6 text-center h-70 w-96 animate-bounce';

    var title = document.createElement('h3');
    title.className = 'text-3xl font-bold text-white mb-4';
    title.textContent = 'Économisez sur vos frais de transport';

    var messageText = document.createElement('p');
    messageText.className = 'text-white';
    messageText.textContent = message;

    var actionButton = document.createElement('button');
    actionButton.className = 'bg-white text-blue-500 font-bold px-4 py-2 rounded-full mt-6 hover:bg-blue-100';
    actionButton.textContent = "Commencer maintenant";

    card.appendChild(title);
    card.appendChild(messageText);
    card.appendChild(actionButton);
    cardContainer.appendChild(card);
    document.body.appendChild(cardContainer);

    document.addEventListener('click', function() {
      cardContainer.remove();
    });
  });
</script>


</body>
</html>
