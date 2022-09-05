@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('_partial._flash_message')
            <div class="col-md-8">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <!-- ============================================================== -->
                                <!-- basic form -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header bg-white">A propos de moi</h5>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('user.edit.infos') }}"
                                                  id="registerForm">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{ $user->id }}">

                                                <div class="form-group">
                                                    <label for="lastname" class="">{{ __('Nom') }}&nbsp;<span
                                                            class="text-danger">*</span></label>
                                                    <input id="lastname" type="text"
                                                           class="form-control edit-info @error('name') is-invalid @enderror"
                                                           name="name"
                                                           value="{{ $user->nom }}" required
                                                           autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="firstname" class="">{{ __('Prenom') }}</label>

                                                    <input id="firstname" type="text"
                                                           class="form-control edit-info @error('name') is-invalid @enderror"
                                                           name="firstname"
                                                           value="{{ $user->prenom }}" required
                                                           autocomplete="firstname" autofocus>

                                                    @error('firstname')
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class="">{{ __('Email') }}
                                                        &nbsp;<span
                                                            class="text-danger">*</span></label>


                                                    <input id="email" type="email"
                                                           class="form-control edit-info @error('email') is-invalid @enderror"
                                                           name="email"
                                                           value="{{ $user->email }}" required
                                                           autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="row pt-1 pt-sm-1 mt-2">
                                                    <div class="col-sm-12 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-space btn-primary">Modifier</button>
                                                            <button type="reset" class="btn btn-space btn-light">Annuler</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end basic form -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- horizontal form -->
                                <!-- ============================================================== -->
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header bg-white">Changez le mot de passe</h5>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('user.edit.password') }}"
                                                  id="registerForm">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{ $user->id }}">

                                                <div class="form-group">
                                                    <label for="password"
                                                           class="">{{ __('Ancien mot de passe') }}
                                                        &nbsp;<span
                                                            class="text-danger">*</span></label>
                                                    <input id="oldpassword" type="password"
                                                           class="form-control reset-password @error('password') is-invalid @enderror"
                                                           name="oldpassword"
                                                           required autocomplete="old-password">

                                                    @error('oldpassword')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="password"
                                                           class="">{{ __('Nouveau mot de passe') }}&nbsp;<span
                                                            class="text-danger">*</span></label>
                                                    <input id="password" type="password"
                                                           class="form-control reset-password @error('password') is-invalid @enderror"
                                                           name="password"
                                                           required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                </div>

                                                <div class="form-group">
                                                    <label for="password-confirm"
                                                           class="">{{ __('Confirmer le mot de passe') }}
                                                        &nbsp;<span
                                                            class="text-danger">*</span></label>

                                                    <input id="password-confirm" type="password"
                                                           class="form-control reset-password"
                                                           onblur="checkConfirmPassword()"
                                                           name="password_confirmation" required
                                                           autocomplete="new-password">
                                                    <div id="invalid-passconf" hidden><span
                                                            class="text-danger">Le mot de passe confirmé est different !</span>
                                                    </div>
                                                </div>

                                                <div class="row pt-1 pt-sm-1 mt-2">
                                                    <div class="col-sm-12 pl-0">
                                                        <p class="text-right">
                                                            <button type="submit" class="btn btn-space btn-primary">Modifier</button>
                                                            <button type="reset" class="btn btn-space btn-light">Annuler</button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end horizontal form -->
                                <!-- ============================================================== -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
