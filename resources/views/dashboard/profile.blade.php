@extends('dashboard.base')

@section('dashboard-content')
<!-- json_encode -->
<profile :myuser="{{ $user }}" />
@endsection