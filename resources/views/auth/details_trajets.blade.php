<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details_trajets</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Leaflet.js -->
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <!-- Leaflet Control Geocoder -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-control-geocoder/1.13.0/Control.Geocoder.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-control-geocoder/1.13.0/Control.Geocoder.css" />
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    </head>
<body>
    <nav class=" top-0 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class=" mx-auto px-4">
          <div class="flex items-center justify-between py-4">
            <a href="/" class="flex items-center space-x-2">
              <!-- Remplacer le logo par une image personnalisée -->

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
    <section class="py-3  text-center bg-blue-500 text-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between items-center ">
                <div class="mb-8 md:mb-0 md:text-left sticky right-0 top-0 left-0">
                    @if($trajet)
                        <h1 class="text-3xl font-bold">{{ $trajet->ville_d_arrivee }} <span
                                class="fas fa-long-arrow-alt-right mx-2 text-gray-500"></span>{{ $trajet->ville_de_depart }}</h1>
                        <ul class="text-lg mt-4">
                            <li><i class="far fa-clock mr-2"></i>Heure de départ: {{ substr($trajet->heure_depart, 0, 5) }}</li>

                        </ul>
                        <!-- Autres détails du trajet -->
                    @else
                        <p>Le trajet correspondant à l'ID {{ $id }} n'a pas été trouvé.</p>
                    @endif
                </div>
                <div class="md:text-right">
                    @if(auth()->check()) <!-- Vérifiez si l'utilisateur est connecté -->
                        <form action="{{ route('reservation.create', $trajet->id) }}" method="POST">
                            @csrf
                            <div class="flex items-center justify-center">
                                <button
                                    class="w-full bg-blue-500 px-4 py-2 hover:bg-gray-600 text-white font-semibold py-3 rounded-full shadow-lg transition-colors duration-300 focus:outline-none">
                                    Réserver
                                </button>
                            </div>
                        </form>
                    @else
                        <p>Connectez-vous pour effectuer une réservation.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
  <!-- Section avec les détails du conducteur et les préférences -->
