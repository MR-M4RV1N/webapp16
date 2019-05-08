@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h4>{{ $table_title }}</h4>
    </div>

    <br><br>

    <table style="border:1px solid lightgrey" width="700px" align="center">
        <tr height="50px">
            <td colspan="4" style="border-bottom:1px solid lightgrey">
                <div style="margin-left:20px;">
                    @if(isset($table_title))
                        {{ $table_title }}
                    @else
                        Izvēlēta bloka elementi:
                    @endif
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="4" height="10px">

            </td>
        </tr>

        @if(isset($item[0]))
            <?php $i = 1; ?>
            @foreach($item as $item)
                <tr height="30px">
                    <td width="50px" align="right">
                        {{ $i }}.
                    </td>
                    <td>
                        <div style="margin-left:10px;">
                            {{ $item->item }}
                        </div>
                    </td>
                    <td width="40px" align="center">
                        <a href="/my_page/page_canvas_edit/{{ $category }}/{{ $item->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td width="40px" align="left">
                        {!! Form::open(['method' => 'DELETE','route' => ['page-canvas-destroy', $category, $item->id]]) !!}
                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        @else
            <tr>
                <td colspan="4" height="30px">
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
            </tr>
        @endif

        <tr>
            <td colspan="4" height="10px">

            </td>
        </tr>

    </table>


    <div align="center" style="margin-top:30px;">
        {!! Form::open(array('route' => ['page-canvas-store', $category],'method'=>'POST')) !!}
        <div class="form-group" align="left" style="width:700px;">
            <div align="center">
                <div style="margin:20px 0px 20px 0px;">Pievienot jaunu ierakstu:</div>
            </div>
            <input type="text" name="item" class="form-control" style="border-radius: 0rem;">
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</button>
        </div>
        {!! Form::close() !!}
    </div>




@endsection

