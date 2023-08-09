<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePlateformeCovoiturage - Conversation avec {{ $conversation->receiver->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
</head>
<body class="bg-gray-200 ">
    <nav class="w-full sticky top-0 left-0 right-0 bg-gradient-to-r from-purple-600 to-pink-500 shadow">
        <div class=" px-4">
            <div class="flex items-center justify-between py-4">
                <a href="/" class="flex items-center space-x-2">
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
                                <img src="{{ '/storage/' . Auth::user()->photo }}" alt="Profil Picture"
                                    class="w-10 h-10 rounded-full">
                                @else
                                <img src="/path/to/default-profile-image.png" alt="Profil Picture"
                                    class="w-10 h-10 rounded-full">
                                @endif
                            </span>
                            <svg class="w-4 h-4 text-white fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 14l5-5H5l5 5z"></path>
                            </svg>
                        </button>

                        <div id="profileDropdownContent"
                            class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-lg hidden">

                            <h6 class="px-4 py-2 font-bold text-black border-b-2">
                                Bienvenue, <span class="text-animation">{{ Auth::user()->name }}</span>
                            </h6>
                            <div class="px-4 py-2">
                                <div class="">
                                    <a href="/profile"
                                        class="hover:text-pink-200 block transition duration-300 ease-in-out">
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
    <div class="max-w-2xl mx-auto bg-white rounded shadow-lg py-8 mt-8">
        <div class="p-4 border-b">
            <h1 class="text-xl font-bold">Conversation</h1>
        </div>
        <div class="p-4">
            @foreach ($messages as $message)
            <div class="flex mb-4">
                <div>
                    @if ($message->sender_id == auth()->id())
                        <p class="text-gray-800"><strong>Moi :</strong> {{ $message->content }}</p>
                    @else
                        <div class="flex items-center">
                            <p class="text-gray-800"><strong>{{ $message->sender->name }} :</strong> {{ $message->content }}</p>
                        </div>
                    @endif
                    <p class="text-gray-500 text-sm">{{ $message->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach

        </div>
        @if (!$conversation->isRead())
        <span class="bg-blue-500 text-white text-xs font-bold py-1 px-2 rounded-full">
            +1
        </span>
    @endif

        <div class="p-4 border-t">
            <form action="{{ route('messages.reply', $conversation) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="replyContent" class="block font-bold">Contenu de la réponse :</label>
                    <textarea name="content" id="replyContent" rows="4" class="w-full p-2 border border-gray-300 rounded"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Répondre</button>
                </div>
            </form>
        </div>
    </div>
    <section class="py-10 mt-28 bg-gray-100 ">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4">
                    <h2 class="pb-2 mb-4 border-b-2 border-yellow-300 text-primary font-light">À propos</h2>
                    <p class="py-3">BlabberRide est une solution moderne qui permet de mettre en relation des conducteurs et des passagers partageant le même itinéraire. </p>
                </div>
                <div class="p-4">
                    <h2 class="pb-2 mb-4 border-b-2 border-yellow-300 text-primary font-light">Mentions légales</h2>
                    <div class="py-3">
                        <p class="pb-1 mb-2 border-b border-primary my-2"><a href="/politique" class="hover:text-primary">Politique de Confidentialité</a></p>
                        <p class="pb-1 mb-2 border-b border-primary my-2"><a href="/conditions" class=" hover:text-primary">Conditions générales</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="pb-2 mb-4 border-b-2 border-yellow-300 text-primary font-light">Contactez-nous</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-map-marker-alt text-primary"></i> Burkina Faso-Ouagadougou</p>
                        <p class="my-2"><i class="fas fa-phone"></i> (+226) 63 17 48 48 / 64 20 37 86</p>
                        <p class="my-2"><i class="fas fa-envelope"></i> <a href="#" class=" hover:underline">traorelaw687@gmail.com</a></p>
                    </div>
                </div>
                <div class="p-4">
                    <h2 class="pb-2 mb-4 border-b-2 border-yellow-300 text-primary font-light">Guide d'utilisation</h2>
                    <div class="py-3">
                        <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="/marche" class=" hover:text-primary">Comment ça marche</a></p>
                        <p class="my-2"><i class="fas fa-angle-double-right"></i> <a href="#" class=" hover:text-primary">Le covoiturage en 4 points</a></p>
                    </div>
                    <img src="img/paiement.png" alt="" class="w-36 mx-auto">
                </div>
            </div>
            <div class="text-center mt-10">
                <p class="">© 2023 <a href="https://www.votreplateforme.com" class="text-red-400">Plateforme</a>. Tous droits réservés.</p>
            </div>
        </div>
    </section>
</body>
</html>
