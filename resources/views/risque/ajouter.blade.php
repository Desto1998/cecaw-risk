@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header bg-primary text-white">{{ __('Créer un risque') }}</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('risque.store') }}">
                            @csrf
                            <div class="w-100">
                                <label for="compte" class="mb-1">Numéro de compte <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" maxlength="20" minlength="5" required name="compte" id="compte">
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="client_id" class="mb-1">Client <span class="text-danger">*</span></label>
                                    <select name="client_id" id="client_id" class="form-control" required>
                                        @foreach($clients as $item)
                                            <option value="{{ $item->client_id }}">{{ $item->nom_client }} {{ $item->prenom_client }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="agence_id" class="mb-1">Agence du pret <span class="text-danger">*</span></label>
                                    <select name="agence_id" id="agence_id" class="form-control" required>
                                        @foreach($agences as $item)
                                            <option value="{{ $item->agence_id }}">{{ $item->nom_agence }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="montant_pret" class="mb-1">Montant du pret <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" required name="montant_pret" id="montant_pret">
                                </div>
                                <div class="col-md-6">
                                    <label for="avance" class="mb-1">Avance <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" name="avance" id="avance">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="date_pret" class="mb-1">Date de pret <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" required name="date_pret" id="date_pret">
                                </div>
                                <div class="col-md-6">
                                    <label for="date_reglement" class="mb-1">Date de remboursement <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" required name="date_reglement" id="date_reglement">
                                </div>
                            </div>

                            <div class="w-100">
                                <label for="commentaire" class="mb-1">Commentaire <span class="text-danger"></span></label>
                               <textarea class="form-control" name="commentaire" id="commentaire"></textarea>
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
