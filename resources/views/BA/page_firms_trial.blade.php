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

        <br><br>

        <div>
            <strong>Progress:</strong>
        </div>

        <div align="center"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>   Jūsu profila statuss ir "free". Lai izmantotu pilno versiju noperciet PRO statusu.</div>
        <br>

        <table class="table-bordered" width="100%">
            <tr height="30px">
                <td>
                    <div style="margin-left:10px;">Uzņēmuma darbības analīze</div>
                </td>
                <td align="center">
                    {{ $progress_description }}/2
                </td>
            </tr>

            <tr height="30px" style="color: #aaaaaa;">
                <td>
                    <div style="margin-left:10px;">Ārējās vides analīze</div>
                </td>
                <td align="center">
                    {{ $progress_external_environment }}/7
                </td>
            </tr>

            <tr height="30px" style="color: #aaaaaa;">
                <td>
                    <div style="margin-left:10px;">Iekšējas vides analīze</div>
                </td>
                <td align="center">
                    {{ $progress_internal_environment }}/4
                </td>
            </tr>

            <tr height="30px" style="color: #aaaaaa;">
                <td>
                    <div style="margin-left:10px;">SVID analīze</div>
                </td>
                <td align="center">
                    {{ $progress_swot }}/3
                </td>
            </tr>

            <tr height="30px" style="color: #aaaaaa;">
                <td>
                    <div style="margin-left:10px;">Attīstības stratēģijas izstrāde</div>
                </td>
                <td align="center">
                    {{ $progress_strategy }}/4
                </td>
            </tr>

            <tr height="30px" style="color: #aaaaaa;">
                <td>
                    <div style="margin-left:10px;">Stratēģijas realizācijas iespējas</div>
                </td>
                <td align="center">
                    {{ $progress_tests }}/3
                </td>
            </tr>

            <tr height="30px" style="border-top:3px double lightgrey;">
                <td>
                    <div style="margin-left:10px;">TOTAL:</div>
                </td>
                <td align="center">
                    {{ $progress_progress }}/23
                </td>
            </tr>
        </table>

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

