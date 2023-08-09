<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePlateformeCovoiturage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .text-animation {
          overflow: hidden; /* Masque le texte qui sort de la zone */
          white-space: nowrap; /* Empêche le texte de passer à la ligne */
          animation: animateText 2s steps(40, end);
          border-right: 2px solid transparent; /* Ajoute un effet de curseur clignotant */
          display: inline-block;
        }
        .carousel-container {
  overflow: hidden;
}

.carousel-track {
  display: flex;
  transition: transform 0.3s ease-in-out;
}

.carousel-slide {
  flex: 0 0 100%;
}


        /* Animation pour faire apparaître le texte lettre par lettre */
        @keyframes animateText {
          from {
            width: 0;
          }
          to {
            width: 100%;
          }
        }
      </style>

</head>
<body class="bg-gray-200">
    <div class="welcome-card">
        <h1 class="title">Bienvenue sur VotrePlateformeCovoiturage</h1>
        <p class="description">Trouvez facilement des trajets partagés près de chez vous.</p>
      </div>
  <!-- Barre de navigation -->
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

   <!-- Script pour afficher/masquer le dropdown -->
   <script>
    document.addEventListener('click', function(e) {
      const profileDropdown = document.getElementById('profileDropdown');
      const profileDropdownContent = document.getElementById('profileDropdownContent');
      const target = e.target;
      const isDropdownButton = profileDropdown.contains(target);
      const isDropdownContent = profileDropdownContent.contains(target);

      if (!isDropdownButton && !isDropdownContent) {
        profileDropdownContent.classList.add('hidden');
      } else {
        profileDropdownContent.classList.toggle('hidden');
      }
    });
  </script>

  <!-- Section d'accueil -->
  <header class="hero bg-gray-200 bg-cover bg-center ">
    <div class="container mx-auto py-8 px-4  lg:px-8">
        <div class="bg-gray-100 py-10">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h1 class="text-2xl font-bold mb-4">Trouvez des covoiturages près de chez vous.</h1>
                        <form action="{{ route('search.trajets') }}" method="GET">
                            <div class="mb-4">
                                <label for="ville_de_depart" class="block text-gray-700 text-sm font-medium">Départ</label>
                                <input type="text" name="ville_de_depart" id="ville_de_depart" placeholder="Départ"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="mb-4">
                                <label for="ville_d_arrivee" class="block text-gray-700 text-sm font-medium">Destination</label>
                                <input type="text" name="ville_d_arrivee" id="ville_d_arrivee" placeholder="Destination"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="date_depart" class="block text-gray-700 text-sm font-medium">Date</label>
                                    <input type="date" name="date_depart" id="date_depart"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                                <div>
                                    <label for="heure_depart" class="block text-gray-700 text-sm font-medium">Heure de départ</label>
                                    <input type="time" name="heure_depart" id="heure_depart"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring focus:border-blue-300">
                                </div>
                            </div>
                            <button class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded-lg">
                                Rechercher
                            </button>
                        </form>
                    </div>

                    <div class="hidden md:flex items-center justify-center">
                        <img src="img/business.jpg" alt="Image de covoiturage" class="w-full h-auto object-cover md:h-full md:w-full">
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>


  <section class="bg-gray-100">
    <div class="bg-gray-100">
      <div class="grid grid-cols-1 sm:grid-cols-2 py-2 gap-x-6  ">
          <div class=" sm:ml-28 ">
              <h2  class="text-xl"><span class="text-2xl">Conducteurs</span>,   proposez un trajet</h2>
              <p class="font-light my-4">Devenez conducteur et contribuez à réduire le trafic en partageant votre véhicule avec d'autres personnes qui se rendent dans la même direction.</p>
              @auth
              @if (Auth::user()->role === 'conducteur')
                <a href="/trajets/create" class="hover:bg-gray-600 text-white font-bold py-2 px-4 bg-yellow-500 rounded">Proposez un trajet</a>
              @else
                <p class="text-red-600 mt-4">Désolé, vous devez être un conducteur pour proposer un trajet.</p>
              @endif
            @endauth
              <div class=" flex flex-col md:flex-row ">
              <img src="img/img5.jpg" alt=""class="w-32 object-contain">
  <ul class="px-8  text-sm  py-6">
  <li class="my-2 "><i class="far fa-check-circle fa-spin" style="color: #12af2d;"></i>   Permet de réduire le nombre de voitures sur la route en regroupant plusieurs personnes dans un seul véhicule.</p>
  <li class="my-2 "> <i class="far fa-check-circle fa-spin" style="color: #12af2d;"></i>  En regroupant plusieurs personnes dans une seule voiture, le covoiturage contribue à réduire les émissions de gaz à effet de serre et la pollution atmosphérique.</p>
  <li class="my-2 "><i class="far fa-check-circle fa-spin" style="color: #12af2d;"></i>   Avec les plateformes de covoiturage en ligne et les applications dédiées, il est devenu plus facile de planifier et d'organiser des trajets en covoiturage. </li>
  <li class="my-2"><i class="far fa-check-circle fa-spin" style="color: #12af2d;"></i>   <a href="#"class="hover:text-red-500 text-blue-500">Pour en savoir plus sur vos avantages,cliquez-ici</a></li>
  </ul>
  </div>
            </div>
          <div  class="relative">
              <img src="img/smiley2.jpg" alt="" class="w-10/12 h-full object-cover shadow-lg mx-auto md:mx-0">
               <div class="absolute -top-1/3 left-0 w-full h-full flex items-center justify-center">
      <div class="bg-blue-500 py-1 px-2 md:ml-72 md:-mt-32  -mt-28 ml-32 ">
        <h1 class="text-base font-bold text-white">Conducteurs</h1>
      </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 py-4 gap-x-6 ">
        <div class="relative">
          <img src="img/smiley.jpg" alt=""class="w-10/12 sm:ml-auto py-10 md:py-0 object-cover mx-auto md:ml-28"style="height:330px;">
          <div class="absolute -top-1/3 left-0 w-full h-full flex items-center justify-center">
            <div class="bg-blue-500 py-1 px-4 md:ml-auto md:-mt-20  ml-48 ">
              <h1 class="text-base font-bold text-white">Passagers</h1>
            </div>
                </div>
        </div>
        <div>
  <h2 class="text-2xl py-2 px-4"><span class="text-2xl">Passagers</span>, recherchez un trajet</h2>
  <p class="text-xl  sm:text-center">Déplacez-vous en toute confiance et à moindre coût.</p>

  <ul class="px-20 py-2">
  <li><i class="fas fa-check-square" style="color: #3bc115;"></i>    Se deplacer a  moindre coûts</li>
  <li><i class="fas fa-check-square" style="color: #3bc115;"></i>   Soyez plus a l'aise</li>
  <li><i class="fas fa-check-square" style="color: #3bc115;"></i>   Choisir parmi plusieurs trajets et horaires</li>
  <li class="my-2 font-bold "><i class="fas fa-check-square" style="color: #3bc115;"></i>   <a href="#"class="hover:text-red-500 text-blue-500">Pour en savoir plus sur vos avantages,cliquez-ici</a></li>
  <div class="py-3">
  <button class="bg-blue-500 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded">
    Rechercher un trajet
  </button>
  </div>
  </ul>
        </div>
          </div>
        </div>
        <br>
        <br>

  </section>
  <section class="py-6 bg-white">
    <div class="container mx-auto">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold">Pourquoi choisir BlabberRide ?</h2>
        <p class="text-gray-600">Découvrez les avantages de notre plateforme de covoiturage.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-lg p-6 shadow-md">
          <i class="fas fa-lock fa-3x mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Sécurisé</h3>
          <p class="text-sm">Vos paiements et données personnelles sont sécurisés.</p>
        </div>
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-lg p-6 shadow-md">
          <i class="fas fa-headset fa-3x mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Support</h3>
          <p class="text-sm">Notre équipe support est disponible 24/7 pour vous aider.</p>
        </div>
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-lg p-6 shadow-md">
          <i class="fas fa-leaf fa-3x mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Engagement écologique</h3>
          <p class="text-sm">En covoiturant, vous contribuez à préserver l'environnement.</p>
        </div>
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-lg p-6 shadow-md">
          <i class="fas fa-users fa-3x mb-4"></i>
          <h3 class="text-xl font-bold mb-2">Communauté</h3>
          <p class="text-sm">Rejoignez une communauté de covoitureurs enthousiastes.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-gray-200 py-10">
    <div class="container mx-auto">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold">Témoignages Inspirants</h2>
        <p class="text-gray-600">Découvrez les témoignages de nos utilisateurs satisfaits.</p>
      </div>
      <div class="flex flex-wrap justify-center">
        <div class="carousel-container">
          <div class="carousel-track">
            <div class="carousel-slide">
              <div class="bg-white rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                  <img src="img/photo9.jpg" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                  <h4 class="text-xl font-bold">Alice D.</h4>
                </div>
                <p class="text-sm text-gray-600">"J'adore BlabberRide ! J'ai économisé beaucoup d'argent en partageant des trajets avec d'autres conducteurs. Je le recommande à tous mes amis."</p>
              </div>
            </div>
            <div class="carousel-slide">
              <div class="bg-white rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                  <img src="img/photo10.jpg" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                  <h4 class="text-xl font-bold">John S.</h4>
                </div>
                <p class="text-sm text-gray-600">"Je suis un conducteur régulier sur BlabberRide, et c'est incroyable de voir à quel point la communauté grandit. Cela a rendu mes trajets beaucoup plus agréables."</p>
              </div>
            </div>
            <div class="carousel-slide">
              <div class="bg-white rounded-lg p-6 shadow-md">
                <div class="flex items-center mb-4">
                  <img src="img/photo8.jpg" alt="Avatar" class="w-10 h-10 rounded-full mr-4">
                  <h4 class="text-xl font-bold">Emma W.</h4>
                </div>
                <p class="text-sm text-gray-600">"BlabberRide m'a aidé à trouver des passagers pour mes trajets quotidiens vers le travail. Cela me permet de réduire mes frais de transport."</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <section class="py-10  bg-gray-100 shadow-md">
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
    // Supposons que vous avez une fonction pour récupérer le rôle de l'utilisateur
    // Cette fonction pourrait utiliser des cookies, des sessions ou d'autres mécanismes
    function getRole() {
      // Ici, vous devez mettre en place la logique pour obtenir le rôle de l'utilisateur
      // et retourner la valeur 'passager' ou 'conducteur'
      // Par exemple, en utilisant des cookies ou des sessions
      return 'passager'; // Remplacez cette valeur par le vrai rôle de l'utilisateur
    }

    // Au chargement de la page, vous pouvez exécuter ce code pour générer le lien approprié
    document.addEventListener('DOMContentLoaded', function() {
      const role = getRole();
      const reservationLink = document.getElementById('reservation-link');

      // Selon le rôle de l'utilisateur, mettez à jour l'attribut "href" du lien
      if (role === 'passager') {
        reservationLink.href = "my-reservations";
      } else if (role === 'conducteur') {
        reservationLink.href = "/reservations";
      }
    });
</script>
<script>
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-slide');
    const slideWidth = slides[0].clientWidth;

    let index = 0;

    function updateSlidePosition() {
      track.style.transform = `translateX(${-slideWidth * index}px)`;
    }

    function moveToNextSlide() {
      index = (index + 1) % slides.length;
      updateSlidePosition();
    }

    setInterval(moveToNextSlide, 5000); // Défilement automatique toutes les 5 secondes
  </script>

</body>
</html>


