<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Supprimer un trajet</title>
</head>
<body>
    <h1>Supprimer un trajet</h1>

    <p>Voulez-vous vraiment supprimer ce trajet ?</p>

    <form action="{{ route('trajets.destroy', $trajet->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">Supprimer</button>
    </form>
</body>
</html>
