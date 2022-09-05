<?php

namespace App\Http\Controllers;

use App\Models\Agences;
use App\Models\Clients;
use App\Models\Risques;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function rechercher(Request $request)
    {
        $risqclient = Clients::orWhere('nom_client','like',"%{$request->search}%")
            ->orWhere('telephone','like',"%{$request->search}%")
            ->orWhere('prenom_client','like',"%{$request->search}%")
            ->get();
        $ID = [];
//        dd($risqclient);
        foreach ($risqclient as $key => $item){
            $ID[$key] = $item->client_id;
        }
        if (count($risqclient)>0) {
            $data = Risques::where('statut_declaration',0)->whereIn('client_id',$ID)->get();
        }else{
            $data = Risques::where('statut_declaration',0)->where('compte',$request->search)->get();
        }
        $clients = Clients::all();
        $agences = Agences::all();

        return view('home',compact('data','clients','agences'));
    }


}
