@extends('Layouts.test_app')


@section('content')


    <div align="center">


        {!! Form::open(array('route' => ['firm-description-crud-update'],'method'=>'POST')) !!}
        <div class="form-group" align="left">
            <strong>Uzņēmuma nosaukums:</strong><br>
            {!! Form::text('firm_name', $firm_description_result->name, array('placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" align="left">
            <strong>Uzņēmuma apraksts:</strong><br>
            {!! Form::textarea('firm_description', $firm_description_result->description, array('name'=>'firm_description','id'=>'firm_description')) !!}
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Atjaunot</button>
        </div>
        {!! Form::close() !!}




    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'firm_description' );
    </script>

@endsection


