@extends('layouts.base')

@section('content')
<div>
    <navbar>
        <div slot="content">
            @yield('dashboard-content')
        </div>
    </navbar>

</div>

@endsection