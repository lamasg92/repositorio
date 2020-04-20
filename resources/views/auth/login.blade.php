@extends('layouts.home')

@section('title', '| Ingresar')

@section('content')
        <div class="text ml-2">
        <span class="position"><p></p></span>
    </div>

      <section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(images/clases.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-12">
                    <div class="py-md-5">
                      <div class="heading-section heading-section-white ftco-animate mb-5">
                        <h2 class="mb-4">{{ __('Ingresar') }}</h2>
                      </div>
                      <form form method="POST" action="{{ route('login') }}" class="appointment-form ftco-animate"">
                        @csrf
                        <div class="form-group row" align="center">
                            <div class="col-md-6">
                                <input id="dni" type="dni" class="form-control @error('dni') is-invalid @enderror" name="dni" placeholder="DNI" required autocomplete="dni">
                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" align="center">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color:white">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a style="color:white" class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvide Contraseña') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" align="center">
                            <div class="col-md-6" align="center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>
                    </form>                 
                  </div>
                </div>
        </div>
        </div>
    </section>
        
@endsection