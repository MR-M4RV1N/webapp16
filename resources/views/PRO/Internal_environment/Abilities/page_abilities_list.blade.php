@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>Abilities</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>

    <table align="center">
        <tr>
            <td>
                <strong>Uzņēmuma {{ $selected_firm_name }} galvenās kompetences</strong>
            </td>
            <td>
                <a href="/my_page/page_abilities_manage/1" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>EDIT</a>
            </td>
        </tr>
    </table>

    <br><br>

    <table class="table-bordered" width="95%" align="center">
        <tr align="center" height="50px">
            <td>Galvenās kompetences</td>
            <td>Ilgtspējība</td>
            <td>Caurredzamība</td>
            <td>Mobilitāte</td>
            <td>Neatkārtojama</td>
        </tr>

        @if(isset($item[0]))
            @foreach($item as $item)
                <tr height="50px" style="font-size: x-small">
                    <td>
                        <div style="margin-left:5px;">{{ $item->key_ability }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->durability }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->transparence }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->mobility }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->repeatability }}</div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr height="50px" style="font-size: x-small">
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
            </tr>
        @endif
    </table>


@endsection

