@extends('layouts.frontpage')
@section('content')
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Login to your account</h2>
                    {!! Form::open(['route' => 'login']) !!}
                        <div class="form-group  @error('email') has-error @enderror">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email Address">
                            @error('email')
                            <label class="control-label" for="Email">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group @error('password') has-error @enderror">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password">
                            @error('password')
                            <label class="control-label" for="password">{{ $message }}</label>
                            @enderror
                        </div>
                        <span>
                            <input
                                type="checkbox"
                                class="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            />
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Pendaftaran Pengguna Baru!</h2>
                    {!! Form::open(['route' => 'register']) !!}
                        <div class="form-group  @error('email') has-error @enderror">
                            <input id="email1" type="email" class="form-control" name="email"
                                placeholder="Email Address" value="{{ old('email') }}">
                            @error('email')
                            <label class="control-label" for="Email1">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group  @error('name') has-error @enderror">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap"
                                value="{{ old('name') }}">
                            @error('name')
                            <label class="control-label" for="name">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group  @error('password') has-error @enderror">
                            <input id="pass1" type="password" class="form-control" name="password" placeholder="Kata Sandi">
                            @error('password')
                            <label class="control-label" for="pass1">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-confirm" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">
                        </div>
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
