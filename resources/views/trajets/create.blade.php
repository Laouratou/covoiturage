<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePlateformeCovoiturage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css"/>
</head>
<body class="">

    <nav class=" top-0 z-50 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
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
    <div class="flex flex-wrap ">
        <div class="container py-8 w-8/12">
            <form action="{{ route('trajets.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white w-2/3 p-8 rounded-lg shadow-lg">
                @csrf
                <h1 class="text-3xl font-bold mb-6 text-center">Créer un nouveau trajet</h1>
                <div class="mb-4">
                    <label for="ville_de_depart" class="block text-gray-700 text-sm font-medium mb-2">Ville de départ:</label>
                    <input type="text" id="ville_de_depart" name="ville_de_depart" style="width: 24rem;" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 awesomplete" required>
                    <p id="ville-depart-location" class="text-gray-500 text-sm mt-2"></p>
                </div>
                <div class="mb-4">
                    <label for="ville_d_arrivee" class="block text-gray-700 text-sm font-medium mb-2">Ville d'arrivée:</label>
                    <input type="text" id="ville_d_arrivee" name="ville_d_arrivee" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="place_disponibles" class="block text-gray-700 text-sm font-medium mb-2">Places disponibles :</label>
                    <input type="number" name="place_disponibles" min="1" max="8" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="prix_par_place" class="block text-gray-700 text-sm font-medium mb-2">Prix par place:</label>
                    <input type="number" name="prix_par_place" min="500" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="date_depart" class="block text-gray-700 text-sm font-medium mb-2">Date de départ:</label>
                    <input type="date" name="date_depart" min="{{ date('Y-m-d') }}" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_depart') border-red-500 @enderror" required>
                    @error('date_depart')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <<div class="mb-4">
                    <label for="heure_depart" class="block text-gray-700 text-sm font-medium mb-2">Heure de départ:</label>
                    <input type="time" name="heure_depart" min="" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('heure_depart') border-red-500 @enderror" required>
                    @error('heure_depart')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="heure_d_arrivee" class="block text-gray-700 text-sm font-medium mb-2">Heure d'arrivée:</label>
                    <input type="time" name="heure_d_arrivee" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('heure_d_arrivee') border-red-500 @enderror" required>
                    @error('heure_d_arrivee')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Créer le trajet</button>
                </div>
            </form>
        </div>
        <div class="container py-8 w-4/12">
            <div id="map" class="h-96 w-96 mt-40 mr-auto"></div>
        </div>
    </div>
    <script>
        // Création de la carte
        var map = null;
        var routingControl = null;

        // Coordonnées de carte par défaut (Paris)
        var defaultLatitude = 48.8566;
        var defaultLongitude = 2.3522;

        // Appel à l'API IP Geolocation de GeoJS
        fetch('https://get.geojs.io/v1/ip/geo.json')
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var latitude = data.latitude || defaultLatitude;
                var longitude = data.longitude || defaultLongitude;

                // Centrage de la carte sur la position obtenue ou la position par défaut
                if (!map) {
                    map = L.map('map').setView([latitude, longitude], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                        maxZoom: 18,
                    }).addTo(map);
                }

                // Ajout du marqueur "Vous êtes ici"
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup('Vous êtes ici')
                    .openPopup();
            })
            .catch(function(error) {
                console.log('Erreur lors de la récupération des données de géolocalisation : ' + error.message);

                // Centrage de la carte sur la position par défaut
                if (!map) {
                    map = L.map('map').setView([defaultLatitude, defaultLongitude], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                        maxZoom: 18,
                    }).addTo(map);
                }

                // Ajout du marqueur "Position par défaut"
                L.marker([defaultLatitude, defaultLongitude]).addTo(map)
                    .bindPopup('Position par défaut')
                    .openPopup();
            });

        // Fonction pour obtenir les coordonnées de la ville
        function getCityLocation() {
    var villeDepartInput = document.getElementById('ville_de_depart');
    var villeArriveeInput = document.getElementById('ville_d_arrivee');

    var villeDepart = villeDepartInput.value;
    var villeArrivee = villeArriveeInput.value;

    var villeDepartLatitude, villeDepartLongitude, villeArriveeLatitude, villeArriveeLongitude; // Déclarer les variables ici

    // Appel à l'API de géolocalisation pour obtenir les coordonnées des villes
    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + villeDepart)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.length > 0) {
                villeDepartLatitude = data[0].lat; // Attribuer la valeur ici
                villeDepartLongitude = data[0].lon; // Attribuer la valeur ici

                // Mise à jour de la carte avec la localisation de la ville de départ
                updateMap(villeDepartLatitude, villeDepartLongitude, 'ville_depart', villeDepart);
            }
        });

    fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + villeArrivee)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.length > 0) {
                villeArriveeLatitude = data[0].lat; // Attribuer la valeur ici
                villeArriveeLongitude = data[0].lon; // Attribuer la valeur ici

                // Mise à jour de la carte avec la localisation de la ville d'arrivée
                updateMap(villeArriveeLatitude, villeArriveeLongitude, 'ville_arrivee', villeArrivee);
            }
        });
}

        // Fonction pour mettre à jour la carte avec les nouvelles coordonnées
        function updateMap(latitude, longitude, cityType, cityName) {
            // Coordonnées de carte par défaut (Centre de l'Afrique de l'Ouest)
            var defaultLatitude = 9.6421;
            var defaultLongitude = -6.7725;

            // Création de la carte s'il n'existe pas encore
            if (!map) {
                map = L.map('map').setView([0, 0], 10);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
                }).addTo(map);
            }

            // Centrage de la carte sur la position obtenue ou la position par défaut
            var centerLatitude = latitude || defaultLatitude;
            var centerLongitude = longitude || defaultLongitude;
            map.setView([centerLatitude, centerLongitude], 10);

            // Supprimer tous les marqueurs existants sur la carte
            map.eachLayer(function(layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });

            // Ajout du marqueur à la position obtenue ou la position par défaut
            var marker = L.marker([centerLatitude, centerLongitude]).addTo(map);

            // Ajout d'un popup au marqueur
            var popupText = (cityType === 'ville_depart') ? 'Ville de départ: ' + cityName : 'Ville d\'arrivée: ' + cityName;
            marker.bindPopup(popupText).openPopup();

            // Si les deux villes sont sélectionnées, créer la route
            if (villeDepartInput.value && villeArriveeInput.value) {
                // Supprimer l'ancien itinéraire s'il existe
                if (routingControl) {
                    map.removeControl(routingControl);
                }

                // Créer le nouvel itinéraire
                routingControl = L.Routing.control({
                    waypoints: [
                        L.latLng(parseFloat(villeDepartLatitude), parseFloat(villeDepartLongitude)),
                        L.latLng(parseFloat(villeArriveeLatitude), parseFloat(villeArriveeLongitude))
                    ],
                    routeWhileDragging: true,
                    geocoder: L.Control.Geocoder.nominatim(),
                    router: L.Routing.osrmv1({
                        language: 'fr',
                        profile: 'car'
                    }),
                    lineOptions: {
                        styles: [{ color: '#007BFF', weight: 6 }]
                    }
                }).addTo(map);
            }
        }

        // Événement au changement de la valeur de l'input des villes de départ et d'arrivée
        var villeDepartInput = document.getElementById('ville_de_depart');
        var villeArriveeInput = document.getElementById('ville_d_arrivee');
        villeDepartInput.addEventListener("input", getCityLocation);
        villeArriveeInput.addEventListener("input", getCityLocation);

        // Initialisation de la carte avec la position par défaut
        updateMap(null, null);
        if (villeDepartInput.value && villeArriveeInput.value) {
            // Supprimer l'ancienne polyline s'il existe
            if (routingControl) {
                map.removeLayer(routingControl.getPlan().getRouteContainer());
            }

            // Créer le nouvel itinéraire
            routingControl = L.Routing.control({
                waypoints: [
                    L.latLng(parseFloat(villeDepartLatitude), parseFloat(villeDepartLongitude)),
                    L.latLng(parseFloat(villeArriveeLatitude), parseFloat(villeArriveeLongitude))
                ],
                routeWhileDragging: true,
                geocoder: L.Control.Geocoder.nominatim(),
                router: L.Routing.osrmv1({
                    language: 'fr',
                    profile: 'car'
                })
            }).addTo(map);

            // Écouter l'événement de calcul de l'itinéraire pour tracer la ligne sur la carte
            routingControl.on('routesfound', function(e) {
                var routes = e.routes;
                var summary = routes[0].summary;

                // Récupérer les coordonnées de la route
                var coordinates = [];
                routes[0].coordinates.forEach(function(coord) {
                    coordinates.push([coord[1], coord[0]]);
                });

                // Tracer la ligne sur la carte
                var routeLine = L.polyline(coordinates, { color: '#007BFF' }).addTo(map);

                // Ajouter la distance et la durée au popup du marqueur de la ville d'arrivée
                var popupText = 'Distance : ' + summary.totalDistance + '<br> Durée : ' + summary.totalTime;
                L.marker([villeArriveeLatitude, villeArriveeLongitude]).addTo(map)
                    .bindPopup(popupText)
                    .openPopup();
            });
        }
    </script>
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
</body>
</html>
