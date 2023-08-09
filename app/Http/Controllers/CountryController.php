<?php
namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
class CountryController extends Controller
{
    public function getWestAfricanCountries()
    {
        $countries = [
            'Bénin',
            'Burkina Faso',
            'Cap-Vert',
            'Côte d\'Ivoire',
            'Gambie',
            'Ghana',
            'Guinée',
            'Guinée-Bissau',
            'Libéria',
            'Mali',
            'Niger',
            'Nigeria',
            'Sénégal',
            'Sierra Leone',
            'Togo'
        ];
        return response()->json($countries);
    }
    public function retrieveWestAfricanCountries()
    {
        $countries = Country::pluck('name'); // Supposons que votre modèle s'appelle "Country" et que le nom du champ de pays soit "name"
        return view('auth.ride', ['countries' => $countries]);
    }
}
