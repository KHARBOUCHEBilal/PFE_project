@extends('layouts._master')
@section('title', 'PFE Distributor')
@section('content')
    <div class="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="page-title">{{ __('Login Student') }}</div>
<br><br>
                    <div class="logo">
                        <img src="{{ asset('assets/images/student.png') }}" alt="Student logo">
                    </div>
                    <div class="page-body">
                        <form method="POST" action="{{ route('studentAuth') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="CNI"
                                    class="col-md-4 col-form-label text-md-end">{{ __('CNI') }}</label>

                                <div class="col-md-6">
                                    <input id="CNI" type="text"
                                        class="form-control @error('CNI') is-invalid @enderror" name="CNI"
                                        value="{{ old('CNI') }}" required autocomplete="CNI" autofocus>

                                    @error('CNI')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="CNE"
                                    class="col-md-4 col-form-label text-md-end">{{ __('CNE') }}</label>

                                <div class="col-md-6">
                                    <input id="CNE" type="text"
                                        class="form-control @error('CNE') is-invalid @enderror" name="CNE"
                                        value="{{ old('CNE') }}" required autocomplete="CNE" autofocus>

                                    @error('CNE')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="studentCode"
                                    class="col-md-4 col-form-label text-md-end">Code d'etudiant</label>

                                <div class="col-md-6">
                                    <input id="studentCode" type="number"
                                        class="form-control @error('studentCode') is-invalid @enderror"
                                        name="studentCode" required autocomplete="current-studentCode">

                                    @error('studentCode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary form-control">
                                        {{ __('Login') }}
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
