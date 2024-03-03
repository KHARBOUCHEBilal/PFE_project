@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Ajouter les notes de modules</div>
                <div class="other-page">
                    <a href="{{ route('semester_notes.index') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>Touts les notes
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
                    <form class="form" action="{{ route('semester_notes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.model_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="student">Etudiant</label>
                                    <select name="student" id="">
                                        @foreach ($students as $student)
                                            <option value="{{$student->id}}">{{$student->CNE}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('student'))
                                        <span class="help-block">{!! $errors->first('student') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S1">S1</label>
                                    <input type="number" step=".01" min="0" max="20" name="S1" id="S1"
                                        value="{{ old('S1') }}" />
                                    @if ($errors->has('S1'))
                                        <span class="help-block">{!! $errors->first('S1') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S2">S2</label>
                                    <input type="number" step=".01" min="0" max="20" name="S2" id="S2"
                                        value="{{ old('S2') }}" />
                                    @if ($errors->has('S2'))
                                        <span class="help-block">{!! $errors->first('S2') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S3">S3</label>
                                    <input type="number" step=".01" min="0" max="20" name="S3" id="S3"
                                        value="{{ old('S3') }}" />
                                    @if ($errors->has('S3'))
                                        <span class="help-block">{!! $errors->first('S3') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S4">S4</label>
                                    <input type="number" step=".01" min="0" max="20" name="S4" id="S4"
                                        value="{{ old('S4') }}" />
                                    @if ($errors->has('S4'))
                                        <span class="help-block">{!! $errors->first('S4') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S5">S5</label>
                                    <input type="number" step=".01" min="0" max="20" name="S5" id="S5"
                                        value="{{ old('S5') }}" />
                                    @if ($errors->has('S5'))
                                        <span class="help-block">{!! $errors->first('S5') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="S6">S6</label>
                                    <input type="number" step=".01" min="0" max="20" name="S6" id="S6"
                                        value="{{ old('S6') }}" />
                                    @if ($errors->has('S6'))
                                        <span class="help-block">{!! $errors->first('S6') !!}</span>
                                    @endif
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
                language: 'fr',
                style: true,
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
