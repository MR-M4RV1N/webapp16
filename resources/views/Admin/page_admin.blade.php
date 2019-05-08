@extends('Layouts.my_console_admin_app')


@section('content')

    <div width="500px" style="font-size: x-small">
        <strong>Main command:</strong> "next" and "show options"<br>
        <strong>Link:</strong> /admin<br>
        <strong>web.php:</strong> admin-console<br>
        <strong>controller:</strong> AdminController -> admin_console() / admin_console_post()<br>
        <strong>blade:</strong> - Admin.page_admin
    </div>

    <br><br>

    {!! Form::open(array('route' => ['admin-console-post'],'method'=>'POST')) !!}
    <table class="table-bordered" width="500px" align="center">
        <tr>
            <td align="center" style="background-color: grey" height="30px">
                <strong style="color: white">Konsole</strong>
            </td>
        </tr>
        <tr height="300px">
            <td style="vertical-align: top;">
                WebApplication16.loc 21.02.2018<br><br>

                @if (isset($answer))
                    <div style="background-color: whitesmoke; margin-bottom:30px;">
                        <div align="right">
                            <a href="/admin" class="btn btn-default btn-xs">clear</a>
                        </div>

                        <table style="margin:0px 0px 0px 20px" width="450px">
                            <tr>
                                <td>
                                    Answer:
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div style="margin:0px 0px 30px 10px; color: red;">{{ $answer }}</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif

                @if (isset($answer_array))
                    <div style="background-color: whitesmoke; margin-bottom:30px;">
                        <div align="right">
                            <a href="/admin" class="btn btn-default btn-xs">clear</a>
                        </div>

                        <table width="450px">
                            <tr>
                                <td>
                                    <div style="margin:0px 0px 0px 20px">Answer:</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @foreach($answer_array as $a)
                                        <ul style="margin:0px; color: red;">
                                            <li>{{ $a }}</li>
                                        </ul>
                                    @endforeach
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                @endif

                <table style="margin-left:20px">
                    <tr>
                        <td colspan="2">
                            file.ini@inbox.lv f:\openserver
                        </td>
                    </tr>
                    <tr>
                        <td width="20px">
                            >_
                        </td>
                        <td width="380px">
                            <input type="text" name="command" placeholder="Enter your command" class="form-control" style="border-radius: 0rem;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="400px">
                            <button type="submit" class="btn btn-default btn-sm" style="margin-top:10px;">Run</button>
                        </td>
                    </tr>
                </table>

                <br>
            </td>
        </tr>
    </table>
    {!! Form::close() !!}


@endsection

