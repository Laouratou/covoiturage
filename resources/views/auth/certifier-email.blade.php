<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certifier votre adresse e-mail</title>
    <!-- Inclure le lien CSS de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-lg">
            <h1 class="text-2xl font-bold mb-4">Certifier votre adresse e-mail</h1>
            <form action="/valider-certification" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="code" class="font-bold">Code de validation :</label>
                    <input type="text" id="code" name="code" class="px-4 py-2 border rounded">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Valider
                </button>
            </form>
        </div>
    </div>
</body>
</html>
