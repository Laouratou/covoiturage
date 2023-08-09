<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
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
                <section class="py-16">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap py-8 text-justify mb-8">
                            <a href="/marche-coonducteur" id="conducteurBtn"
                                class="btn btn-default focus:bg-blue-500  px-4 py-2 hover:bg-blue-500 focus:text-white hover:text-white transition-colors"><i
                                    class="fa fa-road"></i> Vous êtes conducteur ?</a>
                            <a href="/marche" id="passagerBtn"
                                class="btn btn-brand bg-blue-500 text-white px-4 py-2"><i
                                    class="fa fa-user"></i> Vous êtes passager ?</a>
                        </div>
                        <h1 class="text-4xl font-bold text-center text-gray-800 mb-4">Vous êtes passager ? Réservez une place !</h1>
                        <p class="text-lg text-center text-gray-600 mb-12">Réservez facilement votre place en ligne et voyagez moins cher, en toute confiance !</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                            <div class="flex flex-col items-center bg-white rounded-lg p-6 shadow-md">
                                <i class="fas fa-search text-4xl text-blue-500 mb-4"></i>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">1. Recherchez votre trajet</h3>
                                <p class="text-base text-gray-700 text-center">Précisez simplement votre destination, votre point de départ et vos horaires. Puis choisissez un trajet qui vous convient ! Vous pouvez réserver un trajet partiel dans le trajet choisi.</p>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded-lg p-6 shadow-md">
                                <i class="fas fa-calendar-check text-4xl text-blue-500 mb-4"></i>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">2. Réservez et payez en ligne</h3>
                                <p class="text-base text-gray-700 text-center">Réservez votre place en ligne avec votre compte mobile money (Orange Money, MTN Mobile Money, Moov Money...). Votre conducteur est averti de votre réservation par mail et SMS.</p>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded-lg p-6 shadow-md">
                                <i class="fas fa-car text-4xl text-blue-500 mb-4"></i>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">3. Voyagez ensemble</h3>
                                <p class="text-base text-gray-700 text-center">Partagez votre trajet en toute sécurité. BlabberRide c’est le moyen le plus convivial, économique et écologique de voyager.</p>
                            </div>
                            <div class="flex flex-col items-center bg-white rounded-lg p-6 shadow-md">
                                <i class="fas fa-star text-4xl text-blue-500 mb-4"></i>
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">4. Évaluez le conducteur</h3>
                                <p class="text-base text-gray-700 text-center">Attribuez une note allant de 1 à 5 étoiles et laissez un avis sur le conducteur concernant votre trajet effectué ensemble.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="py-10 mt-28 bg-gray-300">
                    <div class="mx-auto max-w-7xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="p-4">
                                <h2 class="text-xl font-light pb-4 border-b-2 border-yellow-300">À propos</h2>
                                <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire. </p>
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

                <script>
                    const passagerBtn = document.getElementById('passagerBtn');
                    const conducteurBtn = document.getElementById('conducteurBtn');

                    passagerBtn.addEventListener('click', function() {
                        passagerBtn.classList.add('bg-blue-500', 'text-white');
                        conducteurBtn.classList.remove('bg-blue-500', 'text-white');
                    });

                    conducteurBtn.addEventListener('click', function() {
                        conducteurBtn.classList.add('bg-blue-500', 'text-white');
                        passagerBtn.classList.remove('bg-blue-500', 'text-white');
                    });
                </script>

</body>
</html>
