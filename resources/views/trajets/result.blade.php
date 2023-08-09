@if(isset($trajets) && $trajets->count() > 0)
    <div class="grid grid-cols-1 gap-6">
        @foreach ($trajets as $trajet)
            <!-- Afficher les résultats des trajets filtrés -->
        @endforeach
    </div>
@else
    <p class="text-blue-800 text-4xl font-bold mb-6">Aucun conducteur disponible</p>
@endif
