@extends('Layouts.admin_categories_app')


@section('content')

    <script src="{{ asset('/js/ckeditor-full/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" >
    </script>

    <!-- Content -->
    {!! Form::open(array('method'=>'POST', 'route' => ['categories-strategy-sub-store', $cat])) !!}
    <div align="center"> <!-- div для выравнивания по центру -->
        <div class="form-group" align="left">
            <strong>TITLE:</strong><br>
            {!! Form::text('sub_cat_name', null, array('placeholder' => 'Название подкатегории','class' => 'form-control')) !!}
        </div>
        <hr>
        <div class="form-group" align="left">
            <strong>ROUTE:</strong><br>
            {!! Form::text('sub_cat_route', null, array('placeholder' => 'sub_category_route','class' => 'form-control')) !!}
        </div>
        <hr>
        <div class="form-group" align="left">
            <strong>TEXT:</strong><br>
            <textarea name="sub_cat_text" cols="30" rows="5"></textarea>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">SAVE</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    {!! Form::close() !!}
    <!-- Content -->

    <script>
        CKEDITOR.replace( 'sub_cat_text' );
    </script>

@endsection
