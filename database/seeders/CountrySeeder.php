<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
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

        foreach ($countries as $countryName) {
            Country::create(['name' => $countryName]);
        }
    }
}
