@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>SVID - TOWS ANALĪZE</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>


    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" TOWS matrica</strong>
                </td>
            </tr>
        </table>

        <br>

        <table class="table-bordered" width="870px">
            <tr>
                <td width="10px" align="center" style="color: #aaaaaa">

                </td>
                <td width="290px" align="center">
                    STIPRĀS PUSES
                </td>
                <td width="290px" align="center">
                    VĀJĀS PUSES
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">IESPĒJAS</div>
                </td>
                <td style="vertical-align: top;">
                    <table width="100%">
                        <tr style="border-bottom: 1px dashed #cfcfcf">
                            <td align="center">
                                SI Stratēģijas
                                <a href="/my_page/svid_tows_manage/SI" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: xx-small;">
                                @if(isset($strategy_si[0]))
                                    <div style="margin:10px 0px 20px 0px;">
                                        @foreach ($strategy_si as $si)
                                            <ul style="margin:0px;">
                                                <li>{{ $si->strategy }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top">
                    <table width="100%">
                        <tr style="border-bottom: 1px dashed #cfcfcf">
                            <td align="center">
                                VI Stratēģijas
                                <a href="/my_page/svid_tows_manage/VI" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: xx-small;">
                                @if(isset($strategy_vi[0]))
                                    <div style="margin:10px 0px 20px 0px;">
                                        @foreach ($strategy_vi as $vi)
                                            <ul style="margin:0px;">
                                                <li>{{ $vi->strategy }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">DRAUDI</div>
                </td>
                <td style="vertical-align: top">
                    <table width="100%">
                        <tr style="border-bottom: 1px dashed #cfcfcf">
                            <td align="center">
                                SD Stratēģijas
                                <a href="/my_page/svid_tows_manage/SD" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: xx-small;">
                                @if(isset($strategy_sd[0]))
                                    <div style="margin:10px 0px 20px 0px;">
                                        @foreach ($strategy_sd as $sd)
                                            <ul style="margin:0px;">
                                                <li>{{ $sd->strategy }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align: top">
                    <table width="100%" >
                        <tr style="border-bottom: 1px dashed #cfcfcf">
                            <td align="center">
                                VD Stratēģijas
                                <a href="/my_page/svid_tows_manage/VD" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: xx-small;">
                                @if(isset($strategy_vd[0]))
                                    <div style="margin:10px 0px 20px 0px;">
                                        @foreach ($strategy_vd as $vd)
                                            <ul style="margin:0px;">
                                                <li>{{ $vd->strategy }}</li>
                                            </ul>
                                        @endforeach
                                    </div>
                                @else
                                    <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    </div>



@endsection

