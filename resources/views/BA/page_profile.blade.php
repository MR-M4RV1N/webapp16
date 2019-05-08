@extends('Layouts.home_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>
        <strong>Your user name:</strong>
        <p>{{ Auth::user()->name }}</p>
    </div>

    <div>
        <strong>Your email:</strong>
        <p>{{ Auth::user()->email }}</p>
    </div>





@endsection

