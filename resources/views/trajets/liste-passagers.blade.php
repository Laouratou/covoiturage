<div class="container">
    <h1>Liste de tous les trajets</h1>

    @if ($trajets->isEmpty())
        <p>Aucun trajet n'a été trouvé.</p>
    @else
        <ul>
            @foreach ($trajets as $trajet)
                <li>{{ $trajet->ville_de_depart }} - {{ $trajet->ville_d_arrivee }}</li>
            @endforeach
        </ul>
    @endif
</div>
