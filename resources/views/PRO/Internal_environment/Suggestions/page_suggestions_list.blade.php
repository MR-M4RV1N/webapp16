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
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>

    <table class="table-bordered" width="95%" height="200px" align="center">
        <tr height="40px">
            <td align="center">
                Stipro pušu izmantošanas priekšlikumi
                <a href="/my_page/page_suggestions_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
        </tr>
        <tr>
            <td valign="top">
                @if(isset($item1))
                    <ul style="font-size: small; padding-left:30px; padding-top:10px;">
                        @foreach($item1 as $item1)
                            <li>{{ $item1->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>

    <br><br>

    <table class="table-bordered" width="95%" height="200px" align="center">
        <tr height="40px">
            <td align="center">
                Trūkumu novēršanas priekšlikumi
                <a href="/my_page/page_suggestions_manage/2/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> edit</a>
            </td>
        </tr>
        <tr>
            <td valign="top">
                @if(isset($item2))
                    <ul style="font-size: small; padding-left:30px; padding-top:10px;">
                        @foreach($item2 as $item2)
                            <li>{{ $item2->item }}</li>
                        @endforeach
                    </ul>
                @endif
            </td>
        </tr>
    </table>



@endsection

