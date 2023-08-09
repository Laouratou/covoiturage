<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.9.55/css/materialdesignicons.min.css">
  <style>
    .number {
      width: 80px;
      height: 80px;
      line-height: 80px;
      font-size: 36px;
    }
  </style>
</head>
<body>
    <nav class="bg-white shadow-lg h-20">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <a href="#" class="text-2xl font-bold text-blue-500">Votre Plateforme</a>
                <ul class="space-x-6">
                    <li class="inline-block">
                        <a href="/" class="text-gray-600 hover:text-blue-500">Accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="bg-blue-400 p-4 h-28 flex justify-center items-center py-10">
        <h2 class="text-5xl text-white font-bold">Comment ça marche?</h2>
            </section>
  <div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <div class="text-center mb-8">
        <a href="#" id="conducteurBtn" class="btn btn-brand bg-blue-500 text-white px-4 py-2 rounded-full">
          <i class="mdi mdi-car-multiple"></i> Vous êtes conducteur ?
        </a>
        <a href="/marche" id="passagerBtn" class="    btn btn-default focus:bg-blue-500 hover:bg-blue-500 focus:text-white hover:text-white px-4 py-2 rounded-full transition-colors">

            <i class="mdi mdi-account-group"></i> Vous êtes passager ?
        </a>
      </div>
      <h1 class="text-4xl font-light text-center text-gray-800 mb-4">Vous partez en voiture ? Proposez votre trajet :</h1>
      <p class="text-lg text-center text-gray-600 mb-12">Rendez service et rentabilisez votre trajet.</p>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="flex flex-col items-center rounded-lg p-6">
          <span class="number bg-blue-400 text-white rounded-full p-4 mb-4 animate-bounce"><i class="mdi mdi-magnify"></i></span>
          <h3 class="text-xl font-light text-gray-800 mb-2">1. Proposez un trajet</h3>
          <p class="text-base  text-gray-700 text-center">Renseignez les informations de votre trajet et choisissez entre l'acceptation manuelle (vous confirmez vous-même chaque passager) ou l'acceptation automatique (la confirmation est immédiate).</p>
        </div>
        <div class="flex flex-col items-center  rounded-lg p-6">
          <span class="number bg-blue-400 text-white rounded-full p-4 mb-4 animate-bounce"><i class="mdi mdi-account-clock"></i></span>
          <h3 class="text-xl font-light w-60 text-gray-800 mb-2">2. Vous recevez une demande et choisissez vos passagers</h3>
          <p class="text-base w-60 text-gray-700 text-center">Quand un passager réserve en ligne, vous êtes immédiatement prévenu par e-mail et SMS. Vous choisissez les passagers que vous acceptez en vous basant sur les informations de leur profil et les avis.</p>
        </div>
        <div class="flex flex-col items-center  rounded-lg p-6">
          <span class="number bg-green-400 text-white rounded-full p-4 mb-4 animate-bounce"><i class="mdi mdi-car-connected"></i></span>
          <h3 class="text-xl font-light text-gray-800 mb-2">3. Voyagez ensemble</h3>
          <p class="text-base  text-gray-700 text-center">Partagez votre trajet en toute sécurité. BlabberRide est le moyen le plus convivial, économique et écologique de voyager.</p>
        </div>
        <div class="flex flex-col items-center  rounded-lg p-6">
          <span class="number bg-green-400 text-white rounded-full p-4 mb-4 animate-bounce"><i class="mdi mdi-cash"></i></span>
          <h3 class="text-xl font-light text-gray-800 mb-2">4. Recevez votre argent</h3>
          <p class="text-base  text-gray-700 text-center">Une fois le trajet terminé, vous recevez votre argent en toute sécurité.</p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <section class="py-10 mt-28 bg-gray-300">
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="p-4">
                <h2 class="text-xl font-light pb-4 border-b-2 border-yellow-300">À propos</h2>
                <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire.</p>
            </div>
            <div class="p-4">
                <h2 class="text-xl font-light pb-4 border-b-2 border-yellow-300">Mentions légales</h2>
                <div class="py-3">
                    <p class="my-2 border-b border-blue-700 py-2"><a href="/politique" class="text-gray-500 hover:text-blue-700">Politique de Confidentialité</a></p>
                    <p class="my-2 border-b border-blue-700 py-2"><a href="/conditions" class="text-gray-500 hover:text-blue-700">Conditions générales</a></p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="text-xl font-light pb-4 border-b-2 border-yellow-300">Contactez-nous</h2>
                <div class="py-3">
                    <p class="my-2"><i class="fas fa-map-marker-alt text-blue-500"></i> Burkina Faso-Ouagadougou</p>
                    <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                    <p class="my-2"><i class="fas fa-envelope"></i> <a href="#" class="text-black hover:underline">traorelaw687@gmail.com</a></p>
                </div>
            </div>
            <div class="p-4">
                <h2 class="text-xl font-light pb-4 border-b-2 border-yellow-300">Guide d'utilisation</h2>
                <div class="py-3">
                    <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="/marche" class="text-gray-500 hover:text-blue-700">Comment ça marche</a></p>
                    <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="#" class="text-gray-500 hover:text-blue-700">Le covoiturage en 4 points</a></p>
                </div>
                <img src="img/paiement.png" alt="" class="w-36">
            </div>
        </div>
        <div class="text-center mt-10">
            <p class="text-gray-600">© 2023 Votre Plateforme. Tous droits réservés.</p>
        </div>
    </div>
</section>

</body>
</html>
