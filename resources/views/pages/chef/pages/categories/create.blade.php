@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.create') }} {{ __('pages/admin/global.subject') }}</div>
                <div class="other-page">
                    <a href="{{ route('categories.index') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>{{ __('pages/admin/global.all_categories') }}
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

                @include('includes.alerts.errors')

                <div class="body-content" id="body-content">
                    <form class="form" action="{{ route('categories.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.subject_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="name">{{ __('pages/admin/global.name') }}</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" />
                                    @if ($errors->has('name'))
                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="description">{{ __('pages/admin/global.description') }}</label>
                                    <textarea name="description" id="editor" rows="12">{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block">{!! $errors->first('description') !!}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="tags-field">
                                    <label
                                        class="label">{{ __('pages/visitor/pages/add-product/add-product-form2_3.select_one_or_more') }}</label>

                                    <div class="tags">
                                        @foreach ($models as $model)
                                            <div class="tag" id="tag">
                                                <label>{{ $model->name }}</label>
                                                <input type="checkbox" value="{{ $model->id }}"
                                                    name="model_id[]">
                                            </div>
                                        @endforeach
                                    </div>
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
