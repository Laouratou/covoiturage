<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        return view('reviews.create');
    }
    public function store(Request $request)
{
    // Validez les données du formulaire
    $validatedData = $request->validate([
        'comment' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
    ]);

    // Créez un nouvel avis
    $review = new Review;
    $review->comment = $validatedData['comment'];
    $review->rating = $validatedData['rating'];

    // Récupérez l'utilisateur authentifié (le conducteur) et associez l'avis à cet utilisateur
    $user = auth()->user();
    $user->reviews()->save($review);

    // Stockez la note donnée par l'utilisateur dans une variable de session
    session()->put('review_rating', $validatedData['rating']);

    // Redirigez l'utilisateur vers une page de confirmation ou autre
    return redirect()->route('reviews.show');
}



    public function show()
    {
        // Récupérez l'utilisateur authentifié (le conducteur) et ses avis
        $user = auth()->user();
        $reviews = $user->reviews;

        // Affichez les avis dans une vue appropriée
        return view('reviews.show', compact('reviews'));
    }
}
