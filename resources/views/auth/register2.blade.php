<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   <style>nav.scrolled {
    font-weight: bold;
    background-color: white;
  /* Ajoutez d'autres styles de votre choix pour le menu défilé */
}</style>
    <title>Inscription</title>
</head>
<body class="bg-gray-100">
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
          <img src="img/welcome3.jpeg" alt="Image" class="w-full md:max-w-full object-cover md:transform md:translate-x-0 md:translate-x-8 h-full ">
        </div>
    <div class="mx-auto h-auto">
        <form action="{{ route('register2') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8  pb-8">
            <h1 class="text-2xl font-bold mb-8 text-center">INSCRIVEZ-VOUS</h1>
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500
                    placeholder-gray-400 focus:placeholder-blue-500">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 relative">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500
                    placeholder-gray-400 focus:placeholder-blue-500">
                <span
                    class="absolute top-0 left-0 px-2 py-1 text-xs text-gray-600 transition-all duration-300 transform origin-top-left -translate-y-2">{{ __('') }}</span>
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mot de passe</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 pr-10
                        placeholder-gray-400 focus:placeholder-blue-500">
                    <span class="absolute top-0 right-0 pr-3 h-full flex items-center cursor-pointer" id="toggle-password">
                        <i class="fas fa-eye text-gray-400"></i>
                    </span>
                </div>
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 relative">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le mot de passe</label>
                <div class="relative">
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 pl-10 pr-4
                        placeholder-gray-400 focus:placeholder-blue-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <span class="absolute inset-y-0 right-0 flex items-center pr-3" id="toggle-password-confirmation">
                        <i class="fas fa-times-circle text-red-500"></i>
                    </span>
                </div>
                @error('password_confirmation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <script>
                const togglePasswordConfirmation = document.getElementById('toggle-password-confirmation');
                const passwordConfirmationInput = document.getElementById('password_confirmation');

                passwordConfirmationInput.addEventListener('input', function () {
                    const password = document.getElementById('password').value;
                    const passwordConfirmation = passwordConfirmationInput.value;
                    const isValid = password === passwordConfirmation;

                    togglePasswordConfirmation.querySelector('i').classList.toggle('fa-times-circle', !isValid);
                    togglePasswordConfirmation.querySelector('i').classList.toggle('fa-check-circle', isValid);
                });
            </script>
            <div class="mb-4">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo</label>
                <div class="flex items-center border rounded border-gray-300">
                    <input type="file" id="photo" name="photo" accept="image/*" required class="hidden">
                    <label for="photo" class="cursor-pointer  hover:text-blue-700 font-bold py-2 px-4 rounded">
                        Choisir une photo
                    </label>
                    <span class="ml-3" id="photo-file-name">Aucune photo choisie</span>
                </div>
                @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="photo_immatriculation" class="block text-gray-700 text-sm font-bold mb-2">Photo d'immatriculation</label>
                <div class="flex items-center border rounded border-gray-300">
                    <input type="file" id="photo_immatriculation" name="photo_immatriculation" accept="image/*" required class="hidden">
                    <label for="photo_immatriculation" class="cursor-pointer  hover:text-blue-700 font-bold py-2 px-4 rounded">
                        <i class="fas fa-upload mr-2"></i> Choisir une photo d'immatriculation
                    </label>
                    <span class="ml-3" id="photo-immat-file-name">Aucune photo choisie</span>
                </div>
                @error('photo_immatriculation')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="annee_experience" class="block text-gray-700 text-sm font-bold mb-2">Année d'expérience</label>
                <div class="relative">
                    <input type="number" id="annee_experience" name="annee_experience" value="{{ old('annee_experience') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500
                        placeholder-gray-400 focus:placeholder-blue-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="far fa-calendar-alt text-gray-400"></i>
                    </span>
                </div>
                @error('annee_experience')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                <div class="relative">
                    <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone"
                        placeholder="+226 63174848" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500
                        placeholder-gray-400 focus:placeholder-blue-500">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-phone-alt text-gray-400"></i>
                    </span>
                </div>
                @error('telephone')
                <span class="text-red-500 text-sm  ">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4">
                <div class="flex items-center">
                    <input type="checkbox" id="accept_conditions" name="accept_conditions" class="mr-2">
                    <label for="accept_conditions" class="text-sm text-gray-700">J'accepte les <a href="/conditions" class="text-blue-500 hover:underline">conditions d'utilisation</a></label>
                </div>
                <x-input-error :messages="$errors->get('accept_conditions')" class="mt-2" />
            </div>

            <div class="flex flex-col gap-6 items-end">
                <div class="flex items-center justify-end mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-gray-500 underline hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Déjà enregistré ?') }}
                    </a>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Enregistrer
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
<script>
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePassword.querySelector('i').classList.toggle('fa-eye');
        togglePassword.querySelector('i').classList.toggle('fa-eye-slash');
    });
</script>
    <script>
        window.addEventListener('scroll', function() {
            var nav = document.querySelector('nav');
            var scrolled = window.scrollY > 0;
            nav.classList.toggle('scrolled', scrolled);
        });
    </script>
    <script>
        document.getElementById('photo').addEventListener('change', function(e) {
            const fileName = e.target.files[0].name;
            document.getElementById('photo-file-name').textContent = fileName;
        });

        document.getElementById('photo_immatriculation').addEventListener('change', function(e) {
            const fileName = e.target.files[0].name;
            document.getElementById('photo-immat-file-name').textContent = fileName;
        });
    </script>

    <section class="py-10 mt-28 bg-gray-200">
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
                                class="text-gray-500 hover:text-blue-700">Politique de Confidentialité</a> </p>
                        <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="/conditions"
                                class="text-gray-500 hover:text-blue-700">Conditions générales</a> </p>
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
                                class="text-gray-500 hover:text-blue-700"> Comment ça marche</a> </p>
                        <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="#"
                                class="text-gray-500 hover:text-blue-700"> Le covoiturage en 4 points</a> </p>
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
