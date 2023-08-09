<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    use HasFactory;
    protected $fillable = ['newsletter', 'declare_covoiturages'];
    protected $table = 'alertes'; // Nom de la table dans la base de données

    public function rules()
    {
        return [
            'newsletter' => 'required|boolean',
            'declare_covoiturages' => 'required|boolean',
        ];
    }

    // Définissez les relations avec d'autres modèles ici, le cas échéant
}
