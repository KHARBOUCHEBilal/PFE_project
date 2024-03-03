<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="background-color: #fff">
    <path fill="#ececec" fill-opacity="1"
        d="M0,32L80,64C160,96,320,160,480,176C640,192,800,160,960,133.3C1120,107,1280,85,1360,74.7L1440,64L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
    </path>
</svg>
<section id="teachers" class="teachers">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Finale list</h2>
        </div>

        <div class="card-content collapse show">
            <div class="card-body card-dashboard">
                <table class="table display nowrap table-striped table-bordered " id="groups">
                    <thead>
                        <tr>
                            <th>Groupe</th>
                            <th>Sujet</th>
                            <th>Prof</th>

                        </tr>
                    </thead>
                    <tbody style="background-color: white">
                        @isset($groups)
                            @foreach ($groups as $group)
                                <tr>

                                    <td><span>- {{ $group->student1 }}</span>
                                        <br>
                                        @if ($group->student2)
                                            <span>- {{ $group->student2 }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $group->subject }}</td>
                                    <td class="prof"><span><strong>Prof:
                                            </strong>{{ $group->Subject->teacher->nom }}
                                            {{ $group->Subject->teacher->prenom }}</span>
                                        <span><strong>Email: </strong> {{ $group->Subject->teacher->email }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>