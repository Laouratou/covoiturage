<!-- resources/views/dashboard/users/edit.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Mettez ici les balises meta, les liens CSS, etc. -->
</head>
<body>
    <h1>Modifier l'utilisateur</h1>
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        <br>
        <label for="role">Role :</label>
        <input type="text" id="role" name="role" value="{{ $user->role }}" required>
        <br>
        <!-- Ajoutez ici d'autres champs du formulaire si nécessaire -->
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
