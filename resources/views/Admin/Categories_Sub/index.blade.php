@extends('Layouts.admin_categories_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <!-- Контент -->
    <div align="center"> <!-- div для выравнивания по центру -->
        <!-- Кнопка -->
        <div align="left"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true" style="margin-right:10px;"></span><a href="/admin/page_categories_strategy_index">Back to category list</a></div><br>
        <!-- Список -->
        <table class="table table-bordered">
            @foreach ($categories_sub as $sub)
                <tr>
                    <td><p style="font-family:Times New Roman; margin-bottom:5px;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:10px;"></span>{{ $sub->name }}</p></td>
                    <td align="center" width="90px"><button onclick="location.href='/admin/categories_strategy_sub/edit/{{ $sub->id }}/{{ $cat }}'">Edit</button></td>
                    <td align="center" width="90px">
                        {!! Form::open(['method' => 'DELETE','route' => ['categories-strategy-sub-destroy', $sub->id, $cat],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <div align="left">
            <button type="button" name="add" id="add" class="btn btn-default" onclick="location.href='/admin/categories_strategy_sub/create/{{ $cat }}'">Add</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    <!-- Content -->


@endsection
