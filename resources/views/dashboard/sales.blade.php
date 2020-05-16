@extends('dashboard.base')

@section('dashboard-content')
<sales :payload="{{ $books }}" />
@endsection