@extends('layouts.free_app')

@section('content')

    <table width="1200px" align="center" style="margin-top:100px;">
        <tr>
            <td width="50%" align="center">
                <div style="margin-bottom:50px;">
                    <h3>WebApplication16.loc</h3>
                    <strong>Business analitic tools</strong>
                </div>
                <img src="\images\Apple-Mac-App.png" width="350px">
            </td>
            <td width="50%" align="center" valign="middle">
                @guest
                    @include('partials.free.login1')
                @else
                    @include('partials.free.you_are_logged_in')
                @endguest
            </td>
        </tr>
    </table>



@endsection
