<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'client_id';
    protected $fillable = [
        'nom_client',
        'prenom_client',
        'date_naissance',
        'telephone',
        'ville_residence',
        'agence',
    ];
}
