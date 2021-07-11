@extends('layouts.app')
@section('content')
    <button type="button" class="btn btn-outline-primary">{{ $user->email }} ({{ $users_count }})</button>


@endsection
