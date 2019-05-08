@extends('Layouts.admin_categories_app')


@section('content')

    <script src="{{ asset('/js/ckeditor-full/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" >
    </script>

    <!-- Content -->
    {!! Form::open(array('route' => 'page-categories-strategy-store','method'=>'POST')) !!}
    <div align="center"> <!-- div для выравнивания по центру -->
        <div class="form-group" align="left">
            <strong>TITLE:</strong><br>
            {!! Form::text('name', null, array('placeholder' => 'Название категории','class' => 'form-control')) !!}
        </div>
        <div class="form-group" align="left" style="margin-top: 30px;">
            <strong>TEXT:</strong><br>
            <textarea name="category_text" cols="30" rows="5"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    {!! Form::close() !!}
    <!-- Content -->

    <script>
        CKEDITOR.replace( 'category_text' );
    </script>

@endsection
