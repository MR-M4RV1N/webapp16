@extends('Layouts.home_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Добро пожаловать!</h3>
    </div>

    <br>

    <div style="text-indent: 20px;" align="justify">
        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
        Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
    </div>

    <br><br>

    <table class="table-bordered" width="700px" align="center">
        <tr height="30px">
            <td width="250px" style="padding-left: 10px;">
                <strong>Jūsu logins:</strong>
            </td>
            <td width="300px" align="center">
                {{ Auth::user()->name }}
            </td>
            <td align="center">
                <a href="/page_profile">Profils</a>
            </td>
        </tr>

        <tr height="30px">
            <td width="250px" style="padding-left: 10px;">
                <strong>Jūsu statuss:</strong>
            </td>
            <td width="300px" align="center">
                @if(!empty(Auth::user()->type))
                    {{ Auth::user()->type }}
                @else
                    Free trial profile
                @endif
            </td>
            <td align="center">
                <a href="/page_profile">Profils</a>
            </td>
        </tr>

        <tr height="30px">
            <td width="250px" style="padding-left: 10px;">
                <strong>Izvēlēta valoda:</strong>
            </td>
            <td width="300px" align="center">
                {{ $language }}
            </td>
            <td align="center">
                <a href="/page_language">Izvēlēties citu</a>
            </td>
        </tr>

        <tr height="30px">
            <td style="padding-left: 10px;">
                <strong>Dokumentu skaits datubāzē:</strong>
            </td>
            <td align="center">
                {{ $user_firm_count }}
            </td>
            <td align="center">
                <a href="/page_all_firms">Atvert sarakstu</a>
            </td>
        </tr>

        @if($selected_firm_name !== null)
            <tr height="30px">
                <td style="padding-left: 10px;">
                    <strong>Aktīvs dokuments</strong>
                </td>
                <td align="center">
                    {{ $selected_firm_name }}
                </td>
                <td align="center">
                    <a href="/select_selected_firm">Izvēlēties citu</a>
                </td>
            </tr>

            <tr height="30px">
                <td style="padding-left: 10px;">
                    <strong>Aktīva dokumenta progress:</strong>
                </td>
                <td align="center">
                    {{ $check_canvas_total }}/5
                </td>
                <td align="center">
                    <a href="/full_progress_map">Atvert karti</a>
                </td>
            </tr>
        @endif
    </table>

    <br>

    @if($selected_firm_name !== null)
        <div align="center">
            <button type="button" class="btn btn-default" onclick="location.href='/page_firms'">Atvert {{ $selected_firm_name }}</button>
        </div>

        <hr>
    @endif

    <div align="center">
        <button type="button" class="btn btn-default" onclick="location.href='/firms/create'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Izveidot jaunu</button>
    </div>

@endsection

