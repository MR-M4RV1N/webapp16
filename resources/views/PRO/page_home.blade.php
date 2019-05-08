@extends('Layouts.home_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div align="center">
        <img src="images/strategy.jpg" width="300px">
        <br><br><br>
        <h3>Welcome!</h3>
    </div>

    <br>

    <div style="text-indent: 20px; margin-left:70px; margin-right:70px;" align="justify">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
        Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
    </div>

    <br>

    @if($selected_firm_name !== null)
        <div align="center">
            <button type="button" class="btn btn-default" onclick="location.href='/page_firms'">Go to Strategy >>></button>
        </div>
    @else
        <div align="center">
            <button type="button" class="btn btn-default" onclick="location.href='/firms/create'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Izveidot jaunu</button>
        </div>
    @endif






@endsection

