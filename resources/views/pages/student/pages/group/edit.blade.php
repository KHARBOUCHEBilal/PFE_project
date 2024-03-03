@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.create') }} {{ __('pages/admin/global.group') }}</div>
                <div class="other-page">
                    <a href="{{ route('group.my_groupe') }}">
                        <span>
                            <i class="fa-solid fa-list-check"></i>{{ __('pages/admin/global.all_groups') }}
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
                    <form class="form" action="{{ route('group.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="section">
                            <div class="title">{{ __('pages/admin/global.group_info') }}</div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="field">
                                    <label htmlFor="subject1_id">Choix Némuro 1</label>
                                    <select id="subject1_id" name="subject1_id">
                                        @if ($subjects->count() > 0)
                                            <option value="" selected disabled>
                                                {{ __('pages/admin/global.subjects') }}
                                            </option>
                                            @foreach ($subjects as $subject)
                                                <option @if ($subject->id == $group->subject1_id) selected @endif
                                                    value="{{ $subject->id }}">{{ $subject->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('subject1_id'))
                                        <span class="help-block">{!! $errors->first('subject1_id') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="field">
                                    <label htmlFor="subject2_id">Choix Némuro 2</label>
                                    <select id="subject2_id" name="subject2_id">
                                        @if ($subjects->count() > 0)
                                            <option value="" selected disabled>
                                                {{ __('pages/admin/global.subjects') }}
                                            </option>
                                            @foreach ($subjects as $subject)
                                                <option @if ($subject->id == $group->subject2_id) selected @endif
                                                    value="{{ $subject->id }}">{{ $subject->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('subject2_id'))
                                        <span class="help-block">{!! $errors->first('subject2_id') !!}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="field">
                                    <label htmlFor="subject3_id">Choix Némuro 3</label>
                                    <select id="subject3_id" name="subject3_id">
                                        @if ($subjects->count() > 0)
                                            <option value="" selected disabled>
                                                {{ __('pages/admin/global.subjects') }}
                                            </option>
                                            @foreach ($subjects as $subject)
                                                <option @if ($subject->id == $group->subject3_id) selected @endif
                                                    value="{{ $subject->id }}">{{ $subject->title }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('subject3_id'))
                                        <span class="help-block">{!! $errors->first('subject3_id') !!}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                @php $users_ids = explode(',', $group->users_ids) @endphp
                               
                                <div class="tags-field">
                                <label class="label">{{ __('pages/visitor/pages/add-product/add-product-form2_3.select_one_or_more') }}</label>
                                <div class="tags">
                                    @php $users_ids = explode(',', $group->users_ids) @endphp
                                    @foreach ($users as $user)
                                        <div class="tag  @if (in_array($user->id, $users_ids)) active @endif" id="tag">
                                            <label>{{$user->nom}} {{ $user->prenom }}</label>
                                            <input type="checkbox" @if (in_array($user->id, $users_ids)) checked @endif value="{{ $user->id }}" name="users_ids[]">
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            {{-- <div class="field">
                                    <label
                                        class="label">{{ __('pages/visitor/pages/add-product/add-product-form2_3.select_one_or_more') }}</label>
                                    <div class="selectBox" onclick="showCheckboxes()">
                                        <select>
                                            <option>Select an option</option>
                                        </select>
                                        <div class="overSelect"></div>
                                    </div>
                                    <div id="checkboxes">
                                        @foreach ($users as $user)
                                            <div class="tag" id="tag">
                                                <label>
                                                    <input type="checkbox" @if (in_array($user->id, $users_ids)) checked @endif
                                                        value="{{ $user->id }}" name="users_ids[]">
                                                    {{ $user->nom }} {{ $user->prenom }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            --}}
                            <div class="col-sm-12">
                                <div class="field">
                                    <label htmlFor="motivation">{{ __('pages/admin/global.motivation') }}</label>
                                    <textarea name="motivation" id="editor" rows="12">{{ $group->motivation }}</textarea>
                                    @if ($errors->has('motivation'))
                                        <span class="help-block">{!! $errors->first('motivation') !!}</span>
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
    <script src="{{ asset('assets/js/selectMultiOptions.js') }}"></script>
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
