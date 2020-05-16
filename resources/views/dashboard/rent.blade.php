@extends('dashboard.base')

@section('dashboard-content')
<rent :payload="{{ $books }}" />
@endsection