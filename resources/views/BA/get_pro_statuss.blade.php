@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <h4 align="center">GET PRO STATUSS</h4>


    <table align="center">
        <tr>

            <td>
                <table height="200px" style="margin-top: 30px; border:1px solid lightgrey;" align="center">
                    <tr height="30">
                        <td width="50"></td>
                        <td width="100" style="background-color: #0066FF"><div style="color:white;" align="center">Vienreizēja 1</div></td>
                        <td width="50"></td>
                    </tr>
                    <tr>
                        <td colspan="3" width="200px" align="center">
                            <p><span style="color: #0066FF; font-size: 3ch;">$15</span> (mēnesis)</p>
                            <button type="button" class="btn btn-default" onclick="location.href='/credit_card_form'">Nopirkt</button>
                        </td>
                    </tr>
                </table>
            </td>

            <td width="10"></td>

            <td>
                <table height="200px" style="margin-top: 30px; border:1px solid lightgrey;" align="center">
                    <tr height="30">
                        <td width="50"></td>
                        <td width="100" style="background-color: #0066FF"><div style="color:white;" align="center">Vienreizēja 2</div></td>
                        <td width="50"></td>
                    </tr>
                    <tr>
                        <td colspan="3" width="200px" align="center">
                            <p><span style="color: #0066FF; font-size: 3ch;">$30</span> (3 mēneši)</p>
                            <button type="button" class="btn btn-default" onclick="location.href='/credit_card_form'">Nopirkt</button>
                        </td>
                    </tr>
                </table>
            </td>

            <td width="10"></td>

            <td>
                <table height="200px" style="margin-top: 30px; border:1px solid lightgrey;" align="center">
                    <tr height="30">
                        <td width="50"></td>
                        <td width="100" style="background-color: #0066FF"><div style="color:white;" align="center">Vienreizēja 3</div></td>
                        <td width="50"></td>
                    </tr>
                    <tr>
                        <td colspan="3" width="200px" align="center">
                            <p><span style="color: #0066FF; font-size: 3ch;">$45</span> (gads)</p>
                            <button type="button" class="btn btn-default" onclick="location.href='/credit_card_form'">Nopirkt</button>
                        </td>
                    </tr>
                </table>
            </td>

            <td width="10"></td>

            <td>
                <table height="200px" style="margin-top: 30px; border:3px solid #0066FF;" align="center">
                    <tr height="30">
                        <td width="50"></td>
                        <td width="100" style="background-color: #0066FF"><div style="color:white;" align="center">Professional</div></td>
                        <td width="50"></td>
                    </tr>
                    <tr>
                        <td colspan="3" width="200px" align="center">
                            <p><span style="color: #0066FF; font-size: 3ch;">$120</span> (bezlimita)</p>
                            <button type="button" class="btn" style="background-color: #0066FF; color:white;" onclick="location.href='/credit_card_form'">Nopirkt</button>
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>


@endsection

