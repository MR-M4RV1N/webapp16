@extends('Layouts.test_app')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center">
        <h3>IFE ANALĪZE</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>


    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" IFE analīze</strong>
                    <a href="/my_page/page_ife_manage/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                </td>
            </tr>
        </table>

        <br>

        <table class="table-bordered" width="850px">
            <tr height="30px" style="background-color: lightgrey;">
                <td align="center" colspan="4">
                    STIPRAS PUSĒS
                </td>
            </tr>
            <tr align="center">
                <td>Faktors</td>
                <td>Svars</td>
                <td>Reitings</td>
                <td>Kopējais svārs</td>
            </tr>
            @if(isset($item1[0]))
                <?php $i = 0; ?>
                @foreach ($item1 as $item1)
                    <tr>
                        <td style="vertical-align: top; padding-left:10px;">
                            {{ $item1->item }}
                        </td>
                        <td align="center">
                            {{ $item1->weight }}
                        </td>
                        <td align="center">
                            {{ $item1->rating }}
                        </td>
                        <td align="center">
                            {{ $score1[$i] }}
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @else
                <tr>
                    <td><div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endif
    <!-- -->
            <tr height="30px" style="background-color: lightgrey;">
                <td align="center" colspan="4">
                    VĀJĀS PUSĒS
                </td>
            </tr>
            <tr align="center">
                <td>Faktors</td>
                <td>Svars</td>
                <td>Reitings</td>
                <td>Kopējais svārs</td>
            </tr>
            @if(isset($item2[0]))
                <?php $i = 0; ?>
                @foreach ($item2 as $item2)
                    <tr>
                        <td style="vertical-align: top; padding-left:10px;">
                            {{ $item2->item }}
                        </td>
                        <td align="center">
                            {{ $item2->weight }}
                        </td>
                        <td align="center">
                            {{ $item2->rating }}
                        </td>
                        <td align="center">
                            {{ $score2[$i] }}
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @else
                <tr>
                    <td><div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div></td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            @endif
            <tr align="center" style="border-top:3px double grey;">
                <td>Kopā:</td>
                <td>{{ $total_weight }}</td>
                <td>{{ $total_rating }}</td>
                <td>{{ $total_score }}</td>
            </tr>
        </table>
    </div>

@endsection