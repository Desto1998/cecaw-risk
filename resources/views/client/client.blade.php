@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-12">
                <div class="card p-4">
                    <div class="card-header bg-primary text-white">{{ __('Gestion les clients') }}</div>
                    <div class="card-body">
                        <div class="justify-content-end col-md-12">
                            <a href="{{ route('client.ajouter') }}" class="btn btn-primary mb-3 float-end">
                                <i class="fa fa-plus"></i>Ajouter
                            </a>
                        </div>
                        <div class="table-responsive col-md-12 mt-2">
                            <table class="table table-bordered text-center w-100 table-striped">
                                <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de naissance</th>
                                    <th>Telephone</th>
                                    <th>Ville</th>
                                    <th>Agence</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key=> $item)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{ $item->nom_client }}</td>
                                        <td>{{ $item->prenom_client }}</td>
                                        <td>{{ $item->date_naissance }}</td>
                                        <td>{{ $item->telephone}}</td>
                                        <td>{{ $item->ville_residence}}</td>
                                        <td>{{ $item->agence }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('client.editer',['id'=>$item->client_id]) }}" title="Modifier" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('client.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{ $item->client_id }}" name="id">
                                                    <button type="submit" title="Supprimer" class="btn btn-danger btn-sm ms-1">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