<section class="py-12 mx-auto max-w-6xl p-4">
    <div class="flex flex-col md:flex-row  gap-6 justify-center">
        <div class="shadow-lg w-full md:w-3/5 h-auto bg-gradient-to-r from-purple-500 to-purple-700 text-white rounded-md overflow-hidden">
            <!-- Contenu de la première carte -->
            <div class="p-6">
                @if(isset($trajet) && isset($trajet->user))
                <h2 class="text-2xl font-bold mb-4">Conducteur</h2>
                <div class="flex items-center gap-4">
                    <div>
                        @if($trajet->user->photo)
                        <img src="{{ '/storage/' . $trajet->user->photo }}" alt="{{ $trajet->user->name }}"
                            class="w-20 h-20 rounded-full">
                        @else
                        <img src="image_par_defaut.png" alt="{{ $trajet->user->name }}"
                            class="w-20 h-20 rounded-full">
                        @endif
                    </div>
                    <div>
                        <p class="font-bold">{{ $trajet->user->name }}</p>
                        <p class="text-gray-300">Membre depuis : {{ $trajet->user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="flex justify-center items-center mt-6">
                    <a href="#"
                        class="bg-white text-purple-700 font-semibold py-2 px-6 rounded-full hover:bg-gray-200 transition-colors duration-300">Voir son profil</a>
                </div>
                @else
                <p>Informations sur le conducteur non disponibles.</p>
                @endif
            </div>
        </div>
        <div class="shadow-lg w-full md:w-80 h-auto bg-white rounded-lg overflow-hidden">
            <!-- Contenu de la deuxième carte -->
            <div class="p-6">
                @if(isset($trajet))
                <h2 class="text-2xl font-bold mb-2 text-center">Places</h2>
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <p class="text-lg">Prix par place</p>
                        <p class="text-3xl text-purple-700 font-bold">{{ $trajet->prix_par_place }} <span class="text-base">FCFA</span> </p>
                    </div>
                    <div>
                        <p class="text-lg">Places disponibles</p>
                        <p class="text-3xl text-purple-700 font-bold">{{ $trajet->place_disponibles }}</p>
                    </div>
                </div>
                <hr class="border-gray-300 mb-4">
                @if(auth()->check()) <!-- Vérifiez si l'utilisateur est connecté -->
                <form action="{{ route('reservation.create', $trajet->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center justify-center">
                        <button
                            class="w-full bg-blue-500 px-4 py-2 hover:bg-gray-600 text-white font-semibold py-3 rounded-full shadow-lg transition-colors duration-300 focus:outline-none">
                            Réserver
                        </button>
                    </div>
                </form>
            @else
                <p class="text-red-500 text-lg">Connectez-vous pour effectuer une réservation.</p>
            @endif
                @else
                <p>Informations sur les places non disponibles.</p>
                @endif
            </div>
        </div>
    </div>
</section>
<div class="container mx-auto py-8">
    <div class="flex flex-col md:flex-row gap-6 ">
        <div class="md:w-3/4"style="width:70%;">
            <div id="map" class="h-64 md:h-96 shadow-md rounded-md"></div>
        </div>
        <div class="md:w-1/3">
            <h2 class="text-xl font-semibold mb-4">Réservations</h2>
            <div class="bg-white shadow-md rounded-md">
                @if(count($reservations) > 0)
                    <ul class="divide-y divide-gray-200">
                        @foreach($reservations as $reservation)
                            <li class="p-4">
                                @if($reservation->user)
                                    <p class="text-lg font-semibold text-blue-600">{{ $reservation->user->name }}</p>
                                @else
                                    <p class="text-lg font-semibold text-gray-600">Utilisateur inconnu</p>
                                @endif
                                <p class="text-gray-500">Nombre de places réservées : {{ $reservation->nbre_places }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="p-4 italic text-gray-500">Aucune réservation pour ce trajet.</p>
                @endif
            </div>
        </div>
    </div>
</div>

</div>

</div>
    <script>
        // On s'assure que la page est chargée
        window.onload = function(){
            // On initialise la carte sur les coordonnées GPS de l'Afrique de l'Ouest
            let map = L.map('map').setView([10.0, -1.0], 5);

            // On charge les tuiles depuis un serveur au choix, ici OpenStreetMap France
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20
            }).addTo(map);

            // Créer une instance du contrôle de routage
            let control = L.Routing.control({
                // Nous personnalisons le tracé
                lineOptions: {
                    styles: [{color: '#ff8f00', opacity: 1, weight: 7}]
                },

                // Nous personnalisons la langue et le moyen de transport
                router: new L.Routing.osrmv1({
                    language: 'fr',
                    profile: 'car', // car, bike, foot
                }),

                geocoder: L.Control.Geocoder.nominatim()
            }).addTo(map);

            // Écouter l'événement de calcul d'itinéraire
            control.on('routesfound', function(e) {
                // Récupérer les informations sur l'itinéraire
                let routes = e.routes;
                if (routes.length > 0) {
                    // Afficher les informations sur l'itinéraire
                    let route = routes[0];
                    let summary = route.summary;
                    console.log('Distance totale : ' + summary.totalDistance);
                    console.log('Durée totale : ' + summary.totalTime);
                    // ... autres informations d'itinéraire
                }
            });

            // Récupérer les villes de départ et d'arrivée depuis le formulaire précédent
            let ville_de_depart = localStorage.getItem('ville_de_depart');
            let ville_d_arrivee = localStorage.getItem('ville_d_arrivee');

            // Mettre à jour l'itinéraire avec les villes de départ et d'arrivée, s'il y en a
            if (ville_de_depart && ville_d_arrivee) {
                control.setWaypoints([
                    L.latLng(ville_de_depart),
                    L.latLng(ville_d_arrivee)
                ]);
            }
        };
    </script>

    @if(isset($voitures) && $voitures->count() > 0)
    @foreach($voitures as $voiture)
    @endforeach
    @else
    <p>aucune voiture</p>
    @endif
    <div class="card  lg:w-auto shadow-md border border-gray-700 rounded-md max-w-2xl lg:ml-24 mt-10">
        <div class="px-5 py-4 border-b border-gray-700 p-3 bg-gray-500 rounded-tl-md rounded-tr-md">
            <h3 class="mb-0 text-base font-semibold text-white">
                Détails sur le trajet
            </h3>
        </div>
        @if(isset($preferences))
        <div class="py-1 px-7">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-user-friends text-blue-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">Le conducteur accepte de prendre :</span>
                        <span class="">{{ $preferences->preferencesup }}</span>
                    </div>
                </div>
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-money-check-alt text-yellow-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">Le conducteur accepte de recevoir :</span>
                        <span>{{ $preferences->compte_mobile }}</span>
                    </div>
                </div>
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-suitcase text-green-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">Bagages :</span>
                        <span>{{ $preferences->espace_bagage }}</span>
                    </div>
                </div>
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-car-alt text-red-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">Voiture du conducteur :</span><br>
                        <span>Marque : {{ $voiture->marque }}</span><br>
                        <span>Modèle : {{ $voiture->modele }}</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4">
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-wind text-purple-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">La voiture du conducteur est climatisée :</span>
                        <span>{{ $voiture->climatisee ? 'Oui' : 'Non' }}</span><br>
                        <span class="font-semibold">La voiture du conducteur est assurée :</span>
                        <span>{{ $voiture->assuree ? 'Oui' : 'Non' }}</span>
                    </div>

                </div>
                <div class="flex items-center py-4">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-chair text-orange-500 text-3xl"></i>
                    </div>
                    <div>
                        <span class="font-semibold">Le conducteur garantit qu'il n'y aura pas plus de</span>
                        <span>{{ $preferences->nmbre_passager }} passagers à l'arrière</span>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <form action="#" method="POST">
                    @csrf
                    <div class="flex items-center justify-center py-4">
                        <button class="bg-white hover:bg-gray-200 px-4 py-2 border rounded-md transition-colors duration-300 focus:outline-none">
                            Lui écrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
    <p class="bg-gray-200 border border-gray-300 rounded-lg p-4 text-gray-600 text-center">
        Aucune préférence n'a été trouvée pour ce conducteur.
    </p>
    @endif
</div>

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

    <section class="py-10 mt-28 bg-gray-100">
        <div class=" max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
                    <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire.
                    </p>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Mentions légales</h2>
                    <div class="py-3">
                        <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="/politique"
                                class=" hover:text-blue-700">Politique de Confidentialité</a></p>
                        <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="/conditions"
                                class=" hover:text-blue-700">Conditions générales</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Contactez-nous</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i> Burkina
                            Faso-Ouagadougou</p>
                        <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                        <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"
                                class="text-black hover:underline">traorelaw687@gmail.com</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300">Guide d'utilisation</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-angle-double-right"></i><a href="/marche"
                                class=" hover:text-blue-700"> Comment ça marche</a></p>
             <p class="my-2"><i class="fas fa-angle-double-right"></i><a href="#"
                                class=" hover:text-blue-700"> Le covoiturage en 4 points</a></p>                    </div>
            <img src="img/paiement.png" alt="" class="w-36 mx-auto mt-6">
            </div>
            </div>
            <div class="text-center mt-10">
                <p class="">© 2023 <a href=""class="text-red-400">Plateforme</a> . Tous droits réservés.</p>
            </div>
        </div>
    </section>
</body>
</html>
