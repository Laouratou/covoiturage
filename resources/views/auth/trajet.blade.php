<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
    h2{
        background-color: var(--g43xplk);
    }
</style>
</head>
<body>
    <nav class="flex items-center justify-between bg-white shadow shadoow-lg py-4 px-6">
        <div class="flex items-center">
            <a href="#" class="text-blue-500 text-2xl font-bold">Mon application</a>
        </div>

        <div class="flex items-center space-x-4">
            <a href="#" class="text-blue-500  mr-4">
                <i class="fas fa-search"></i> Rechercher un trajet
            </a>
            <a href="index" class="text-blue-500  mr-4">
                <i class="fas fa-plus-circle"></i> Publier un trajet
            </a>
            <div class="relative">
                <button id="profile-dropdown" class="flex items-center  focus:outline-none">
                    <span class="mr-1"> <img src="{{ '/storage/' . Auth::user()->photo }}" alt="" class="logo w-10 h-10 rounded-full"></span>
                    <i id="dropdown-icon" class="fas fa-caret-down transform transition duration-300"></i>
                </button>
                <div class="absolute right-0 mt-2 w-96 h-72 bg-white shadow-lg hidden transition duration-300 transform translate-y-2" id="dropdown-menu">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 leading-10 mb-2">
                        <i class="fas fa-car mr-2"></i> Vos trajets<i class="fas fa-chevron-right float-right"></i>
                    </a>
                    <hr class="my-1 border-gray-300">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 leading-10 mb-2">
                        <i class="fas fa-envelope mr-2"></i> Messages<i class="fas fa-chevron-right float-right"></i>
                    </a>
                    <hr class="my-1 border-gray-300">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 leading-10 mb-2">
                        <i class="fas fa-money-bill-wave mr-2"></i> Paiements et remboursements<i class="fas fa-chevron-right float-right"></i>
                    </a>
                    <hr class="my-1 border-gray-300">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 leading-10 mb-2">
                        <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion<i class="fas fa-chevron-right float-right "></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        const dropdownButton = document.getElementById('profile-dropdown');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownIcon = document.getElementById('dropdown-icon');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
            dropdownMenu.classList.toggle('translate-y-2');
            dropdownIcon.classList.toggle('rotate-180');
        });
    </script>

  <section class="bg-yellow-400">
<br>
<br>
  </section>
<section  class="bg-gray-700">
    <div class="flex justify-center items-center">
        <svg width="250" height="68" viewBox="0 0 250 68" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 8h242v56L4 59.625V8Z" fill="#9AED66"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8c0-2.20914 1.79086-4 4-4h242c2.209 0 4 1.79086 4 4v56c0 1.0734-.431 2.1018-1.197 2.8539s-1.802 1.1648-2.875 1.1454L3.9277 63.6243C1.7471 63.5849 0 61.806 0 59.625V8Zm4 51.625V8h242v56L4 59.625Z" fill="#054752"></path>
            <path opacity=".5" d="m157.461 44.646-4.461.4052.993 12.1775 4.461-.4053-.993-12.1774ZM96.7085 12.8396l4.4655-.3928.97 12.1749-4.4656.3928-.9699-12.1749ZM232.67 14.878l4.466-.3927.97 12.1749-4.466.3927-.97-12.1749ZM105.583 28.8454l3.248-3.249 7.985 8.8426-3.248 3.2609-7.985-8.8545ZM209 47.895l3.248-3.249 7.984 8.8426-3.248 3.2609L209 47.895ZM92.4429 52.318l.8796-4.6296 11.3445 2.3802-.879 4.6534-11.3451-2.404ZM81.5517 25.6719l3.6538 2.7372-6.7099 9.9732-3.6538-2.7611 6.7099-9.9493ZM192.111 57.033l.473-4.7128 11.503 1.3329-.473 4.701-11.503-1.3211ZM122.154 52.6489 120 48.4954l10.149-5.8911 2.154 4.1416-10.149 5.903Z" fill="#fff"></path>
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" font-family="Arial" font-size="16" fill="#fff">
                <tspan x="50%" dy="-8" text-anchor="middle" font-size="24" font-weight="bold">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 125 34" to="360 125 34" dur="5s" repeatCount="indefinite" />
                    50,000 FCFA
                </tspan>
                <tspan x="50%" dy="24" text-anchor="middle" font-size="16" font-weight="bold">bonus convoiturage</tspan>
            </text>
        </svg>
    </div>
    <h1 class="text-4xl text-center text-white py-5">Bénéficier de la Prime Covoiturage de 50.000fcfa</h1>
<p class="text-center text-2xl text-white">Pour en profiter, covoiturez et nous nous occupons de tout !</p>
<div class="flex justify-center items-center py-10">
    <a href="trajets/create">
        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Publier un trajet
        </button>
    </a>
</div>
</section>
</section>

<div class="bg-gray-100 py-20 flex justify-center items-center ">
    <div class="grid grid-cols-2">
        <div class="bg-gray-200 p-8">
          <!-- Contenu de la première colonne -->
          <h2 class="text-2xl py-3">Vous avez des questions ?</h2>
    <p class="py-4">Notre communauté s'occupe de vous repondre</p>
    <a href="#">
        <button class="bg-white text-blue-500 font-bold py-2 px-4 rounded-full">
           Poser une question
        </button>
    </a>
        </div>
        <div class="bg-gray-300 p-8 flex">
          <!-- Contenu de la deuxième colonne -->
          <img src="img/photo8.jpg" alt=""class="w-32 h-32 rounded-full">
          <img src="img/photo7.JPG" alt=""class="w-32 h-32 rounded-full object-cover">
        </div>
      </div>
    </div>
</body>
</html>
