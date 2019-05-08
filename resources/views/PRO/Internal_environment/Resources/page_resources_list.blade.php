@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Resources</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>

    <table class="table-bordered" width="95%" height="400px" align="center">
        <tr>
            <td rowspan="2" width="20%"><span style="margin-left:10px;">Materiālie</span></td>
            <td width="20%" style="border-right:1px solid white;">
                <span style="margin-left:10px;">Finanšu resursi</span>
            </td>
            <td width="10%" align="center">
                <a href="/my_page/page_resources_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td width="50%" valign="top">
                @if(isset($item1))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item1 as $item1)
                            <li>{{ $item1->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Fiziskie resursi</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/2/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item2))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item2 as $item2)
                            <li>{{ $item2->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td rowspan="2"><span style="margin-left:10px;">Nemateriālie resursi</span></td>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Tehnoloģiskie resursi</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/3/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item3))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item3 as $item3)
                            <li>{{ $item3->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Reputācija</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/4/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item4))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item4 as $item4)
                            <li>{{ $item4->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td rowspan="3"><span style="margin-left:10px;">Cilvēciskie resursi</span></td>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Iemaņas un zināšanas</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/5/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item5))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item5 as $item5)
                            <li>{{ $item5->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Mijiedarbības spēja</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/6/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item6))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item6 as $item6)
                            <li>{{ $item6->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
        <tr>
            <td style="border-right:1px solid white;">
                <span style="margin-left:10px;">Motivācija</span>
            </td>
            <td align="center">
                <a href="/my_page/page_resources_manage/7/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
            <td valign="top">
                @if(isset($item7))
                    <ul style="font-size: x-small; padding-left:30px; padding-top:10px;">
                        @foreach($item7 as $item7)
                            <li>{{ $item7->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>


@endsection

