@extends('Layouts.app')

@section('content')
    <table width="1200px" align="center" style="margin-top:10px;">
        <tr>
            <!-- Картинка -->
            <td width="55%" valign="top" align="center" style="background-image:url(/images/Apple-BG.png); background-repeat:no-repeat; background-size:500px; height:500px; background-position:center;">
                <div>
                    <div align="left" style="margin-top:50px;">
                        <h3>WebApplication16.loc</h3>
                        <strong>Business analitic tools</strong>
                    </div>
                    <img src="\images\Apple-Mac-App.png" width="350px" style="margin-top:10px;">
                </div>
            </td>

            <!-- Табличка -->
            <td width="45%" valign="middle">
                @include('partials.free.login1')
            </td>
        </tr>
    </table>
@endsection



