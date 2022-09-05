<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remboursement extends Model
{
    use HasFactory;
    protected $table = 'remboursements';
    protected $primaryKey = 'rem_id';
    protected $fillable = [
        'montant',
        'date_re',
        'risque_id',

    ];
    /**
     * Retourne le montant total des versement pour un risque
     * @returns int
     */
    public function Recouvert($id){
        $ver = Remboursement::where('risque_id',$id)->get();
        $sum = 0;
        foreach ($ver as $value){
            $sum+= $value->montant;
        }
        return $sum;
    }
}
