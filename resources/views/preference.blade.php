<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
    <div class="max-w-3xl mx-auto bg-white shadow p-8 rounded-lg mt-8">
        <h2 class="text-2xl font-bold mb-4">Préférences de trajet</h2>
        <p class="text-sm text-red-400">NB: Nous retiendrons ces preferences pour tous vos propositions de trajet de covoiturage</p>
        <form action="{{ route('preferences.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="espace_bagage" class="block text-sm font-medium text-gray-700">Espace de bagage :</label>
                <select name="espace_bagage" id="espace_bagage" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="non_specifie">Non spécifié</option>
                    <option value="petit">Petit - ex: sac à dos, mallette</option>
                    <option value="moyen">Moyen - ex: sac de weekend</option>
                    <option value="grand">Grand - ex: sac de voyage, valise</option>
                </select>

                @error('espace_bagage')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="nmbre_passager" class="block text-sm font-medium text-gray-700">Nombre de passagers à l'arrière :</label>
                <select name="nmbre_passager" id="nmbre_passager" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="plus_de_2">Plus de 2</option>
                    <option value="moins_de_2">Moins de 2</option>
                    <option value="superieur_ou_egal_a_2">Supérieur ou égal à 2</option>
                </select>
                @error('nmbre_passager')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <p id="preferencesup" class="block text-sm font-medium text-gray-700">Préférences supplémentaires <span class="text-purple-700 text-xl">J'accepte</span> :</p>
                <div class="mt-2 space-y-2">
                    <label for="tout le monde" class="inline-flex items-center">
                        <input type="checkbox" name="preferencesup[]" value="tous" id="tout le monde" class="form-checkbox h-4 w-4 text-blue-500">
                        <span class="ml-2 flex items-center">
                            <i class="fas fa-users text-pink-500 mr-1"></i>
                            Tout le monde
                        </span>
                    </label><br>
                    <label for="Uniquement les hommes" class="inline-flex items-center">
                        <input type="checkbox" name="preferencesup[]" value="non_fumeurs" id="Uniquement les hommes" class="form-checkbox h-4 w-4 text-blue-500">
                        <span class="ml-2 flex items-center">
                            <i class="fas fa-male text-blue-500 mr-1"></i>
                            Uniquement les hommes
                        </span>
                    </label>
                    <label for=" Uniquement les femmes" class="inline-flex items-center">
                        <input type="checkbox" name="preferencesup[]" value=" Uniquement les femmes" id=" Uniquement les femmes" class="form-checkbox h-4 w-4 text-blue-500">
                        <span class="ml-2 flex items-center">
                            <i class="fas fa-female text-pink-500 mr-1"></i>
                            Uniquement les femmes
                        </span>
                    </label><br>
                    <label for="pas_de_fumeurs" class="inline-flex items-center">
                        <input type="checkbox" name="preferencesup[]" value="pas_de_fumeurs" id="pas_de_fumeurs" class="form-checkbox h-4 w-4 text-blue-500">
                        <span class="ml-2 flex items-center">
                            <i class="fas fa-smoking-ban text-red-500 mr-1"></i>
                            Pas de fumeurs
                        </span>
                    </label>
                </div>
                @error('preferencesup')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-sm font-medium text-gray-700">Commentaires :</label>
                <textarea name="comment" id="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
                @error('comment')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

        <div class="mb-4">
            <label for="num_paiement" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
            <input id="num_paiement" type="text" name="num_paiement" value="{{ old('num_paiement') }}" required autocomplete="telephone" placeholder="+226 63174848" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            @error('num_paiement')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
            <div class="mb-4">
                <label for="compte_mobile" class="block text-sm font-medium text-gray-700">Compte mobile money :</label>
                <select name="compte_mobile" id="compte_mobile" required class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="orange">Orange</option>
                    <option value="moov">Moov</option>
                    <option value="mtn">MTN</option>
                </select>
                @error('compte_mobile')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-purple-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Enregistrer</button>
        </form>
    </div>
    <section class="py-10 mt-12 bg-gray-200 shadow-md">
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
