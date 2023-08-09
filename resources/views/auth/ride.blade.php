<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com/2.2.17"></script>
</head>
<body>
    <nav class="flex items-center justify-between bg-white shadow shadoow-lg py-4 px-6">
        <div class="flex items-center">
            <a href="#" class="text-blue-500 text-2xl font-bold">Mon application(nom)</a>
        </div>
    </nav>
    <h1 class="text-center py-10 text-4xl font-bold">Où etes-vous?</h1>
    <div class="flex items-center justify-center">
        <div class="relative">
            <input type="text" id="addressInput" class="pl-20 pr-80 flex justify-center items-center py-2 px-8 rounded-full border border-gray-300 bg-gray-100 focus:border-blue-500 focus:outline-none" placeholder="Saisissez votre adresse" list="countryList" autocomplete="off">

            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                <svg class="text-gray-500 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 10L14 14M14 10L10 14M3 3l18 18" />
                </svg>
            </div>
        </div>
        <!------La balise <datalist> définit une liste d'options pour le champ de saisie.
La boucle foreach parcourt chaque élément du tableau $countries.
Pour chaque pays, une option est créée avec le nom du pays comme valeur.
L'option est ensuite ajoutée à la liste de suggestions.
La balise </datalist> marque la fin de la liste d'options.
------>
        <datalist id="countryList">
            @foreach ($countries as $country)
                <option value="{{ $country }}">
            @endforeach
        </datalist>
        <a href="https://exemp.com">
        <button id="submitButton" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 inline-flex items-center">
            <svg id="submitLoadingIcon" aria-hidden="true" role="status" class="hidden inline w-4 h-4 mr-3 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
            </svg>
            <span id="submitText">Valider</span>
        </button>
        <script>
          var submitButton = document.getElementById("submitButton");
var submitLoadingIcon = document.getElementById("submitLoadingIcon");
var submitText = document.getElementById("submitText");
submitButton.addEventListener("click", function() {
    submitButton.disabled = true;
    submitText.textContent = "patientez-svp.....";
    submitLoadingIcon.classList.remove("hidden");

    // Effectuez ici l'action de validation ou soumettez le formulaire

    // Exemple d'attente simulée de 2 secondes avant de réinitialiser le bouton
    setTimeout(function() {
        submitButton.disabled = false;
        submitText.textContent = "Valider";
        submitLoadingIcon.classList.add("hidden");
    }, 2000);
});
        </script>
    </body>
</html>
