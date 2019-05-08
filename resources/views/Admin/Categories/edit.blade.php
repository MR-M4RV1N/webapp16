@extends('Layouts.admin_categories_app')


@section('content')

    <script src="{{ asset('/js/ckeditor-full/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" >
    </script>

    <!-- Content -->
    {!! Form::open(['method' => 'POST','route' => ['page-categories-strategy-update', $category_record_string->id]]) !!}
    <div align="center"> <!-- div для выравнивания по центру -->
        <table class="table table-bordered">
            <tr>
                <td><input type="text" name="category_name" value="{{ $category_record_string->name }}" placeholder="Enter your phone number" class="form-control name_list_canvas_record" /></td>
            </tr>
            <tr>
                <td>
                    <textarea name="category_text" cols="30" rows="5">{{ $category_record_string->text }}</textarea>
                </td>
            </tr>
        </table>
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
