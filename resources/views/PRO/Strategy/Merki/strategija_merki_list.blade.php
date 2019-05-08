@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>{{ $page_title }}</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" merki</strong>
                </td>
                <td>
                    <a href="/my_page/strategija_merki_manage/1" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>EDIT</a>
                </td>
            </tr>
        </table>
        <br>

        <table width="800px" style="font-size: small;" class="table-bordered">
            <tr height="50px" align="center" style="border-bottom:3px double black">
                <td width="150px">
                    <strong>Mērķis</strong>
                </td>
                <td width="200px">
                    <strong>Paredzētās darbības mērķa izpildei</strong>
                </td>
                <td width="150px">
                    <strong>Izpildītājs</strong>
                </td>
                <td width="150px">
                    <strong>Izpildes laiks</strong>
                </td>
                <td width="150px">
                    <strong>Plānotas izmaksas</strong>
                </td>
            </tr>

            @if(isset($strategija_merki_result[0]))
                @foreach($strategija_merki_result as $strategija_merki_result)
                    <tr height="50px" style="font-size: x-small">
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->merkis }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;"><?php echo $strategija_merki_result->darbibas ?></div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->izpilditajs }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->laiks }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->izmaksas }}</div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr height="50px">
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


    </div>



@endsection

