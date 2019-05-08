@extends('Layouts.models_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div>
        <strong>Основные инструменты:</strong><br>
        <div style="margin-left:10px;">
            @foreach($subb_1 as $s)
                {{ $s->name }}<br>
            @endforeach
        </div>

        <br>

        <strong>Дополнительные инструменты:</strong><br>
        <div style="margin-left:10px;">
            @foreach($subb_2 as $s)
                {{ $s->name }}<br>
            @endforeach
        </div>
    </div>

@endsection

