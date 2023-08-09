<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/clockpicker/dist/bootstrap-clockpicker.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Liste des trajets pour les passagers</title>
    <style>
        .container {
            max-width: 1140px;
            margin-left: auto;
            margin-right: auto;
        }

        @media (max-width: 767px) {
            .container {
                padding-left: 15px;
                padding-right: 15px;
            }
        }
    </style>
</head>
<body>


    <nav class="fixed top-0 z-20 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
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
              <a href="{{ route('reservations.my_reservations') }}" class="text-lg  rounded-md text-white">Voir mes réservations</a>
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

      <section class="hero-image mt-14 ">
        <div class="container py-8 text-center">
            <div class="flex items-center justify-center">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg border">
                    <h2 class="text-2xl font-bold mb-6">Trouvez votre trajet</h2>
                    <form action="{{ route('search.trajets') }}" method="GET" class="flex flex-wrap gap-4 justify-center">
                        <div class="w-full md:w-1/3">
                            <label for="ville_de_depart" class="block text-gray-700 text-sm font-medium mb-2">Départ</label>
                            <input type="text" name="ville_de_depart" id="ville_de_depart" placeholder="Départ"
                                class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="w-full md:w-1/3">
                            <label for="ville_d_arrivee" class="block text-gray-700 text-sm font-medium mb-2">Destination</label>
                            <input type="text" name="ville_d_arrivee" id="ville_d_arrivee" placeholder="Destination"
                                class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="w-full md:w-1/3">
                            <label for="date_depart" class="block text-gray-700 text-sm font-medium mb-2">Date de départ</label>
                            <input type="date" name="date_depart" id="date_depart"
                                class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="w-full md:w-1/3">
                            <label for="heure_depart" class="block text-gray-700 text-sm font-medium mb-2">Heure de départ</label>
                            <input type="time" name="heure_depart" id="heure_depart"
                                class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                        <div class="w-full md:w-1/3">
                            <button class="block w-full bg-purple-600 hover:bg-blue-700 text-white font-bold py-4 rounded-lg mt-8" type="submit">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="flex flex-col lg:flex-row gap-x-10">
        <div id="" class="w-full lg:w-1/4 p-4 lg:ml-16">
            <div class="sticky top-16 border-2 border-gray-300 rounded p-4">
                <h4 class="text-lg font-medium mb-4">Filtrer les résultats</h4>
                <form action="{{ route('trajets.filtrer') }}" method="GET">
                    <div class="mb-6">
                        <h4 class="text-lg font-medium mb-2">Date de départ</h4>
                        <div class="relative">
                            <input type="date" id="filter_datepicker" name="date" class="datepicker search-form__control with-icon--sm icon-pickup border rounded px-4 py-2 w-full">
                            <span class="absolute right-2 top-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v2m0 8v2m6-4h2m-16 0h2" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h4 class="text-lg font-medium mb-2">Confort</h4>
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="confort" onclick="this.form.submit();" id="require-comfort1" value="1" class="mr-2">
                            <label for="require-comfort1" class="text-gray-700">Prix max 700</label>

                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-medium mb-2">Heure de départ</h4>
                        <div class="flex items-center">
                            <input type="time" name="heure" id="filter-timepicker" class="form-control mr-2 border rounded px-4 py-2" placeholder="Entrez une heure">
                        </div>
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Filtrer</button>
                </form>
            </div>
        </div>
        <div class="w-full lg:w-3/4">
            @if(isset($trajets) && $trajets->count() > 0)
                <p class="text-blue-800 text-4xl font-bold mb-6">
                    @if ($trajets->total() == 1)
                        1 conducteur disponible. <span class="text-red-500 text-lg">Cliquez sur un trajet pour commencer la réservation</span>
                    @else
                        {{ $trajets->total() }} conducteurs disponibles. <span class="text-red-500 text-lg">Cliquez sur un trajet pour commencer la réservation</span>
                    @endif
                </p>
                <div id="trajets-container"></div>
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($trajets as $trajet)
                        <a href="{{ route('trajets.details', ['id' => $trajet->id]) }}" class="block">
                            <div class="bg-gray-100 p-8 shadow-md rounded-lg grid grid-cols-3 gap-4">
                                <div class="">
                                    <span class="mr-1">
                                        <img src="{{ '/storage/' . $trajet->user->photo }}" alt="" class="logo w-20 h-20 rounded-full object-cover">
                                    </span>
                                    <!-- À l'intérieur de la boucle foreach -->

                                    <h2 class="text-xl font-bold text-blue-800">{{ $trajet->user->name }}</h2>
                                   <!------
                                    <div class="w-full md:w-auto mb-4">
                                        <div class="flex items-center">
                                            <span class="text-yellow-500 mr-1 cursor-pointer star" data-rating="1"><i class="fas fa-star"></i></span>
                                            <span class="text-yellow-500 mr-1 cursor-pointer star" data-rating="2"><i class="fas fa-star"></i></span>
                                            <span class="text-yellow-500 mr-1 cursor-pointer star" data-rating="3"><i class="fas fa-star"></i></span>
                                            <span class="text-yellow-500 mr-1 cursor-pointer star" data-rating="4"><i class="fas fa-star"></i></span>
                                            <span class="text-yellow-500 cursor-pointer star" data-rating="5"><i class="fas fa-star"></i></span>
                                        </div>
                                    </div>
----->
<!-- ... Autres parties de la vue ... -->
<!----------
@if(session()->has('review_rating'))
    <p>Note donnée : {{ session('review_rating') }}/5</p>
@else
    <p class="text-red-400 text-sm">Aucun avis donné pour ce trajet.</p>
@endif
----->
<!-- ... Autres parties de la vue ... -->

                                    @php
                                        $created_at = \Carbon\Carbon::parse($trajet->user->created_at)->locale('fr');
                                    @endphp
                                    <h2>Membre depuis le : {{ $created_at->isoFormat('dddd DD MMMM YYYY') }}</h2>
                                </div>

                                <div class="">
                                    <div class="flex items-center justify-between">
                                        @php
                                            $dateDepart = \Carbon\Carbon::parse($trajet->date_depart)->locale('fr');
                                            $anneeActuelle = \Carbon\Carbon::now()->year;
                                        @endphp

                                        @if ($dateDepart->year < $anneeActuelle)
                                            <h1 class="text-xl">Saisissez une année à jour</h1>
                                        @else
                                            <h1 class="text-xl">Départ : {{ $dateDepart->isoFormat('dddd DD MMMM YYYY') }}</h1>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between mt-2">
                                        <div>
                                            <p class="text-lg text-gray-500 ">{{ $trajet->ville_de_depart }} &rarr; {{ $trajet->ville_d_arrivee }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">{{ substr($trajet->heure_depart, 0, 5) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mt-2">
                                        <div>
                                            <p class="text-lg text-gray-500">Places disponibles: {{ $trajet->place_disponibles }}</p>
                                        </div>
                                        <div>
                                            @if($trajet->vehicule_climatise)
                                                <i class="fas fa-snowflake text-blue-500"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center  ">
                                    <h3 class=" font-bold text-blue-800"><span class="text-3xl text-gray-700"> {{ $trajet->prix_par_place }}</span> FCFA</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <!-- Affichage des liens de pagination -->
                {{ $trajets->links() }}
            @else
                <p class="text-blue-800 text-4xl font-bold mb-6">Aucun conducteur disponible</p>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
    <script>
        flatpickr("#filter_datepicker", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });

        $('#filter-timepicker').clockpicker({
            donetext: 'Terminé'
        });
    </script>

    <section class="mt-12 py-5 bg-gray-100 shadow-md">
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
