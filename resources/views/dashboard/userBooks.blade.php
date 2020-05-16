@extends('dashboard.base')

@section('dashboard-content')
<user-books :payload="{{ $booksAvailable }}" :user="{{ $user }}" :booksinfo="{{ $booksinfo }}" />
@endsection