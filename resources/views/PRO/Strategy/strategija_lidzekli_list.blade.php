@extends('Layouts.test_app')


@section('content')

    <div align="center">
        <h3>LĪDZEKLI</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" līdzekli</strong>
                </td>
            </tr>
        </table>
        <br><br>

        {!! Form::open(array('route' => ['strategija-lidzekli-update'],'method'=>'POST')) !!}
        <table width="600px" style="border:1px solid black; font-size: small;" >
            <tr height="50px">
                <td colspan="3" align="center"><strong>Izvēlēto stratēģiju realizēšanas līdzekļi</strong></td>
            </tr>
            <tr height="70px" style="border-top:3px double black">
                <td style="border:1px solid black;" align="center" width="200px">
                    Iekšējā attīstība<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                           @if($selected_item == 'option1') checked @endif
                    >
                </td>
                <td style="border:1px solid black;" align="center" width="200px">
                    Saplūšana<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"
                           @if($selected_item == 'option2') checked @endif
                    >
                </td>
                <td style="border:1px solid black;" align="center" width="200px">
                    Kopēja attīstība un alianse<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"
                           @if($selected_item == 'option3') checked @endif
                    >
                </td>
            </tr>
        </table>

        <div width="850px" style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-xs">Submit</button>
        </div>
        {!! Form::close() !!}


    </div>



@endsection

