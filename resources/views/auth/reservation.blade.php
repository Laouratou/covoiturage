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
    <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>
<body>
    <nav class="flex items-center justify-between bg-white shadow shadoow-lg py-4 px-6">
        <div class="flex items-center">
            <a href="#" class="text-blue-500 text-2xl font-bold">Mon application</a>
        </div>
    </nav>
    <div id="map" style="height: 400px;"></div>
    <script>
        // Coordonnées de votre ville d'arrivée
        var lat = {{ $trajet->ville_d_arrivee_latitude }};
        var lng = {{ $trajet->ville_d_arrivee_longitude }};

        // Créez une nouvelle carte et centrez-la sur les coordonnées spécifiées
        var map = L.map('map').setView([lat, lng], 10); // Zoom de la carte (ici, 10)

        // Ajoutez une couche de carte (par exemple, OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ajoutez un marqueur à la position spécifiée
        L.marker([lat, lng]).addTo(map)
            .bindPopup("Ville d'arrivée : {{ $trajet->ville_d_arrivee }}")
            .openPopup();
    </script>

</body>
</html>
