@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h4>Тут будет заглавие!</h4><br>
        <img src="/images/Strategy/strategy_process.png" style="width:300px;"><br>

    </div>

    <div style="margin-top:30px;">
        <p>
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
            Тут будет текст. Боольшой такой текст.
        </p>
    </div>






@endsection

