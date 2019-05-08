@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Competitors</h3>
    </div>

    <br>

    <div>
        <strong>Mans uzņēmums:</strong>
    </div>
    <br>
    <table class="table-bordered" width="100%">
        <tr height="40px">
            <td valign="middle">
                <div style="margin-left: 20px; float: left; width:30px;">
                    <img src="/images/industry.png" style="width: 30px">
                </div>
                <div style="margin-left: 60px; margin-top:3px;">
                    {{ $my_firm->name }}
                </div>
            </td>
            <td align="center" width="70px">
                <a href="/my_page/page_competitors_crud_edit/{{ $my_firm->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
        </tr>
    </table>

    <br><br>

    <div>
        <strong>Konkurenti:</strong>
    </div>
    <br>
    <table class="table-bordered" width="100%">
        @foreach($competitors as $c)
            <tr height="40px">
                <td valign="middle">
                    <div style="margin-left: 20px; float: left; width:30px;">
                        <img src="/images/industry.png" style="width: 30px">
                    </div>
                    <div style="margin-left: 60px; margin-top:3px;">
                        {{ $c->name }}
                    </div>
                </td>
                <td align="center" width="35px">
                    <a href="/my_page/page_competitors_crud_edit/{{ $c->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td align="center" width="35px">
                    {!! Form::open(['method' => 'DELETE','route' => ['page-competitors-crud-destroy', $c->id]]) !!}
                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    <br>

    <table width="100%">
        <tr>
            <td align="center">
                <div style="margin:5px 0px 10px 0px; text-align: center;"><a href="/my_page/page_competitors_crud_create" class="btn btn-default btn-sm"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</a></div>
            </td>
        </tr>
    </table>

@endsection

