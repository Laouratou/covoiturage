<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
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
            <a href="#" class="text-yellow-700  mr-4">
                <i class=""></i> Proposer un trajet
            </a>
        </div>
    </nav>
<section class="">
    <div class="grid grid-cols-2 bg-blue-800 h-16 p-3">
<div class="">
<h1 class="text-2xl px-8 text-white font-light">Stimulez vos gains</h1>
</div>
<div>
    <h1 class="text-white text-center"><a href="#"> A propos de nous</a></h1>
</div>
</div>
</section>

<div class="grid grid-cols-2 gap-4"style="background-color: #34bfc6;">
    <div>
        <section class="flex justify-center items-center h-32">
            <span class="mr-1">
                <img src="{{ '/storage/' . auth()->user()->photo }}" alt="Photo de profil" class="logo w-10 h-10 rounded-full">
            </span>
            <span class="text-2xl">{{ auth()->user()->name }}</span>
        </section>
    </div>
    <div class="flex justify-center items-center">
        <button class="bg-white font-bold py-2 px-4 rounded">
            Modifier le profil
        </button>
    </div>
</div>

<div class="py-10">
    <div class="flex justify-center items-center ">
        <section class="card pa0 py-8 shadow-lg border-r w-2/3">
            <h2 class="f5 mb0 pv4 ph4 ph5-sm bg-gray-5 bb px-4 h-14 p-3 bg-blue-800 b--gray-7 br1-sm br0-bottom semi-bold text-2xl font-bold">
                À propos de vous
            </h2>
            <div class="bg-white p-4">
                <div class="flex justify-center items-center">
                    <div class="w-1/3 border-r border-gray-7 flex justify-center items-center">
                        <i class="fas fa-star text-4xl text-yellow-500 mr-2"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Notation</h3>
                            <p class="text-gray-600">0 notations(s) de la part des utilisateurs</p>
                        </div>
                    </div>
                    <div class="w-1/3 border-r border-gray-7 flex justify-center items-center">
                        <i class="fas fa-car text-4xl text-green-500 mr-2"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Trajet</h3>
                            <p class="text-gray-600">0 trajet(s) comme conducteur</p>
                        </div>
                    </div>
                    <div class="w-1/3 flex justify-center items-center">
                        <i class="fas fa-calendar-alt text-4xl text-blue-500 mr-2"></i>
                        <div>
                            <h3 class="text-xl font-semibold">Réservation</h3>
                            <p class="text-gray-600">0 réservation(s) de passager</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<div class="flex justify-center items-center ">
<section class="card pa0 shadow-lg border w-2/3">
    <h2 class="f5 mb-0 py-4 px-4 bg-gray-500 text-white text-center uppercase font-bold tracking-wide">
        Mes préférences en covoiturage
    </h2>
    <div class="p-8 flex flex-col items-center">
        <div class="mb-4">
            <i class="fas fa-cogs text-4xl text-gray-500"></i>
        </div>
        <div class="text-center text-gray-600  font-light text-2xl">
            Vous trouverez ici vos préférences. Dites à la communauté ce que vous aimez et vous n'aimez pas lorsque vous partez en covoiturage.
        </div>
        <div class="mt-8">
            <a href="#" class="bg-blue-200 px-4 py-2">Décrire vos préférences</a>
        </div>
    </div>
</section>
</div>


<br>
<br>
<br>
<br>












<section class="py-10 mt-28 "style="background: #eee">
    <div class="mx-auto max-w-7xl">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class=" p-4">
          <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ml-auto">À propos</h2>
      <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire.<span class="text-red-500 hover:text-blue-500">Lire plus</span></p>

        </div>
        <div class=" p-4">
          <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Mentions légales</h2>
         <div class="py-3">
           <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"class="text-gray-500 hover:text-blue-700">Politique de Confidentialité</a> </p>
           <p class="inline-block pb-1 mb-2 border-b border-blue-700 my-2"><a href="#"class="text-gray-500 hover:text-blue-700">Conditions générales</a>  </p>
          </div>

          </div>
        <div class=" p-4">
          <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Contactez-nous</h2>
       <div class="py-3">
      <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i>   Burkina Faso-Ouagadougou</p>
    <p class="my-2"><i class="fas fa-phone"></i>     (+226) 63 17 48 48  / 64 20 37 86</p>
    <p class="my-2"><i class="fas fa-envelope"></i> <a href="#"class="text-black  hover:underline">traorelaw687@gmail.com</a> </p>

    </div>

        </div>
        <div class=" p-4">
          <h2 class="inline-block pb-1 mb-2 border-b-2 border-yellow-300 ">Guide d'utilisation</h2>
       <div class="py-3">
       <p class="my-2"> <i class="fas fa-angle-double-right"></i><a href="#"class="text-gray-500 hover:text-blue-700">   Comment ça marche</a>    </p>
       <p class="my-2"><i class="fas fa-angle-double-right"></i>  <a href="#"class="text-gray-500 hover:text-blue-700">  Le covoiturage en 4 points</a>  </p>
       </div>

       <img src="img/paiement.png" alt=""class="w-36">
        </div>
      </div>

    <div class="text-center">
     <p> Copyright © 2023 <a href="https://www.votreplateforme.com"><span class="text-red-500">Plateforme</span></a>. Tous droits réservés.</p>
    </div>

    </div>

    </section>
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
</body>
</html>
