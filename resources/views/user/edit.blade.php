@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-8">
                <div class="card p-4">
                    <div class="card-header">{{ __('Gerer les clients') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.edit.store') }}" id="registerForm">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $user->id }}">

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="lastname" class="">{{ __('Nom') }}&nbsp;<span
                                            class="text-danger">*</span></label>
                                    <input id="lastname" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ $user->lastname }}" required autocomplete="name" autofocus>

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
                                           value="{{ $user->firstname }}" autocomplete="firstname" autofocus>

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
                                           value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                            <div class="row">
                                {{--                                <div class="form-group col-md-6">--}}
                                {{--                                    <label for="adresse">{{ __('Adresse') }}</label>--}}
                                {{--                                    <input type="text" class="form-control" name="adresse" value="{{ $user->adresse }}"--}}
                                {{--                                           id="adresse">--}}
                                {{--                                </div>--}}
                                @if(Auth::user()->is_admin >0)
                                    <div class="form-group col-md-6">
                                        <label for="role">Role <span class="text-danger">*</span></label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="2">Utilisateur</option>
                                            <option value="1">Administrateur</option>
                                        </select>
                                    </div>
                                @endif

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
                            @if(Auth::user()->is_admin ==0)
                                <input type="hidden" value="{{ $user->is_admin }}" name="role">
                            @endif

                            <div class="form-group row mb-0 text-centers justify-content-center">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Enregistrer') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
