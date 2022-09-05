<?php

namespace App\Http\Controllers;

use App\Models\Agences;
use App\Models\Clients;
use App\Models\Risques;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RisquesController extends Controller
{
    public function index(){
        $data = Risques::latest()->paginate(5);
        $clients = Clients::all();
        $agences = Agences::all();
        return view('risque.risque',compact('data','clients','agences'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        $agences = Agences::orderBy('created_at','desc')->get();
        $clients = Clients::orderBy('created_at','desc')->get();
        return view('risque.ajouter',compact('agences','clients'));
    }

    public function store(Request $request){
        $request->validate([
            'montant_pret' => ['required', 'min:3', 'string'],
            'avance' => ['required'],
            'date_pret' => ['required'],
            'date_reglement' => ['required'],
            'compte' => ['required'],
        ]);
        if ($request->montant_pret<=$request->avance) {
            return redirect()->back()->with('danger','Le montant est inferieur ou egal a l\'avance!');

        }
        $iduser = Auth::user()->id;
        $data = Risques::updateOrCreate(['risque_id'=>$request->risque_id],
            [
                'montant_pret'=> $request->montant_pret,
                'avance'=> $request->avance,
                'reste'=> $request->montant_pret-$request->avance,
                'date_pret'=> $request->date_pret,
                'date_reglement'=> $request->date_reglement,
                'commentaire'=> $request->commentaire,
                'statut_declaration'=> 0,
                'agence_id'=> $request->agence_id,
                'client_id'=> $request->client_id,
                'user_id'=> $iduser,
                'compte'=> $request->compte,
            ] );
        return redirect()->route('risque')->with('success','Enregistré avec succès');
    }

    public function show($id){
        $risque = Risques::find($id);
//        $agences = Agences::all();
        $agence = Agences::find($risque->agence_id);
//        $clients = Clients::all();
        $client = Clients::find($risque->client_id);
        $user = User::find($risque->user_id);
        return view('risque.detail',compact('risque','user','agence','client'));
    }

    public function edit($id){
        $risque = Risques::find($id);
        $agences = Agences::all();
        $clients = Clients::all();
        return view('risque.editer',compact('risque','clients','agences'));
    }

    public function update(Request $request){
        $data = Risques::updateOrCreate(['risque_id'=>$request->risque_id],
            [
                'montant_pret'=> $request->montant_pret,
                'avance'=> $request->avance,
                'reste'=> $request->montant_pret-$request->avance,
                'date_pret'=> $request->date_pret,
                'date_reglement'=> $request->date_reglement,
                'commentaire'=> $request->commentaire,
                'statut_declaration'=> $request->statut_declaration,
                'agence_id'=> $request->agence_id,
                'compte'=> $request->compte,
                'client_id'=> $request->client_id,
            ] );
        return redirect()->route('risque')->with('success','Enregistré avec succès');
    }
    public function delete(Request $request){
        $data = Risques::where('risque_id', $request->id)->delete();
        return redirect()->back()->with('success','Supprimé avec succès');
    }

    public function valider($id){
        $data = Risques::where('risque_id', $id)->update(['statut_declaration'=>1]);
        return redirect()->back()->with('success','Effectué avec succès');
    }
    public function bloquer($id){
        $data = Risques::where('risque_id', $id)->update(['statut_declaration'=>0]);
        return redirect()->back()->with('success','Effectué avec succès');
    }
}
