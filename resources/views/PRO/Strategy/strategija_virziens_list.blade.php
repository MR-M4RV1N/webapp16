@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>VIRZIENS</h3>
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
                    <strong>Uzņēmuma "X" attīstības stratēģijas virziens</strong>
                </td>
            </tr>
        </table>
        <br><br>

        {!! Form::open(array('route' => ['strategija_virziens_update'],'method'=>'POST')) !!}
        <table width="850px" class="table-bordered">
            <tr height="50px" align="center">
                <td>
                    <strong>Intensīva (attīstības) stratēģija</strong>
                </td>
                <td>
                    <strong>Integrēta stratēģija</strong>
                </td>
                <td>
                    <strong>Diversificēta stratēģija</strong>
                </td>
                <td>
                    <strong>Samazināšanas stratēģija</strong>
                </td>
            </tr>
            <tr height="50px" align="center" style="border-top:3px double black;">
                <td>
                    Iekļūšana tirgū<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                            @if($selected_item == 'option1') checked @endif
                    >
                </td>
                <td>
                    Vertikālā integrācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"
                           @if($selected_item == 'option2') checked @endif
                    >
                </td>
                <td>
                    Koncentriskā diversifikācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3"
                           @if($selected_item == 'option3') checked @endif
                    >
                </td>
                <td>
                    Konsolidācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios4" value="option4"
                           @if($selected_item == 'option4') checked @endif
                    >
                </td>
            </tr>
            <tr height="50px" align="center">
                <td>
                    Tirgus daļas palielināšana<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5"
                           @if($selected_item == 'option5') checked @endif
                    >
                </td>
                <td>
                    Horizontālā integrācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="option6"
                           @if($selected_item == 'option6') checked @endif
                    >
                </td>
                <td>
                    Horizontālā diversifikācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios7" value="option7"
                           @if($selected_item == 'option7') checked @endif
                    >
                </td>
                <td>
                    Saīsināšana<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios8" value="option8"
                           @if($selected_item == 'option8') checked @endif
                    >
                </td>
            </tr>
            <tr height="50px" align="center">
                <td>
                    Jaunas produkcijas izstrāde<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios9" value="option9"
                           @if($selected_item == 'option9') checked @endif
                    >
                </td>
                <td>

                </td>
                <td>
                    Daudznozaru diversifikācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios10" value="option10"
                           @if($selected_item == 'option10') checked @endif
                    >
                </td>
                <td>
                    Likvidācija<br>
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios11" value="option11"
                           @if($selected_item == 'option11') checked @endif
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

