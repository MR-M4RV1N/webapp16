@extends('Layouts.test_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>PEST ANALĪZE</h3>
    </div>

    <div style="margin: 50px 110px 50px 110px;">
        @if(isset($table_models_text))
            <p style="text-indent: 30px;" align="justify">
                {{ $table_models_text }}
                <!--
                <a href="/my_page/page_pest_manage/2/" class="btn btn-xs" style="text-indent: 0px;"> read full theory</a>
                |
                <a href="/my_page/page_pest_manage/2/" class="btn btn-xs" style="text-indent: 0px;"> show example</a>
                -->
            </p>
        @endif
    </div>


    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" PEST analīze</strong>
                </td>
            </tr>
        </table>

        <br>

    <table class="table-bordered" width="850px">
        <tr>
            <td width="50%" align="center">
                POLITISKĀ UN TIESISKĀ VIDE
                <a href="/my_page/page_pest_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td width="50%" align="center">
                EKONOMISKĀ VIDE
                <a href="/my_page/page_pest_manage/2/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <div style="margin: 10px 10px 10px 0px;">
                    @if(isset($item1[0]))
                        @foreach ($item1 as $item1)
                            <ul style="margin:0px;">
                                <li style="font-size: x-small;">{{ $item1->item }}</li>
                            </ul>
                        @endforeach
                    @else
                        <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                    @endif
                </div>
            </td>
            <td style="vertical-align: top;">
                <div style="margin: 10px 10px 10px 0px;">
                    @if(isset($item2[0]))
                        @foreach ($item2 as $item2)
                            <ul style="margin:0px;">
                                <li style="font-size: x-small;">{{ $item2->item }}</li>
                            </ul>
                        @endforeach
                    @else
                        <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                    @endif
                </div>
            </td>
        </tr>

        <tr>
            <td width="50%" align="center">
                SOCIĀLĀ UN DEMOGRĀFISKĀ VIDE
                <a href="/my_page/page_pest_manage/3/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td width="50%" align="center">
                TEHNOLOĢISKĀ VIDE
                <a href="/my_page/page_pest_manage/4/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <div style="margin: 10px 10px 10px 0px;">
                    @if(isset($item3[0]))
                        @foreach ($item3 as $item3)
                            <ul style="margin:0px;">
                                <li style="font-size: x-small;">{{ $item3->item }}</li>
                            </ul>
                        @endforeach
                    @else
                        <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                    @endif
                </div>
            </td>
            <td style="vertical-align: top;">
                <div style="margin: 10px 10px 10px 0px;">
                    @if(isset($item4[0]))
                        @foreach ($item4 as $item4)
                            <ul style="margin:0px;">
                                <li style="font-size: x-small;">{{ $item4->item }}</li>
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

    <div style="margin-top:30px;" align="right">
        <a href="/my_page/downloadPest" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Download</a>
    </div>

@endsection