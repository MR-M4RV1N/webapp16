@extends('Layouts.test_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>{{ $page_title }}</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>


    <table align="center" class="table-bordered" width="500px" height="50px">
        <tr>
            <td align="center">
                Veiksmei nepieciešamie nosacījumi
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
    </div>

    <table align="center" class="table-bordered" width="90%" height="300px">
        <tr height="50px">
            <td width="40%" align="center">
                <i>Ko vēlas patērētāji?</i>
            </td>
            <td width="60%" align="center">
                <i>Kā uzņēmums izdzīvo konkurences nosacījumos?</i>
            </td>
        </tr>

        <tr height="50px">
            <td align="center">
                <strong>Pieprasījuma analīze</strong>
            </td>
            <td align="center">
                <strong>Konkurences analīze</strong>
            </td>
        </tr>

        <tr>
            <td valign="top">
                <div style="margin:10px;">
                    <i>Kas ir uzņēmuma patērētāji?</i>
                    <a href="/my_page/page_success_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item1 as $item1)
                            <li>{{ $item1->item }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div style="margin:10px;">
                    <i>Ko grib uzņēmuma patērētāji?</i>
                    <a href="/my_page/page_success_manage/2/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item2 as $item2)
                            <li>{{ $item2->item }}</li>
                        @endforeach
                    </ul>
                </div>
            </td>
            <td valign="top">
                <div style="margin:10px;">
                    <i>Kas ir konkurences dzinējspēks?</i>
                    <a href="/my_page/page_success_manage/3/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item3 as $item3)
                            <li>{{ $item3->item }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div style="margin:10px;">
                    <i>Kādas ir konkurences pamatīpašības?</i>
                    <a href="/my_page/page_success_manage/4/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item4 as $item4)
                            <li>{{ $item4->item }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div style="margin:10px;">
                    <i>Cik intensīva ir konkurence?</i>
                    <a href="/my_page/page_success_manage/5/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item5 as $item5)
                            <li>{{ $item5->item }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
                <div style="margin:10px;">
                    <i>Kā mēs varam panākt konkurētspējīgo priekšrocību?</i>
                    <a href="/my_page/page_success_manage/6/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    <ul style="font-size: xx-small; padding-left:20px;">
                        @foreach($item6 as $item6)
                            <li>{{ $item6->item }}</li>
                        @endforeach
                    </ul>
                </div>
                <br>
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
    </div>

    <table align="center" class="table-bordered" width="500px" height="50px">
        <tr>
            <td>
                <div>
                    <div align="center" style="margin-top:5px;">
                        Veiksmes faktori
                        <a href="/my_page/page_success_manage/7/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
                    </div>
                    <ul style="font-size: xx-small; padding-left:30px;" align="left">
                        @foreach($item7 as $item7)
                            <li>{{ $item7->item }}</li>
                        @endforeach
                    </ul>
                </div>
            </td>
        </tr>
    </table>


@endsection