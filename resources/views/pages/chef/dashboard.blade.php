@extends('admin-layouts._master')
@section('content')
    <div class="dashboard">
        <div class="container">
            <div class="settings">
                <div class="section-title">Paramétres</div>
                <div class="setting">
                    <div class="title">
                        Open le tableau de borde pour les profs
                        <span class="status">
                            @if ($teachers_status == false)
                                <span class="inactivated">Desactivated</span>
                            @endif
                            @if ($teachers_status == true)
                                @if ($t_starts_at)
                                    <span class="inactivated">Activated: </span>
                                    <span class="date">
                                        <span>From</span> {{ $t_starts_at }}<span> To </span>{{ $t_ends_at }}
                                    </span>
                                @else
                                    <span class="inactivated">Activated</span>
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class="action">
                        <label class="manage" type="button" data-toggle="modal" data-target="#teachers-modal"
                            data-keyboard='false'>
                            Manage
                        </label>
                    </div>
                </div>

                <div class="setting">                                                                                                                            
                    <div class="title">
                        Open le tableau de borde pour les etudiants
                        <span class="status">
                            @if ($students_status == false)
                                <span class="inactivated">Desactivated</span>
                            @endif
                            @if ($students_status == true)
                                @if ($s_starts_at)
                                    <span class="inactivated">Activated: </span>
                                    <span class="date">
                                        <span>From</span> {{ $s_starts_at }}<span> To </span>{{ $s_ends_at }}
                                    </span>
                                @else
                                    <span class="inactivated">Activated</span>
                                @endif
                            @endif
                        </span>
                    </div>
                    <div class="action">
                        <label class="manage" type="button" data-toggle="modal" data-target="#students-modal"
                            data-keyboard='false'>
                            Manage
                        </label>
                    </div>
                </div>
                <div class="section-title">Filtrer de groupes</div>
                <div class="setting">
                    <div class="title">
                        Filtrer tous les groupes avec leur sujets
                    </div>
                    <div class="action">
                        <a href="{{ route('filter_groups') }}" class="manage">
                            Obtenir les groupes filtrés
                        </a>
                    </div>
                </div>
            </div>

            <div class="last-subjects">
                <div class="section-title">Les sujets récenter</div>
                @foreach ($subjects as $subject)
                    <div class="subject">
                        <div class="title">{{ $subject->title }}</div>
                        <div class="actions">
                            <a href="{{ route('chef_subjects.approve', $subject) }}" class="approve">Approver</a>
                            <a href="{{ route('chef_subjects.show', $subject) }}" class="show">Voir</a>
                            <a href="{{ route('chef_subjects.destroy', $subject) }}" class="delete">Supprimer</a>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>

    </div>
@endsection
