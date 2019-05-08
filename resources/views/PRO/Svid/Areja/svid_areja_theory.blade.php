@extends('Layouts.test_app')


@section('content')

    <div align="center">
        <h4>SVID ANALĪZE - {{ $table_title }}</h4>
    </div>

    <br><br>

    <div>
        <p style="text-indent: 20px;" align="justify">
            {{ $theory->theory }}
        </p>
    </div>



@endsection

