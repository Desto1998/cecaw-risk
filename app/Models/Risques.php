<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Risques extends Model
{
    use HasFactory;
    protected $table = 'risques';
    protected $primaryKey = 'risque_id';
    protected $fillable = [
        'montant_pret',
        'avance',
        'reste',
        'date_pret',
        'date_reglement',
        'statut_declaration',
        'commentaire',
        'agence_id',
        'compte',
        'user_id',
        'client_id',
    ];
}
