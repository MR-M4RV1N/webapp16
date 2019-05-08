@extends('Layouts.test_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>IE ANALĪZE</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>

    <div align="center">
        <div align="left" style="margin: 0px 0px 50px 130px; width:300px;">
            <p>Šī tabula ir atkariga no:</p>
            <ul>
                <li><a href="/my_page/page_ife_list">IFE analīzes</a>  (kopā: {{ $total_score1 }})</li>
                <li><a href="/my_page/page_efe_list">EFE analīzes</a>  (kopā: {{ $total_score2 }})</li>
            </ul>
        </div>
    </div>


    @if(($total_score1 != null) and ($total_score2 != null))
        <div align="center">
            <table height="400px">
                <tr align="center">
                    <td width="50px" height="30px" valign="bottom" style="border-bottom:1px solid lightgrey; border-right:2px solid black">
                        EFE score
                    </td>
                    <td width="150px">

                    </td>
                    <td width="150px">

                    </td>
                    <td width="150px">

                    </td>
                    <td width="50px">

                    </td>
                </tr>
                <tr align="center">
                    <td width="50px" align="right" valign="top" style="border-bottom:1px solid lightgrey; border-right:2px solid black">
                        4.0
                    </td>
                    <td width="150px" style="border:1px solid lightgrey;  @if((1 <= $total_score1) && ($total_score1 <= 2) and (3 < $total_score2) && ($total_score2 <= 4)) background-color: grey; @endif ">
                        I<br>grow
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((2 < $total_score1) && ($total_score1 <= 3) and (3 < $total_score2) && ($total_score2 <= 4)) background-color: grey; @endif ">
                        II<br>and
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((3 < $total_score1) && ($total_score1 <= 4) and (3 < $total_score2) && ($total_score2 <= 4)) background-color: grey; @endif ">
                        III<br>build
                    </td>
                    <td width="50px">

                    </td>
                </tr>
                <tr align="center">
                    <td width="50px" align="right" valign="top" style="border-bottom:1px solid lightgrey; border-right:2px solid black">
                        3.0
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((1 <= $total_score1) && ($total_score1 <= 2) and (2 < $total_score2) && ($total_score2 <= 3)) background-color: grey; @endif ">
                        IV<br>hold
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((2 < $total_score1) && ($total_score1 <= 3) and (2 < $total_score2) && ($total_score2 <= 3)) background-color: grey; @endif ">
                        V<br>and
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((3 < $total_score1) && ($total_score1 <= 4) and (2 < $total_score2) && ($total_score2 <= 3)) background-color: grey; @endif ">
                        VI<br>maintain
                    </td>
                    <td width="50px">

                    </td>
                </tr>
                <tr align="center">
                    <td width="50px" align="right" valign="top" style="border-bottom:1px solid lightgrey; border-right:2px solid black">
                        2.0
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((1 <= $total_score1) && ($total_score1 <= 2) and (1 <= $total_score2) && ($total_score2 <= 2)) background-color: grey; @endif ">
                        VII<br>harvest
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((2 < $total_score1) && ($total_score1 <= 3) and (1 < $total_score2) && ($total_score2 <= 2)) background-color: grey; @endif ">
                        VIII<br>or
                    </td>
                    <td width="150px" style="border:1px solid lightgrey; @if((3 < $total_score1) && ($total_score1 <= 4) and (1 < $total_score2) && ($total_score2 <= 2)) background-color: grey; @endif ">
                        IX<br>divest
                    </td>
                    <td width="50px">

                    </td>
                </tr>
                <tr align="center" height="30px">
                    <td width="50px" align="right" valign="top" style="border-right:1px solid lightgrey;">
                        1.0
                    </td>
                    <td width="150px" align="right" valign="top" style="border-right:1px solid lightgrey; border-top:2px solid black">
                        2.0
                    </td>
                    <td width="150px" align="right" valign="top" style="border-right:1px solid lightgrey; border-top:2px solid black">
                        3.0
                    </td>
                    <td width="150px" align="right" valign="top" style="border-right:1px solid lightgrey; border-top:2px solid black">
                        4.0
                    </td>
                    <td width="50px" valign="top" style="border-top:2px solid black">
                        IFE score
                    </td>
                </tr>
            </table>
        </div>
    @else
        <div align="center">
            IFE or EFE table is null
        </div>
    @endif

@endsection