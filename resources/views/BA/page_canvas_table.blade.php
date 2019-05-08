@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" canvas business model</strong>
                </td>
            </tr>
        </table>
        <br><br>


        <table width="850px" class="table-bordered">
            <tr align="center">
                <td rowspan="2" width="170">
                    Galvenie partneri<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/kp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    Galvenās aktivitātes<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/kd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="2" rowspan="2" width="85">
                    Vērtigie piedavājumi<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/cp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    Attiecības ar klientiem<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/vk" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td rowspan="2" width="170">
                    Pateretāju segmenti<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/ps" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr align="center">
                <td height="170px">
                    Galvenie resursi<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/kr" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px">
                    Noietas kanali<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/ks" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr height="150px" align="center">
                <td colspan="3">
                    Izdevumu struktūra<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/si" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="3">
                    Ienākumu struktūra<br>
                    <a href="/my_page/firm_canvas_edit/{{ $cat }}/pd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
        </table>

    </div>






@endsection

