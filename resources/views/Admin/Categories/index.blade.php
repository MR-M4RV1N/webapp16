@extends('Layouts.admin_categories_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Content -->
    <div align="center"> <!-- div для выравнивания по центру -->

        <table style="width: 100%">
            <tr>
                <td style="width: 80%;">
                    <table class="table table-bordered" >
                        @foreach ($categories as $cat)
                            <tr style="height:43px">
                                <td><a href="/admin/categories_strategy_sub/index/{{ $cat->id }}" style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>{{ $cat->name }}</a></td>
                                <td align="center"><button onclick="location.href='/admin/page_categories_strategy_edit/{{ $cat->id }}'">Edit</button></td>
                                <td style="border-right:3px double #aaaaaa" align="center">
                                    {!! Form::open(['method' => 'DELETE','route' => ['page-categories-strategy-destroy', $cat->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete') !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
                <td style="width: 20%;">
                    <table class="table table-bordered" >
                        @foreach ($counted_sub as $sub)
                            <tr style="height:43px">
                                <td><p style="font-family:Calibri Light; margin:0px;"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:5px;"></span>{{ $sub }} записей</p></td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>




        <div align="left">
            <button type="button" name="add" id="add" class="btn btn-default" onclick="location.href='/admin/page_categories_strategy_create'">Add</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    <!-- Content -->


@endsection
