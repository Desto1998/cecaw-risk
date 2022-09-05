<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agences extends Model
{
    use HasFactory;
    protected $table = 'agences';
    protected $primaryKey = 'agence_id';
    protected $fillable = [
        'nom',
        'email',
        'password',
        'prenom',
        'is_active',
        'role',
        'is_admin',
    ];
}
