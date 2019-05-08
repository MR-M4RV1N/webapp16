@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {!! Form::open(array('route' => ['firms_update', $id],'method'=>'POST')) !!}
    <div align="center"> <!-- div для выравнивания по центру -->
        <div class="form-group" align="left">
            <strong>Uzņēmuma nosaukums:</strong><br><br>
            {!! Form::text('firm_name', $user_firm_result[0]->firm_name, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" align="left">
            <strong>Uzņēmuma apraksts:</strong><br><br>
            {!! Form::textarea('firm_description', $user_firm_result[0]->firm_description, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Atjaunot</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    {!! Form::close() !!}



@endsection

