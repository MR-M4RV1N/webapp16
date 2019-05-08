@extends('Layouts.app')

@section('content')
    <table width="1200px" align="center" style="margin-top:200px;">
        <tr align="center">
            <td width="45%" valign="middle">
                <h3>You are registered!</h3>
                Redirecting to ... <a href="/home">main page</a>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        function leave() {
            window.location = "/home";
        }
        setTimeout("leave()", 1000);
    </script>
@endsection

