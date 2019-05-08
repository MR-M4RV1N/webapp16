@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if($selected_firm_name !== null)
        <!-- Предприятие, которое в данный момент редактируется -->
        <table width="100%">
            <tr>
                <td colspan="2"><strong>Rediģēšanai izvelēts uzņēmums:</strong></td>
            </tr>
            <tr>
                <td width="70px">
                    <div style="margin-top:10px; margin-left: 10px;">
                        <img src="/images/selected_firm.png" style="width: 30px">
                    </div>
                </td>

                <td>
                    <div style="margin-top:10px;">
                        {{ $selected_firm_name }}
                    </div>
                </td>

                <!-- Place between dropdown and button -->
                <td width="10px">

                </td>

                <!-- Button -->
                <td width="10px">
                    <button type="submit" class="btn btn-default" style="margin-top:10px;" onclick="location.href='/select_selected_firm'">Izvēlēties citu</button>
                </td>
                <!-- Place between dropdown and button -->
                <td width="10px">

                </td>
                <!-- Button -->
                <td width="10px">
                    <button type="submit" class="btn btn-default" style="margin-top:10px;" onclick="location.href='/page_all_firms'">Uzņēmumu redaktors</button>
                </td>
            </tr>
        </table>

        <hr style="border:1px dashed lightgrey">

        <div>
            <strong>Stratēģiskā plāna veids (apskates veids):</strong>
        </div>

        <br>

        <table width="100%">
            <tr align="center">
                <td><input type="radio" name="1" onclick="location.href='view_type_update/1'" @if($selected_view_type == 1) checked @endif>   Ātrs</td>
                <td><input type="radio" name="1" onclick="location.href='view_type_update/2'" @if($selected_view_type == 2) checked @endif>   Klasisks</td>
                <td><input type="radio" name="1" onclick="location.href='view_type_update/3'" @if($selected_view_type == 3) checked @endif>   Plašs</td>
            </tr>
        </table>

        <hr style="border:1px dashed lightgrey">

        <div>
            <strong>Progress:</strong>
        </div>

        <br>

        @if($selected_view_type == 1)
            @include('partials.blocks_test.progress_fast')
        @endif

        @if($selected_view_type == 2)
            @include('partials.blocks_test.progress_classic')
        @endif

        @if($selected_view_type == 3)
            @include('partials.blocks_test.progress_full')
        @endif

        <br>

        <div align="center">
            <button type="submit" class="btn btn-default" onclick="location.href='/full_progress_map'"><span class="glyphicon glyphicon-play" aria-hidden="true"></span>   Atvert</button>
        </div>
    @else
        <div align="center" style="margin-top:100px;"><img src="/images/warning.png" style="width:70px;"></div>
        <div align="center" style="margin-top:10px;">Datu bāzē nav neviena dokumenta</div>
        <div align="center" style="margin-top:10px;"><button class="btn btn-default btn-xs" href="/firms/create" onclick="location.href='/firms/create'">Izveidot</button></div>
    @endif

@endsection

