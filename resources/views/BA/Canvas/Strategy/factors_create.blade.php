@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {!! Form::open(array('route' => ['page-canvas-strategy-factors-store', $cat],'method'=>'POST')) !!}
    <div>
        <h4>Факторы</h4><br>
        <div class="form-group" align="left">
            <strong>Content item:</strong><br><br>
            {!! Form::text('content', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Pievienot</button>
        </div>
    </div>
    {!! Form::close() !!}




@endsection

