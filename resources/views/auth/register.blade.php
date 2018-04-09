@extends('layouts.app')

@section('content')
    <div id='infoContainer'>
        <div>Registreer</div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name" >Naam</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="email">E-Mail Adres</label>
                <div>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div>
                <label for="password">Wachtwoord</label>
                <div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div>
                <label for="password-confirm">Wachtwoord bevestigen</label>
                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>
            <div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        Registreer
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
