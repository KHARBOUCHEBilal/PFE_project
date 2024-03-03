@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">Modifiée les notes de modules</div>
                <div class="other-page">
                    <a href="{{ route('models.index') }}">
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
                    <form class="form" action="{{ route('modules_notes.update',$modules_note) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.model_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="student">Etudian</label>
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
                                    <label htmlFor="programation2">Programation2</label>
                                    <input type="number" step=".01" min="0" max="20" name="programation2" id="programation2"
                                        value="{{ $modules_note->programation2}}" />
                                    @if ($errors->has('programation2'))
                                        <span class="help-block">{!! $errors->first('programation2') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="structures_de_donnees">Structures de donnees</label>
                                    <input type="number" step=".01" min="0" max="20" name="structures_de_donnees" id="structures_de_donnees"
                                        value="{{ $modules_note->structures_de_donnees}}" />
                                    @if ($errors->has('structures_de_donnees'))
                                        <span class="help-block">{!! $errors->first('structures_de_donnees') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="systeme_dexploitation2">Systeme d'exploitation2</label>
                                    <input type="number" step=".01" min="0" max="20" name="systeme_dexploitation2" id="systeme_dexploitation2"
                                        value="{{ $modules_note->systeme_dexploitation2}}" />
                                    @if ($errors->has('systeme_dexploitation2'))
                                        <span class="help-block">{!! $errors->first('systeme_dexploitation2') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="analyse_numerique">Analyse numerique</label>
                                    <input type="number" step=".01" min="0" max="20" name="analyse_numerique" id="analyse_numerique"
                                        value="{{ $modules_note->analyse_numerique}}" />
                                    @if ($errors->has('analyse_numerique'))
                                        <span class="help-block">{!! $errors->first('analyse_numerique') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="archetecture_des_ordinateurs">Archetecture des ordinateurs</label>
                                    <input type="number" step=".01" min="0" max="20" name="archetecture_des_ordinateurs" id="archetecture_des_ordinateurs"
                                        value="{{ $modules_note->archetecture_des_ordinateurs}}" />
                                    @if ($errors->has('archetecture_des_ordinateurs'))
                                        <span class="help-block">{!! $errors->first('archetecture_des_ordinateurs') !!}</span>
                                    @endif
                                </div>
                                <div class="field">
                                    <label htmlFor="electromagnetisme">Electromagnetisme</label>
                                    <input type="number" step=".01" min="0" max="20" name="electromagnetisme" id="electromagnetisme"
                                        value="{{ $modules_note->electromagnetisme}}" />
                                    @if ($errors->has('electromagnetisme'))
                                        <span class="help-block">{!! $errors->first('electromagnetisme') !!}</span>
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
