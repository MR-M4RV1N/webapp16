@extends('Layouts.stratagems_app')


@section('content')

    <div align="center">
        <h3>Стратегии для победы в эпоху конкуренции</h3>
    </div>

    <br><br>

    <table style="border:1px solid lightgrey" width="100%" align="center">
        <tr height="50px">
            <td colspan="2" style="border-bottom:1px solid lightgrey">
                <div style="margin-left:20px;">
                    @if(isset($table_title))
                        <i>{{ $table_title }}</i>
                    @else
                        <i>Список стратагем:</i>
                    @endif
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2" height="10px">

            </td>
        </tr>

        <?php $i = 1; ?>
        @foreach($stratagems as $stratagems)
            <tr height="30px">
                <td width="100px" align="right">
                    Стратагема {{ $i }}:
                </td>
                <td>
                    <div style="margin-left:10px;">
                        <a href="/page_stratagems_show/{{ $stratagems->id }}">{{ $stratagems->title }}</a>
                    </div>
                </td>
            </tr>
            <?php $i++; ?>
        @endforeach

        <tr>
            <td colspan="2" height="10px">

            </td>
        </tr>

    </table>


@endsection

