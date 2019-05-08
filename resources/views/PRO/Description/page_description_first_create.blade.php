@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>Uzņēmuma novērtēšana</h3>
    </div>

    <br><br>

    {!! Form::open(array('route' => ['page-description-first-store'],'method'=>'POST')) !!}
    <div class="form-group" align="left">
        <strong>Uzņēmuma nosaukums:</strong><br>
        {!! Form::text('firm_name', null, array('placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
    </div>

    <div class="form-group" align="left">
        <strong>Uzņēmuma apraksts:</strong><br>
        {!! Form::textarea('firm_description', null, array('name'=>'firm_description','id'=>'firm_description')) !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-default">Pievienot</button>
    </div>

    <br><br><hr>
    {!! Form::close() !!}

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'firm_description' );
    </script>

@endsection

