@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Canvas business model</h3>
    </div>


    <div style="margin: 50px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>


    <div align="center" style="margin-top:50px;">
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
                    <img src="/images/Canvas/kp.png" ><br>
                    {{ $model_canvas_kp_result }}<br>
                    Galvenie partneri<br>
                    <a href="/my_page/page_canvas_manage/kp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    <img src="/images/Canvas/kd.png" ><br>
                    {{ $model_canvas_kd_result }}<br>
                    Galvenās aktivitātes<br>
                    <a href="/my_page/page_canvas_manage/kd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="2" rowspan="2" width="85">
                    <img src="/images/Canvas/cp.png" ><br>
                    {{ $model_canvas_cp_result }}<br>
                    Vērtigie piedavājumi<br>
                    <a href="/my_page/page_canvas_manage/cp" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px" width="170">
                    <img src="/images/Canvas/vk.png" ><br>
                    {{ $model_canvas_vk_result }}<br>
                    Attiecības ar klientiem<br>
                    <a href="/my_page/page_canvas_manage/vk" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td rowspan="2" width="170">
                    <img src="/images/Canvas/ps.png" ><br>
                    {{ $model_canvas_ps_result }}<br>
                    Pateretāju segmenti<br>
                    <a href="/my_page/page_canvas_manage/ps" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr align="center">
                <td height="170px">
                    <img src="/images/Canvas/kr.png" ><br>
                    {{ $model_canvas_kr_result }}<br>
                    Galvenie resursi<br>
                    <a href="/my_page/page_canvas_manage/kr" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td height="170px">
                    <img src="/images/Canvas/ks.png" ><br>
                    {{ $model_canvas_ks_result }}<br>
                    Noietas kanali<br>
                    <a href="/my_page/page_canvas_manage/ks" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr height="150px" align="center">
                <td colspan="3">
                    <img src="/images/Canvas/si.png" ><br>
                    {{ $model_canvas_si_result }}<br>
                    Izdevumu struktūra<br>
                    <a href="/my_page/page_canvas_manage/si" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td colspan="3">
                    <img src="/images/Canvas/pd.png" ><br>
                    {{ $model_canvas_pd_result }}<br>
                    Ienākumu struktūra<br>
                    <a href="/my_page/page_canvas_manage/pd" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-top:30px;" align="right">
        <a href="/my_page/downloadCanvas" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Download</a>
    </div>

@endsection

