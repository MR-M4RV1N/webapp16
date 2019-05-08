@extends('Layouts.admin_categories_app')


@section('content')

    <script src="{{ asset('/js/ckeditor-full/ckeditor.js') }}"
            type="text/javascript" charset="utf-8" >
    </script>

    <!-- Content -->
    {!! Form::open(['method' => 'POST','route' => ['categories-strategy-sub-update', $category_record_string->id, $cat]]) !!}
    <div align="center"> <!-- div для выравнивания по центру -->
        <table class="table table-bordered">
            <tr>
                <td>
                    <p style="margin-bottom:10px;"><strong>TITLE:</strong></p>
                    <input type="text" name="category_sub_name" value="{{ $category_record_string->name }}" placeholder="Название подкатегори" class="form-control name_list_canvas_record" />
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-bottom:3px;"><strong>ROUTE</strong> (not necessarily)<strong>:</strong></p>
                    <table><tr><td>http://webapplication16.loc/my_page/</td><td><input type="text" name="category_sub_route" value="{{ $category_record_string->route }}" placeholder="my_route"  class="form-control name_list_canvas_record" style="width: 300px;"/></td></tr></table>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="margin-bottom:10px;"><strong>TEXT:</strong></p>
                    <textarea name="category_sub_text" cols="30" rows="5">{{ $category_record_string->text }}</textarea>
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
        CKEDITOR.replace( 'category_sub_text' );
    </script>

@endsection
