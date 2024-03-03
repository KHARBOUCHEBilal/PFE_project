@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Cree un Professeur</div>
                <div class="other-page">
                    <a href="{{ route('teachers.index') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>Show all Professeurs OR add Professeur
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
                    <form class="form" action="{{ route('teachers.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">Les informations sur les Professeurs</div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="nom">nom</label>
                                    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" />
                                    @if ($errors->has('nom'))
                                        <span class="help-block">{!! $errors->first('nom') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="prenom">prenom</label>
                                    <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" />
                                    @if ($errors->has('prenom'))
                                        <span class="help-block">{!! $errors->first('prenom') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="mobile">{{ __('pages/admin/global.phone') }}</label>
                                    <input type="text" name="mobile" id="mobile" value="{{ old('mobile') }}" />
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">{!! $errors->first('mobile') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="email">{{ __('pages/admin/global.email') }}</label>
                                    <input type="text" name="email" id="email" value="{{ old('email') }}" />
                                    @if ($errors->has('email'))
                                        <span class="help-block">{!! $errors->first('email') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="password">{{ __('pages/admin/global.password') }}</label>
                                    <input type="password" name="password" id="password"/>
                                    @if ($errors->has('password'))
                                        <span class="help-block">{!! $errors->first('password') !!}</span>
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

@section('javascript')
    <script src="{{ asset('vendor/Cckeditor/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language:'fr',
                style:true,
                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
                },

            })
            .then()
            .catch(error => {
                console.log(error);
            });
    </script>
@endsection