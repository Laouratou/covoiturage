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

    <title>Réservation</title>
</head>
<body>
    <nav class=" z-50 w-full bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class=" px-4">
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
      <section class="py-10">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-4">Mes réservations</h1>
            @if ($reservations->isEmpty())
                <p class="text-gray-600">Aucune réservation trouvée.</p>
            @else
                <ul class="space-y-6">
                    @foreach ($reservations as $reservation)
                        <li class="bg-white shadow-md p-4 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <!-- Nom du conducteur -->
                                <p class="text-gray-600">Conducteur: <span class="text-lg font-bold">{{ $reservation->trajet->user->name }}</span></p>
                                <p class="text-gray-600">Prix de la place: <span class="text-lg font-bold">{{ $reservation->trajet->prix_par_place }}  FCFA</span></p>
                            </div>
                            <div>
                                <p class="text-gray-700">Ville de départ: <span class="text-lg font-bold">{{ $reservation->trajet->ville_d_arrivee }} -> {{ $reservation->trajet->ville_de_depart }}</span></p>
                                <p class="text-gray-700">Nombre de places: <span class="text-lg font-bold">{{ $reservation->nbre_places }}</span></p>
                            </div>
                            <!-- Statut de la réservation -->
                            <div class="mt-2">
                                Statut: <span class="text-red-500 text-2xl">{{ $reservation->status }}</span>
                            </div>
                            <div class="mt-4 flex justify-end">
                                @if ($reservation->status === 'en attente')

                                <form id="cancelForm-{{ $reservation->id }}" action="{{ route('reservations.cancel', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="success_message" value="La réservation a été annulée avec succès.">
                                    <button type="button" class="text-blue-600 hover:text-blue-800 ml-4" onclick="confirmCancel('cancelForm-{{ $reservation->id }}')">Annuler</button>
                                </form>

                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
    <script>
        function confirmCancel(formId) {
            if (confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')) {
                document.getElementById(formId).submit();
            }
        }
    </script>

    <!--------<script>
        function confirmDelete(formId) {
            // Afficher une boîte de dialogue de confirmation
            const confirmation = confirm("Voulez-vous vraiment supprimer cette réservation ?");

            // Si l'utilisateur clique sur "OK" dans la boîte de dialogue, le formulaire sera soumis
            // Sinon, le formulaire ne sera pas soumis
            if (confirmation) {
                document.getElementById(formId).submit();
            }
        }

        function confirmCancel(formId) {
            // Afficher une boîte de dialogue de confirmation
            const confirmation = confirm("Voulez-vous vraiment annuler cette réservation ?");

            // Si l'utilisateur clique sur "OK" dans la boîte de dialogue, soumettre le formulaire
            if (confirmation) {
                document.getElementById(formId).submit();
            }
        }
    </script>
----->
    <section class="py-8 bg-gray-100 shadow-md">
        <div class=" max-w-7xl">
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
