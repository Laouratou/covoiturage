<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body class="bg-gray-200">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md mx-auto bg-white shadow p-8 rounded-lg">
            <h2 class="text-3xl font-bold mb-4 text-center text-gray-800">Donnez votre avis</h2>
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Commentaire :</label>
                    <textarea name="comment" id="comment" rows="3" required
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500"></textarea>
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Note :</label>
                    <div class="flex items-center justify-center">
                        <input type="radio" name="rating" value="1" id="rating1" required class="hidden"
                            onchange="highlightStars(1)">
                        <label for="rating1" class="text-3xl cursor-pointer "
                            id="star1">
                            <i class="fas fa-star"></i>
                        </label>
                        <input type="radio" name="rating" value="2" id="rating2" required class="hidden"
                            onchange="highlightStars(2)">
                        <label for="rating2" class="text-3xl cursor-pointer"
                            id="star2">
                            <i class="fas fa-star"></i>
                        </label>
                        <input type="radio" name="rating" value="3" id="rating3" required class="hidden"
                            onchange="highlightStars(3)">
                        <label for="rating3" class="text-3xl cursor-pointer"
                            id="star3">
                            <i class="fas fa-star"></i>
                        </label>
                        <input type="radio" name="rating" value="4" id="rating4" required class="hidden"
                            onchange="highlightStars(4)">
                        <label for="rating4" class="text-3xl cursor-pointer "
                            id="star4">
                            <i class="fas fa-star"></i>
                        </label>
                        <input type="radio" name="rating" value="5" id="rating5" required class="hidden"
                            onchange="highlightStars(5)">
                        <label for="rating5" class="text-3xl cursor-pointer "
                            id="star5">
                            <i class="fas fa-star"></i>
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Soumettre</button>
            </form>
        </div>
    </div>

    <script>
        let selectedRating = 0;

        function highlightStars(starNumber) {
            if (selectedRating === starNumber) {
                // Si l'étoile cliquée est la même que celle déjà sélectionnée, on décoche
                selectedRating = 0;
            } else {
                selectedRating = starNumber;
            }

            for (let i = 1; i <= 5; i++) {
                const star = document.getElementById(`star${i}`);
                if (i <= selectedRating) {
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                }
            }

            // Cocher ou décocher l'étoile sélectionnée
            const selectedStar = document.getElementById(`rating${selectedRating}`);
            selectedStar.checked = !selectedStar.checked;
        }
    </script>
</body>

</html>
