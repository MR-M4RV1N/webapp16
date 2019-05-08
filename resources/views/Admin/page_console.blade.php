@extends('Layouts.admin_console_app')


@section('content')

    {!! Form::open(array('route' => ['page-console-post'],'method'=>'POST')) !!}
        <table class="table-bordered" width="500px" align="center">
            <tr>
                <td align="center" style="background-color: grey" height="30px">
                    <strong style="color: white">Konsole</strong>
                </td>
            </tr>
            <tr height="300px">
                <td style="vertical-align: top;">
                    WebApplication16.loc 21.02.2018<br><br>


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
                                {!! Form::text('command', null, array('placeholder' => 'Enter your command','class' => 'form-control')) !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="400px">
                                <button type="submit" class="btn btn-default btn-sm" style="margin-top:10px;">Run</button>
                            </td>
                        </tr>
                    </table>

                    @if ($message = Session::get('answer'))

                        <table style="margin:20px 0px 0px 20px" width="450px">
                            <tr>
                                <td>
                                    <div style="margin:30px 0px 20px 10px; color: red;">{{ $message }}</div>
                                </td>
                            </tr>
                        </table>
                    @endif
                </td>
            </tr>
        </table>
    {!! Form::close() !!}



@endsection

