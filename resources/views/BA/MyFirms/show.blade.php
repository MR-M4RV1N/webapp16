@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>
        <strong>Uzņēmuma nosaukums:</strong>
        <p>{{ $user_firm_result[0]->firm_name }}</p>
    </div>

    <div>
        <strong>Uzņēmuma apraksts:</strong>
        <p>{{ $user_firm_result[0]->firm_description }}</p>
    </div>




@endsection

