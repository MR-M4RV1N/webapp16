@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>SVID - ĀRĒJAS VIDES ANALĪZE</h3>
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
                    <strong>Uzņēmuma "X" SVID analīze</strong>
                </td>
            </tr>
        </table>

        <br>

        <table class="table-bordered" width="800px">
            <tr>
                <td colspan="2" align="center">
                    ORGANIZĀCIJAS ĀRĒJĀ VIDE
                </td>
            </tr>
            <tr>
                <td align="center">
                    STIPRĀS PUSES
                    <a href="/my_page/svid_iekseja_manage/S" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
                <td align="center">
                    VAJĀS PUSES
                    <a href="/my_page/svid_iekseja_manage/V" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </td>
            </tr>
            <tr>
                <td width="50%" valign="top">
                    <div style="margin: 10px;">
                        @if(isset($svid_1[0]))
                            @foreach ($svid_1 as $s1)
                                <ul style="margin:0px;">
                                    <li style="font-size: x-small;">{{ $s1->item }}</li>
                                </ul>
                            @endforeach
                        @else
                            <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                        @endif
                    </div>
                </td>
                <td width="50%" valign="top">
                    <div style="margin: 10px;">
                        @if(isset($svid_2[0]))
                            @foreach ($svid_2 as $s2)
                                <ul style="margin:0px;">
                                    <li style="font-size: x-small;">{{ $s2->item }}</li>
                                </ul>
                            @endforeach
                        @else
                            <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                        @endif
                    </div>
                </td>
            </tr>
        </table>


    </div>



@endsection

