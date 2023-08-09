<!-- resources/views/dashboard/users/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Mettez ici les balises meta, les liens CSS, etc. -->
</head>
<body>
    <h1>Ajouter un utilisateur</h1>
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="role">Role :</label>
        <input type="text" id="role" name="role" required>
        <br>
        <!-- Ajoutez ici d'autres champs du formulaire si nécessaire -->
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
