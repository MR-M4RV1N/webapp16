@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Contribution</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>

    <table width="95%" height="200px" align="center">
        <tr>
            <td width="30%" valign="top" style="border:1px solid black">
                <div align="center" style="margin-top: 10px;">
                    Konkurētspējīgas priekšrocības
                    <a href="/my_page/page_contribution_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                </div>
                <div style="margin-top: 10px;">
                    @if(isset($item1))
                        <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                            @foreach($item1 as $item1)
                                <li>{{ $item1->item }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </td>
            <td width="5%" align="center">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            </td>
            <td width="30%" valign="top" style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Uzņēmuma stratēģija</div>
                <div style="margin-left: 20px; margin-top: 10px; font-size: x-small;"></div>
            </td>
            <td width="5%" align="center">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            </td>
            <td width="30%" valign="top" style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Veiksmes faktori</div>
                @if(isset($success))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($success as $success)
                            <li>{{ $success->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>

    <div width="95%" style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
    </div>

    <table width="95%" height="200px" align="center">
        <tr>
            <td valign="top" style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Uzņēmuma kompetences</div>
                @if(isset($abilities))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($abilities as $abilities)
                            <li>{{ $abilities->key_ability }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>

    <div width="95%" style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
    </div>

    <table width="95%" height="200px" style="border:1px solid lightgrey" align="center">
        <tr align="center" height="40px">
            <td style="border:1px solid lightgrey" colspan="3">
                Resursi
            </td>
        </tr>
        <tr valign="top" height="200px">
            <td style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Materiālie</div>
                @if(isset($resources_1))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($resources_1 as $resources_1)
                            <li>{{ $resources_1->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
            <td style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Nemateriālie</div>
                @if(isset($resources_2))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($resources_2 as $resources_2)
                            <li>{{ $resources_2->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
            <td style="border:1px solid lightgrey">
                <div align="center" style="margin-top: 10px;">Cilvēku</div>
                @if(isset($resources_3))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($resources_3 as $resources_3)
                            <li>{{ $resources_3->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>


@endsection

