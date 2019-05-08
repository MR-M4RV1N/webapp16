@extends('Layouts.admin_categories_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table style="border:1px solid lightgrey" width="100%" align="center">
        <tr height="50px">
            <td colspan="4" style="border-bottom:1px solid lightgrey">
                <div style="margin-left:20px;">
                        @if(isset($table_title))
                            <i>{{ $table_title }}</i>
                        @else
                            <i>Список стратагем:</i>
                        @endif
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="4" height="10px">

            </td>
        </tr>

        <?php $i = 1; ?>
        @foreach($stratagems as $stratagems)
            <tr height="30px">
                <td width="50px" align="right">
                    {{ $i }}.
                </td>
                <td>
                    <div style="margin-left:10px;">
                        <a href="/admin/page_stratagems_show/{{ $stratagems->id }}">{{ $stratagems->title }}</a>
                    </div>
                </td>
                <td width="40px" align="center">
                    <a href="/admin/page_stratagems_edit/{{ $stratagems->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td width="40px" align="left">
                    {!! Form::open(['method' => 'DELETE','route' => ['page-stratagems-destroy', $stratagems->id]]) !!}
                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach

        <tr>
            <td colspan="4" height="10px">

            </td>
        </tr>

    </table>

    <div style="margin:30px 0px 10px 0px; text-align: center;">
        <a href="/admin/page_stratagems_create" class="btn btn-default btn-xs">
            <span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>
            Add
        </a>
    </div>

@endsection

