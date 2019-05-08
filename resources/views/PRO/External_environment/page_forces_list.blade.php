@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Five Forces</h3>
    </div>


    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>


    <table style="border:1px solid black;" width="250px" align="center">
        <tr height="100px">
            <td valign="top">
                <div style="text-align: center; margin-top:10px;">
                    <strong>Piegādātāji</strong>
                    <a href="/my_page/page_forces_crud_edit/1/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <div style="text-align:center; margin-bottom: 10px; margin-top:20px;">
                    @if(isset($force[0]))
                        {{ $force[0]->ietekme }}
                    @else
                        ---
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
    </div>

    <table align="center">
        <tr height="100px">
            <td width="250px" style="border:1px solid black" valign="top">
                <div style="text-align: center; margin-top:10px;"">
                <strong>Potenciālie tirgus dalibnieki</strong>
                <a href="/my_page/page_forces_crud_edit/2/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <div style="text-align:center; margin-bottom: 10px; margin-top:20px;">
                    @if(isset($force[1]))
                        {{ $force[1]->ietekme }}
                    @else
                        ---
                    @endif
                </div>
            </td>

            <td width="50px" align="center">
                <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
            </td>

            <td width="250px" style="border:1px solid black" valign="top">
                <div style="text-align: center; margin-top:10px;"">
                <strong>Konkurenti</strong>
                <a href="/my_page/page_forces_crud_edit/3/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <div style="text-align:center; margin-bottom: 10px; margin-top:20px;">
                    @if(isset($force[2]))
                        {{ $force[2]->ietekme }}
                    @else
                        ---
                    @endif
                </div>
            </td>

            <td width="50px" align="center">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            </td>

            <td width="250px" style="border:1px solid black" valign="top">
                <div style="text-align: center; margin-top:10px;"">
                <strong>Aizvietotāji</strong>
                <a href="/my_page/page_forces_crud_edit/4/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <div style="text-align:center; margin-bottom: 10px; margin-top:20px;">
                    @if(isset($force[3]))
                        {{ $force[3]->ietekme }}
                    @else
                        ---
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <div style="text-align:center; margin:15px 0px 15px 0px;">
        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
    </div>

    <table style="border:1px solid black" width="250px" align="center">
        <tr height="100px">
            <td valign="top">
                <div style="text-align: center; margin-top:10px;">
                    <strong>Patērētāji</strong>
                    <a href="/my_page/page_forces_crud_edit/5/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <div style="text-align:center; margin-bottom: 10px; margin-top:20px;">
                    @if(isset($force[4]))
                        {{ $force[4]->ietekme }}
                    @else
                        ---
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <div style="margin-top:30px;" align="right">
        <a href="/my_page/downloadForces" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Download</a>
    </div>

@endsection

