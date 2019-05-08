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


        <table width="850px" class="canvas-table">
            <tr align="center">
                <td rowspan="2" width="170">
                    <img src="/images/Canvas/kp.png" ><br>
                    {{ $firm_canvas_kp_result }}<br>
                    Galvenie partneri<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/kp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    <img src="/images/Canvas/kd.png" ><br>
                    {{ $firm_canvas_kd_result }}<br>
                    Galvenās aktivitātes<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/kd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="2" rowspan="2" width="85">
                    <img src="/images/Canvas/cp.png" ><br>
                    {{ $firm_canvas_cp_result }}<br>
                    Vērtigie piedavājumi<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/cp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    <img src="/images/Canvas/vk.png" ><br>
                    {{ $firm_canvas_vk_result }}<br>
                    Attiecības ar klientiem<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/vk" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td rowspan="2" width="170">
                    <img src="/images/Canvas/ps.png" ><br>
                    {{ $firm_canvas_ps_result }}<br>
                    Pateretāju segmenti<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/ps" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr align="center">
                <td height="170px">
                    <img src="/images/Canvas/kr.png" ><br>
                    {{ $firm_canvas_kr_result }}<br>
                    Galvenie resursi<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/kr" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px">
                    <img src="/images/Canvas/ks.png" ><br>
                    {{ $firm_canvas_ks_result }}<br>
                    Noietas kanali<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/ks" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr height="150px" align="center">
                <td colspan="3">
                    <img src="/images/Canvas/si.png" ><br>
                    {{ $firm_canvas_si_result }}<br>
                    Izdevumu struktūra<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/si" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="3">
                    <img src="/images/Canvas/pd.png" ><br>
                    {{ $firm_canvas_pd_result }}<br>
                    Ienākumu struktūra<br>
                    <a href="/page_canvas/canvas_table_edit/{{ $cat }}/pd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
        </table>

    </div>



@endsection

