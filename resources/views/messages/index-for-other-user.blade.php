<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VotrePlateformeCovoiturage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.2/awesomplete.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body class="bg-gray-200 px-4 py-8">
    <a href="{{ route('notifications.index') }}">Voir les notifications</a>

    <div class="max-w-2xl mx-auto bg-white rounded shadow-lg">
        <h1 class="text-2xl font-bold mb-6 px-4">Messagerie</h1>

        @foreach ($conversations as $conversation)
            <a href="{{ route('messages.show', $conversation) }}" class="block hover:bg-gray-100 transition-colors duration-300">
                <div class="flex items-center px-4 py-4 border-b border-gray-300">
                    @if ($conversation->receiver_id == $user->id)
                        <img src="{{ '/storage/' . ($conversation->sender->photo ?? 'default.jpg') }}" alt="Photo de profil" class="w-12 h-12 object-cover rounded-full mr-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold leading-tight">{{ $conversation->sender->name }}</h3>
                        </div>
                    @else
                        <img src="{{ '/storage/' . ($conversation->receiver->photo ?? 'default.jpg') }}" alt="Photo de profil" class="w-12 h-12 object-cover rounded-full mr-4">
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold leading-tight">{{ $conversation->receiver->name }}</h3>
                        </div>
                    @endif

                    @if ($conversation->messages->count() > 0)
                        <p class="text-sm text-gray-600 truncate">{{ $conversation->messages->last()->content }}</p>
                    @else
                        <p class="text-sm text-gray-600">Aucun message</p>
                    @endif

                    <span class="bg-blue-500 text-white text-xs font-bold py-1 px-2 rounded-full">{{ $conversation->unread_count }}</span>
                </div>
            </a>
        @endforeach
    </div>

    <div class="text-center mt-8">
        <a href="{{ route('messages.create') }}" class="button bg-yellow-500 px-4 py-2 rounded-md">
            Nouveau message
        </a>
    </div>
</body>
</html>
