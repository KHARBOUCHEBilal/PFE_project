@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.create') }} {{ __('pages/admin/global.subject') }}</div>
                <div class="other-page">
                    <a href="{{ route('subjects.index') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>{{ __('pages/admin/global.all_subjects') }}
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

                @include("includes.alerts.errors")

                <div class="body-content" id="body-content">
                    <form class="form" action="{{ route('subjects.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.subject_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="title">{{ __('pages/admin/global.title') }}</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}" />
                                    @if ($errors->has('title'))
                                        <span class="help-block">{!! $errors->first('title') !!}</span>
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
                            <div class="section">
                                <div class="title">
                                    {{ __('pages/visitor/pages/add-product/add-product-form2_3.additional_detail') }}</div>
                            </div>

                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="category_id">{{ __('pages/admin/global.category') }}</label>
                                    <select id="category_id" name="category_id">
                                        @if ($categories && $categories->count() > 0)
                                            <option value="" selected disabled>{{ __('pages/admin/global.choose_category') }}
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            <option value="" selected>Autre</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block">{!! $errors->first('category_id') !!}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="max_groups">Max number of groups</label>
                                    <input type="number" name="max_groups" id="max_groups"
                                        value="{{ old('max_groups') }}" />
                                    @if ($errors->has('max_groups'))
                                        <span class="help-block">{!! $errors->first('max_groups') !!}</span>
                                    @endif
                                </div>
                            </div>

                                  
                                <div class="action" style="padding-left: 30px">
                                    <label class="switch" type="button" data-toggle="modal" data-target="students-modal"
                                        data-keyboard='false'>
                                        <input type="checkbox" name="depend_on_s4">
                                        <span class="slider round"></span>
                                    </label>
                                    Is required to validate S4 ?
                                </div> --}}
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
