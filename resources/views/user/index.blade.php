@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-11">
                <div class="card p-4">
                    <div class="card-header bg-primary text-white">{{ __('Gestion des utilisateurs') }}</div>
                    <div class="card-body">
                        <div class="justify-content-end col-md-12">
                            <a href="{{ route('user.add') }}" class="btn btn-primary mb-3 float-end">
                                <i class="fa fa-plus"></i>Ajouter
                            </a>
                        </div>
                        <div class="table-responsive col-md-12 mt-2">
                            <table id="example" class="table table-bordered text-center">
                                <thead class="">
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Statut</th>
                                    <th>Crée le</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key=> $value)
                                    <tr id="table-row-{{ $value->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $value->nom }}</td>
                                        <td>{{ $value->prenom }}</td>
{{--                                        <td>{{ $value->phone }}</td>--}}
                                        <td>{{ $value->email }}</td>
                                        <td>
                                            @if($value->is_admin>=1)
                                                <span class="p-2 text-info">Administrateur</span>
                                            @endif
                                            @if($value->is_admin==0)
                                                <span class="p-2 text-success">Utilisateur</span>
                                            @endif

                                        </td>
                                        <td>
                                            @if($value->is_active>=1)
                                                <span class="p-2 text-info">Actif</span>
                                            @endif
                                            @if($value->is_active==0)
                                                <span class="p-2 text-danger">Bloqué</span>
                                            @endif

                                        </td>
                                        <td>{{ $value->created_at }}</td>
                                        <td class="d-flex">

                                            <a href="{{ route('user.edit', ['id'=>$value->id]) }}"
                                               class="btn btn-warning btn-sm" title="Modifier le compte"><i
                                                    class="fa fa-edit"></i></a>
                                            @if(Auth::user()->id != $value->id)

                                                <button class="btn btn-danger btn-sm ms-1 " title="Supprimer"
                                                        onclick="deleteFun({{ $value->id }})"><i
                                                        class="fa fa-trash"></i></button>

{{--                                                @if($value->is_active==1)--}}

{{--                                                    <a type="button" class="btn btn-dark ml-1 btn-sm"--}}
{{--                                                       href="{{ route('block_compte', ['id'=>$value->id]) }}"--}}
{{--                                                       title="Bloquer le compte">--}}
{{--                                                        <i class="fa fa-fw fa-lock"></i>--}}
{{--                                                    </a>--}}

{{--                                                @endif--}}
{{--                                                @if($value->is_active==0)--}}

{{--                                                    <a title="Activer le compte"--}}
{{--                                                       class="btn btn-success btn-sm ml-1"--}}
{{--                                                       href="{{ route('activate_compte', ['id'=>$value->id]) }}"--}}
{{--                                                       id="activate-user">--}}
{{--                                                        <i class="fa fa-fw fa-check"></i>--}}
{{--                                                    </a>--}}

{{--                                                @endif--}}
                                            @endif

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function deleteFun(id) {
            // var table = $('#example').DataTable();

            if (confirm("Supprimer cet utilisateur?")===true) {
                // if (confirm("Supprmer cette tâches?") == true) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('user.delete') }}",
                    data: {id: id},
                    dataType: 'json',
                    success: function (res) {
                        if (res) {
                            // alert("Supprimé avec succès!")
                            $('#deletebtn'+id).parents('tr')
                                .remove()
                            // toastr.success("Supprimé avec succès!");
                        } else {
                            alert( "Erreur lors de la suppression!")
                        }

                    },
                    error: function (resp) {
                        alert("Une erreur s'est produite.");
                    }
                });
            }

            // }
        }
    </script>
@endsection
