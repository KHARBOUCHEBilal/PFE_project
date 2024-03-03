@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.edit') }}{{ __('pages/admin/global.model') }}</div>
                <div class="other-page">
                    <a href="{{ route('models.index') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>{{ __('pages/admin/global.all_models') }}
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

                    <form class="form" action="{{ route('models.update', $model->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $model->id }}">
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.model_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="name">{{ __('pages/admin/global.name') }}</label>
                                    <input type="text" name="name" id="name" value="{{ $model->name }}" />
                                    @if ($errors->has('name'))
                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="field">
                                    <label htmlFor="semester">{{ __('pages/admin/global.category') }}</label>
                                    <select id="semester" name="semester">
                                      <option  @if ($model->semester == "S1") selected @endif value="S1">S1</option>
                                      <option  @if ($model->semester == "S2") selected @endif value="S2">S2</option>
                                      <option  @if ($model->semester == "S3") selected @endif value="S3">S3</option>
                                      <option  @if ($model->semester == "S4") selected @endif value="S4">S4</option>
                                      <option  @if ($model->semester == "S5") selected @endif value="S5">S5</option>
                                      <option  @if ($model->semester == "S6") selected @endif value="S6">S6</option>
                                    </select>
                                    @if ($errors->has('semester'))
                                        <span class="help-block">{!! $errors->first('semester') !!}</span>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="description">{{ __('pages/admin/global.description') }}</label>
                                    <textarea name="description" id="editor" rows="12">
                                    {{ $model->description }}
                                </textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">{!! $errors->first('description') !!}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button class="action btn btn-warning" type="button">
                                <i class="fas fa-back"></i> {{ __('pages/admin/global.back') }}
                            </button>
                            <button class="action btn btn-primary" type="submit">
                                <i class="fas fa-save"></i> {{ __('pages/admin/global.update') }}
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
