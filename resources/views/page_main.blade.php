@extends('layouts.my_app')

@section('content')

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-lg-12">
                <h4>Тестируем БД</h4>

                <hr>

                @foreach($res_terms as $term)
                    <p><strong>{{$term->name}}</strong></p>
                    <p>{{$term->description}}</p>
                    <br>
                @endforeach

            </div>
        </div>
    </div> <!-- /container -->

@endsection


