<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Styles personnalisés -->
    <style>
        /* Style pour la liste des avis */
        .review-item {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="">

    <!-- Affichez la liste des avis de l'utilisateur -->
    <div class="my-8">
        @if ($reviews->count() > 0)
            <ul class="divide-y divide-gray-300">
                @foreach ($reviews as $review)
                    <li class="py-4 review-item transition-transform duration-300 ease-in-out">
                        <p class="text-lg font-semibold text-gray-800">Commentaire : {{ $review->comment }}</p>
                        <p class="text-gray-600">Note : {{ $review->rating }}/5</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-lg font-semibold text-gray-800 text-center py-8">Aucun avis disponible.</p>
        @endif
    </div>

</body>

</html>
