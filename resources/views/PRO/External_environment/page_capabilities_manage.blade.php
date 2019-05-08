@extends('Layouts.test_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>{{ $title }}</h3>
    </div>

    <br><br>

    <table style="border:1px solid lightgrey" width="700px" align="center">
        <tr height="50px">
            <td colspan="4" style="border-bottom:1px solid lightgrey">
                <div style="margin-left:20px;">
                    @if(isset($table_title))
                        <i>{{ $table_title }}</i>
                    @else
                        <i>Izvēlēta bloka elementi:</i>
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
                        <a href="/my_page/page_capabilities_edit/{{ $category }}/{{ $item->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td width="40px" align="left">
                        {!! Form::open(['method' => 'DELETE','route' => ['page-capabilities-destroy', $category, $item->id]]) !!}
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

    <div style="margin:30px 0px 10px 0px; text-align: center;">
        <a href="/my_page/page_capabilities_create/{{ $category }}" class="btn btn-default btn-xs"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</a>
    </div>


@endsection

