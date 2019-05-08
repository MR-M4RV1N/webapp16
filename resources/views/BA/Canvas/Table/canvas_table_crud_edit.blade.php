@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">


        {!! Form::open(array('route' => ['canvas_table_crud_update', $cat,  $canvas_block, $id],'method'=>'POST')) !!}
        <div class="form-group" align="left">
            <strong>Uzņēmuma nosaukums:</strong><br>
            {!! Form::text('item', $firm_canvas_result->item, array('placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
        </div>


        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Saglabāt</button>
        </div>
        {!! Form::close() !!}




    </div>


@endsection


