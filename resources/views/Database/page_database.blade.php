@extends('Layouts.database_app')


@section('content')

    <div>
        <strong>Список таблиц БД:</strong>
    </div>

    <br>


        <table style="margin-left:30px;" width="800px" class="table-bordered">
            @foreach($sql as $sql)
                <tr height="30px">
                    <td>
                        <img src="images/icon-table.png" width="20px" style="margin:0px 5px 0px 5px;">
                        {{ $sql->Tables_in_webapplication16 }}
                    </td>
                    <td width="50px" align="center">edit</td>
                    <td width="50px" align="center">delete</td>
                </tr>
            @endforeach
        </table>

        <table style="margin:30px 0px 0px 30px;" width="800px" height="30px">
            <tr>
                <td align="center"><div style="margin-left:10px;">create</div></td>
            </tr>
        </table>



@endsection

