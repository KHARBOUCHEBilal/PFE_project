@extends('admin-layouts._master')
@section('content')
    <div class="page" id="page">
        <div class=new-admin id="new-admin">
            <div class="page-top">
                <div class="title">{{ __('pages/admin/global.all_subjects') }}</div>
                @if (Auth::user()->user_type != 'student')
                    <div class="other-page">
                        <a href="{{ route('subjects.create') }}">
                            <span>
                                <i
                                    class="fa-solid fa-plus"></i>{{ __('pages/admin/global.create') }}{{ __('pages/admin/global.subject') }}
                            </span>
                        </a>
                    </div>
                @endif
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

                    @include('includes.alerts.success')
                    @include('includes.alerts.errors')

                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table display nowrap table-striped table-bordered " id="subjects">
                                <thead>
                                    <tr>
                                        <th>{{ __('pages/admin/global.title') }}</th>
                                        <th>{{ __('pages/admin/global.description') }}</th>
                                        <th>Type</th>
                                        @if (Auth::user()->user_type != 'student')
                                            <th>{{ __('pages/admin/global.actions') }}</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($subjects)
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $subject->title }}</td>
                                                <td>{!! $subject->description !!}</td>
                                                @if ($subject->category)
                                                    <td>{{ $subject->category->name }}</td>
                                                @else
                                                    <td>Autre</td>
                                                @endif
                                                @if (Auth::user()->user_type != 'student')
                                                    <td>
                                                        @if (Auth::user()->user_type == 'teacher')
                                                            <a href="{{ route('subjects.edit', $subject) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.edit') }}</a>
                                                            <a type="button" data-toggle="modal"
                                                                data-target="#subjects-modal{{ $subject->id }}"
                                                                data-keyboard='false'
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">{{ __('pages/admin/global.delete') }}</a>
                                                        @endif
                                                        @if (Auth::user()->user_type == 'students')
                                                            <a href="{{ route('students_subjects.show', $subject) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Details</a>
                                                        @endif
                                                        @if (Auth::user()->user_type == 'chef')
                                                            <a href="{{ route('chef_subjects.show', $subject) }}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">Details</a>
                                                        @endif
                                                    </td>
                                                @endif
                                            </tr>
                                            <div class="modal fade" id="subjects-modal{{ $subject->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="subjects-modal{{ $subject->id }}Title"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content product-modal">
                                                        <div class="close" type="button" data-dismiss="modal"><a
                                                                href="">X</a>
                                                        </div>
                                                        <div class="modal-carte-content last-add-product-model">
                                                            <h3>Voulez-vous vraiment supprimer cet élément</h3>
                                                            <div class="actions">
                                                                <button class="action cancel" type="button"
                                                                    data-dismiss="modal">
                                                                    Cancle
                                                                </button>
                                                                <a class="action save"
                                                                    href="{{ route('subjects.destroy', $subject) }}">
                                                                    Supprimer
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@include('includes._dataTable')
