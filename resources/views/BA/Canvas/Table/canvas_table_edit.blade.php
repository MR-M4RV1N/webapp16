@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">

        @foreach($firm_canvas_result as $firm_canvas_result)
            <table width="600px" class="table-bordered">
                <tr>
                    <td width="550px">
                        {{ $firm_canvas_result->item }}
                    </td>
                    <td>
                        <a href="/page_canvas/canvas_table_crud_edit/{{ $cat }}/{{  $canvas_block }}/{{ $firm_canvas_result->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['canvas_table_crud_destroy', $cat,  $canvas_block, $firm_canvas_result->id]]) !!}
                            <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            </table>
        @endforeach

        <div style="margin-top:30px;">
            <div style="margin:5px 0px 10px 0px; text-align: center;"><a href="/page_canvas/canvas_table_crud_create/{{ $cat }}/{{ $canvas_block }}" class="btn btn-default btn-xs"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</a></div>
        </div>



    </div>


@endsection


