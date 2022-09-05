@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Tableau de bord') }}</div>

                    <div class="card-body">

                        <form action="{{ route('rechercher') }}" method="get">
                            @csrf
                            <label for="search" class="mb-2">Entrer le nom ou prénom du client ou le numéro de compte</label>
                            <input type="search" name="search" value="" class="form-control" placeholder="Rechercher..." id="search">
                            <button type="submit" class="btn btn-primary mt-2 float-end">Rechercher</button>
                        </form>
                        @isset($data)
                            <h4 class="mt-3 text-success">Résultat de la recherche</h4>
                            <div class="mt-3 table-responsive">
                                <table class="table table-bordered text-center w-100">
                                    <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Compte</th>
                                        <th>Mon. pret</th>
                                        <th>Versé</th>
                                        <th>Reste</th>
                                        <th>Date prèt</th>
                                        <th>Statut</th>
                                        <th>Agence</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($data as $key=> $item)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $item->nom_client }}
                                                @foreach($clients as $value)
                                                    @if ($value->client_id==$item->client_id)
                                                        {{ $value->nom_client }} {{ $value->prenom_client }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $item->compte }}</td>
                                            <td>{{ $item->montant_pret }}</td>
                                            <td>{{ $item->avance}}</td>
                                            <td>{{ $item->reste}}</td>
                                            <td>{{ $item->date_pret }}</td>
                                            <td>{{ $item->agence }}
{{--                                                @if ($item->statut_declaration==0)--}}
{{--                                                    <span class="text-danger">Non reglé</span>--}}

{{--                                                @else--}}
{{--                                                    <span class="text-success">Reglé</span>--}}

{{--                                                @endif--}}
                                                @if ($item->reste<= \App\Models\Remboursement::Recouvert($item->risque_id))
                                                    <span class="text-success">Reglé</span>

                                                @else
                                                    <span class="text-danger">Non reglé</span>


                                                @endif
                                            </td>
                                            <td>
                                                @foreach($agences as $value)
                                                    @if ($value->agence_id==$item->agence_id)
                                                        {{ $value->nom_agence }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('risque.show',['id'=>$item->risque_id]) }}" title="Voir plus" class="btn btn-success btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    {{--                                                @if ($item->statut_declaration==0)--}}
                                                    {{--                                                    <a href="{{ route('risque.valider',['id'=>$item->risque_id]) }}" title="MArquer comme reglé" class="btn btn-primary btn-sm ms-1">--}}
                                                    {{--                                                        <i class="fa fa-check"></i>--}}
                                                    {{--                                                    </a>--}}
                                                    {{--                                                @else--}}
                                                    {{--                                                    <a href="{{ route('risque.bloquer',['id'=>$item->risque_id]) }}" title="MArquer comme non reglé" class="btn btn-secondary btn-sm ms-1">--}}
                                                    {{--                                                        <i class="fa fa-lock"></i>--}}
                                                    {{--                                                    </a>--}}

                                                    {{--                                                @endif--}}

                                                    {{--                                                <a href="{{ route('risque.editer',['id'=>$item->risque_id]) }}" title="Modifier" class="btn btn-warning btn-sm ms-1">--}}
                                                    {{--                                                    <i class="fa fa-edit"></i>--}}
                                                    {{--                                                </a>--}}
                                                    {{--                                                <form action="{{ route('risque.delete') }}" method="post">--}}
                                                    {{--                                                    @csrf--}}
                                                    {{--                                                    <input type="hidden" value="{{ $item->risque_id }}" name="id">--}}
                                                    {{--                                                    <button type="submit" title="Supprimer" class="btn btn-danger btn-sm ms-1">--}}
                                                    {{--                                                        <i class="fa fa-trash"></i>--}}
                                                    {{--                                                    </button>--}}
                                                    {{--                                                </form>--}}

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
