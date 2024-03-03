@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Change Password</div>
                <div class="other-page">
                    <a href="{{ route('welcome') }}">
                        <span>
                            Roteur
                        </span>
                    </a>
                </div>
            </div>
            <div class="page-body" id="page-body">
                <ul class="body-actions">
                    <li class="close-body" id="close-body">
                        <i class="fas fa-close"></i>
                    </li>
                    <li class='minimize' id="hide-body">
                        <i class="fa-solid fa-window-minimize"></i>
                    </li>
                    <li class="fscreen" id="page-full-screen">
                        <i class="fa-solid fa-arrows"></i>
                    </li>
                </ul>
                <div class="body-content" id="body-content">
                    <form class="form" action="{{ route('store-password') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="password">Password</label>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}" />
                                    @if ($errors->has('password'))
                                        <span class="help-block">{!! $errors->first('password') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="password_confirmation">Password confirmation</label>
                                    <input type="password" name="password"
                                        id="password_confirmation" value="{{ old('password_confirmation') }}" />
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">{!! $errors->first('password_confirmation') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button class="action btn btn-warning" type="button">
                                <i class="fas fa-back"></i> {{ __('pages/admin/global.back') }}
                            </button>
                            <button class="action btn btn-primary" type="submit">
                                <i class="fas fa-save"></i> {{ __('pages/admin/global.save') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
