@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header bg-primary text-white">{{ __('Créer un client') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('client.store') }}">
                            @csrf
                            <div class="w-100">
                                <label for="nom_client" class="mb-1">Nom du client <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" required name="nom_client" id="nom_client">
                            </div>
                            <div class="w-100">
                                <label for="prenom_client" class="mb-1">Prenom du client <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="prenom_client" id="prenom_client">
                            </div>
                            <div class="w-100">
                                <label for="date_naissance" class="mb-1">Date de naissance <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" required name="date_naissance" id="date_naissance">
                            </div>
                            <div class="w-100">
                                <label for="telephone" class="mb-1">Tel <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" required name="telephone" id="telephone">
                            </div>
                            <div class="w-100">
                                <label for="ville_residence" class="mb-1">Ville residence <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" required name="ville_residence" id="ville_residence">
                            </div>
                            <div class="w-100">
                                <label for="agence" class="mb-1">Agence de creation du client <span class="text-danger">*</span></label>
                                <select name="agence" id="agence" class="form-control" required>
                                    @foreach($data as $item)
                                        <option>{{ $item->nom_agence }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 justify-content-end mt-2">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                <button type="reset" class="btn btn-light mx-3 mt-2 3">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
