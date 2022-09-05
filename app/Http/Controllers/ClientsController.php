<?php

namespace App\Http\Controllers;

use App\Models\Agences;
use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    //
    public function index(){
        $data = Clients::latest()->paginate(5);
        return view('client.client',compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        $data = Agences::orderBy('created_at','desc')->get();
        return view('client.ajouter',compact('data'));
    }

    public function store(Request $request){
        $data = Clients::updateOrCreate(['client_id'=>$request->client_id],
            [
                'nom_client'=> $request->nom_client,
                'prenom_client'=> $request->prenom_client,
                'agence'=> $request->agence,
                'date_naissance'=> $request->date_naissance,
                'telephone'=> $request->telephone,
                'ville_residence'=> $request->ville_residence,
            ] );
        return redirect()->route('client')->with('success','Enregistré avec succès');
    }

    public function edit($id){
        $client = Clients::find($id);
        $data = Agences::all();
        return view('client.editer',compact('data','client'));
    }

    public function update(Request $request){
        $data = Clients::updateOrCreate(['client_id'=>$request->client_id],
            [
            'nom_client'=> $request->nom_client,
            'prenom_client'=> $request->prenom_client,
            'agence'=> $request->agence,
            'date_naissance'=> $request->date_naissance,
            'telephone'=> $request->telephone,
            'ville_residence'=> $request->ville_residence,
        ] );
        return redirect()->route('client')->with('success','Enregistré avec succès');
    }
    public function delete(Request $request){
        $data = Clients::where('client_id', $request->id)->delete();
        return redirect()->back()->with('success','Supprimé avec succès');
    }
}
