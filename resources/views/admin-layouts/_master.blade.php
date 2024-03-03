@include('includes._header')
@include('layouts._navbar')
<div class="app" id="app">
    <div class="dashboard-container">
        @include('admin-layouts._sidebar')
        <div class="content-area" id="content-area">
            @section('content')
            @show
            @include('layouts._footer')
        </div>
    </div>
</div>
@include('admin-layouts._modals')
@include('includes._footer')