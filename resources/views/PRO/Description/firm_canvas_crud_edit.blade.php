@extends('Layouts.test_app')


@section('content')


    <div align="center">
        {!! Form::open(array('route' => ['firm_canvas_crud_update', $canvas_block, $id],'method'=>'POST')) !!}
        <div class="form-group" align="left" style="width:700px;">
            <div align="center">
                <img src="/images/pen.png" width="50px">
                <div style="margin:20px 0px 20px 0px;">Rediģēt ierakstu:</div>
            </div>
            <input type="text" name="item" value="{{ $firm_canvas_result->item }}" class="form-control" style="border-radius: 0rem;">
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Saglabāt</button>
        </div>
        {!! Form::close() !!}
    </div>


@endsection


