@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="row justify-content-center d-flex">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="card p-3">
                        <div class="card-header bg-white">
                            <h4>Créer un utilisateur</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user.add.store') }}" id="registerForm">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="lastname" class="">{{ __('Nom') }}&nbsp;<span
                                                class="text-danger">*</span></label>

                                        <input id="lastname" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="firstname" class="">{{ __('Prenom') }}</label>

                                        <input id="firstname" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="firstname"
                                               value="{{ old('firstname') }}" autocomplete="firstname" autofocus>

                                        @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email" class="">{{ __('Email') }}&nbsp;<span
                                                class="text-danger">*</span></label>


                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="role">Role <span class="text-danger">*</span></label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="2">Utilisateur</option>
                                            <option value="1">Administrateur</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password" class="">{{ __('Mot de passe') }}&nbsp;<span
                                                class="text-danger">*</span></label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="row pt-1 pt-sm-1 mt-2">
                                    <div class="col-sm-12 pl-0">
                                        <p class="text-right">
                                            <button type="submit" class="btn btn-space btn-primary">Enregistrer</button>
                                            <button type="reset" class="btn btn-space btn-light">Annuler</button>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
