<!DOCTYPE html>
<html>
<head>
    <title>Réservation de voyage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Vous souhaitez proposer un trajet</h1>
    <p>Publiez une annonce et trouvez un passager pour partager le voyage !</p>

    <form>
        <label for="villeDepart">Ville de départ :</label>

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" value="500" min="500"><br><br>

        <label for="modePaiement">Mode de paiement :</label>
        <select id="modePaiement" name="modePaiement">
            <option value="orange">Orange Money</option>
            <option value="moov">Moov</option>
            <option value="mtn">MTN Mobile Money</option>
        </select><br><br>

        <input type="checkbox" id="numeroMoney" name="numeroMoney">
        <label for="numeroMobileMoney">J'inscris mon numéro Mobile Money :</label>
        <input type="text" id="numeroMobileMoney" name="numeroMobileMoney"><br><br>

        <input type="submit" value="Valider">
    </form>
</body>
</html>
