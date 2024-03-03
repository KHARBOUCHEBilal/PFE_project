@extends('admin-layouts._master')
@section('content')
    <div class="show-subject">
        <div class="container">
            <div class="subject-wrapper">
                <div class="title">
                    {{ $subject->title }}
                </div>
                <div class="description">
                    {!! $subject->description !!}
                </div>
                <hr>
                <div class="type">
                    {{-- {{$subject->category}} --}}
                    <span>Subject type: {{ $subject->category->name }}</span>
                </div>
                {{-- @php $models_ids = explode(',',$subject->required_models)  @endphp
                <div class="models">
                    <ul>
                        @foreach ($models as $model)
                            @if (in_array($model->id, $models_ids))
                                <li>{{ $model->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div> --}}
                {{-- <div class="number-max">
                    Le numéro max de groups est : {{$subject->max_groups}}
                </div>
                <br>
                @if ($subject->depend_on_s4)
                <div class="depend_on_s4">
                    Il faut valider s4 pour avoir ce sujet
                </div>
                @endif --}}
                <br>
                <div class="email">Prof: <span>{{$subject->teacher->nom}} {{$subject->teacher->prenom}}</span></div>
                <div class="email">Email de prof: <span>{{$subject->teacher->email}}</span></div>
            </div>
        </div>
    </div>
@endsection
