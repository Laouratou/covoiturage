<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Réserver le trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-gray-100">

    <nav class="fixed top-0 z-50 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class="  px-4">
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
              <a href="/conducteurs" class=" hover:text-pink-200 mr-4 text-lg">
               Retour à la liste des trajets
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
    <div class="container mx-auto py-16 mt-8">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold mb-4">Réserver le trajet</h1>
                <div class="">
                    <div class="modal-header bg-gray-100 p-4 rounded-t-lg">
                        <h3 class="text-xl font-bold">
                            Réservez le trajet
                            @if($trajet)
                            <h1 class=" font-bold">{{ $trajet->ville_d_arrivee }} <span
                                class="fas fa-long-arrow-alt-right mx-2 text-gray-500"></span>{{ $trajet->ville_de_depart }}</h1>
                        <!-- Autres détails du trajet -->

                        @else
                        <p>Le trajet correspondant à l'ID {{ $id }} n'a pas été trouvé.</p>
                        @endif
                    </div>
                    <small class="text-sm">
                       <span> {{ substr($trajet->heure_depart, 0, 5) }}</span>
                    </small>
                    <span class="text-gray-600 text-sm">
                        {{ $trajet->ville_de_depart }} → {{ $trajet->ville_d_arrivee }}
                    </span>

                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('reservation.reserve', ['trajet' => $trajet->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-4">
                            <label for="place" class="block text-gray-700 font-semibold mb-2">Places</label>
                            <select name="nbre_places" id="Place" class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500 w-full" required onchange="updatePrix()">
                                @for ($i = 1; $i <= min(3, $trajet->place_disponibles); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="montant_payer_trajet1" class="block text-gray-700 font-semibold mb-2">Prix</label>
                            <span id="montant_total" class="text-gray-700">{{ $trajet->prix_par_place }}  FCFA</span>
                        </div>
                        <script>
                            // Fonction pour mettre à jour le prix en fonction du nombre de places
                            function updatePrix() {
                                var nbrePlaces = document.getElementById("Place").value; // Récupère le nombre de places sélectionnées
                                var prixParPlace = parseFloat({{ $trajet->prix_par_place }}); // Convertit le prix par place en nombre

                                var montantTotal = nbrePlaces * prixParPlace; // Calcul du montant total

                                // Affiche le montant total
                                document.getElementById("montant_total").innerText = montantTotal.toFixed(2);
                            }
                        </script>

                        <!-- Reste du contenu du formulaire -->

                        <p class="text-center mb-4 text-gray-700 font-light">
                            Votre demande sera envoyée au conducteur, ensuite vous procéderez au paiement une fois que le conducteur aura confirmé la demande.
                            <i><a href="javascript:void();" class="nolink text-black" rel="tooltip" data-toggle="tooltip" data-placement="top" data-original-title="Vous serez notifié par SMS/WhatsApp/Email lorsque le conducteur aura accepté votre demande en vue de procéder au paiement via un lien sécurisé."><i class="fa fa-question-circle"></i></a></i>
                        </p>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full w-full">Réserver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="py-10 mt-28 bg-gray-300 shadow-md">
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
