@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-11">
                <div class="card p-4">
                    <div class="card-header">{{ __('Détail du risque') }}</div>
                    <div class="card-body">
                        <div class="justify-content-end col-md-12">
{{--                            <a href="{{ route('risque.editer',['id'=>$risque->risque_id]) }}" class="btn btn-warning mb-3 float-end">--}}
{{--                                <i class="fa fa-edit"></i>Modifier--}}
{{--                            </a>--}}
                        </div>
                        <div class="table-responsive col-md-12 mt-2">
                            <table class="table text-black fs-5 font-weight-bold table-bordered table-hover">
                                <tr>
                                    <td>
                                        Client
                                    </td>
                                    <td>
                                        {{ $client->nom_client }} {{ $client->prenom_client }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Compte N_°</td>
                                    <td>{{ $risque->compte }}</td>
                                </tr>
                                <tr>
                                    <td>Montant prèt</td>
                                    <td>{{ $risque->montant_pret }} FCFA</td>
                                </tr>
                                <tr>
                                    <td>Montant versé</td>
                                    <td>{{ $risque->avance }} FCFA</td>
                                </tr>
                                <tr>
                                    <td>Reste à payer</td>
                                    <td>{{ $risque->reste }} FCFA</td>
                                </tr>
                                <tr>
                                    <td>Date prèt</td>
                                    <td>{{ $risque->date_pret }}</td>
                                </tr>
                                <tr>
                                    <td>Date règlement</td>
                                    <td>{{ $risque->date_reglement }}</td>
                                </tr>
                                <tr>
                                    <td>Agence de prèt</td>
                                    <td>{{ $agence->nom_agence }}</td>
                                </tr>
                                <tr>
                                    <td>Statut dans le système</td>
                                    <td>
                                        @if ($risque->reste <= \App\Models\Remboursement::Recouvert($risque->risque_id))
                                            <span class="text-success">Reglé</span>
                                        @else

                                            <span class="text-danger">Non reglé</span>

                                        @endif
{{--                                        @if ($risque->statut_declaration==0)--}}
{{--                                            <span class="text-danger">Non reglé</span>--}}

{{--                                        @else--}}
{{--                                            <span class="text-success">Reglé</span>--}}

{{--                                        @endif--}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reglé</td>
                                    <td>{{ \App\Models\Remboursement::Recouvert($risque->risque_id) }}</td>
                                </tr>
                                <tr>
                                    <td>Commentaire</td>
                                    <td>{{ $risque->commentaire }}</td>
                                </tr>
                                <tr>
                                    <td>Date de création</td>
                                    <td>{{ $risque->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Crée par</td>
                                    <td>
                                        {{ $user->nom }} {{ $user->prenom }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date de dernière modification</td>
                                    <td>
                                        {{ $risque->updated_at }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
