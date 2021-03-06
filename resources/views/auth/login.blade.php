@extends('layouts.app')

@section('content')
    <div id='infoContainer'>
        <h3>Inloggen</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" >E-Mail adres</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <div>
                        <label for="password" >Wachtwoord</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Onthouden
                        </label>
                    </div>
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
@endsection
