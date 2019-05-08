@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">


        {!! Form::open(array('route' => ['canvas_table_crud_store', $cat, $canvas_block],'method'=>'POST')) !!}
        <div class="form-group" align="left">
            <strong>Эллемент блока...:</strong><br>
            {!! Form::text('item', null, array('placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Saglabāt</button>
        </div>
        {!! Form::close() !!}




    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'firm_description' );
    </script>

@endsection


