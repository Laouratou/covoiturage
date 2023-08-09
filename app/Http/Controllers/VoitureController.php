<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VoitureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $voitures = $user->voitures()->get();

        if ($voitures->isEmpty()) {
            $voitures = null;
        }

        return view('voitures.index', compact('voitures'));
    }
    public function edit(Voiture $voiture)
{
    return view('voitures.edit', compact('voiture'));
}


    public function create()
    {
        return view('voitures.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'couleur' => 'required',
            'type' => 'required',
            'nombre_places' => 'required|integer',
            'climatisee' => 'nullable|boolean',
            'assuree' => 'nullable|boolean',
            'photo' => ['required', 'image'],
        ]);

        $voiture = new Voiture([
            'marque' => $request->input('marque'),
            'modele' => $request->input('modele'),
            'couleur' => $request->input('couleur'),
            'type' => $request->input('type'),
            'nombre_places' => $request->input('nombre_places'),
            'climatisee' => $request->has('climatisee'),
            'assuree' => $request->has('assuree'),
        ]);

        $user = Auth::user();
        $user->voitures()->save($voiture);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Storage::disk('public')->put($fileName, file_get_contents($photo));

            $voiture->photo = $fileName;
            $voiture->save();
        }

        return redirect()->route('voitures.index')->with('success', 'La voiture a été ajoutée avec succès');
    }

    public function destroy(Voiture $voiture)
    {
        if (!empty($voiture->photo)) {
            Storage::disk('public')->delete($voiture->photo);
        }

        $voiture->delete();

        return redirect()->route('voitures.index')->with('success', 'Voiture supprimée avec succès');
    }


}
