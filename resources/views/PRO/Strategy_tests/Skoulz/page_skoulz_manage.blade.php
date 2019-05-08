@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>DŽONA SKOULZA TESTS</h3>
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
                    <strong>Uzņēmuma "X" stratēģijas realizācijas iespējas</strong>
                </td>
            </tr>
        </table>
        <br><br>


        {!! Form::open(array('route' => ['page-skoulz-update'],'method'=>'POST')) !!}
        <div align="left" style="margin-bottom:10px; margin-left:30px;">
            <strong>Atbilstība:</strong>
        </div>

        <table width="95%">
            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_1" value="1"
                               @if($select[0]['select_1'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    1. Stratēgijai jārisina stratēģisko problēmu, būt spējīgai tikt ar ārējiem draudiem.
                </td>
            </tr>

            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_2" value="1"
                               @if($select[0]['select_2'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    2. Stratēģijai jāuzturās uz resursiem un spējam.
                </td>
            </tr>

            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_3" value="1"
                               @if($select[0]['select_3'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    3. Stratēģijai jāatbilst uzņēmuma mērķiem rādītāju veidā.
                </td>
            </tr>
        </table>

        <br><br>

        <div align="left" style="margin-bottom:10px; margin-left:30px;">
            <strong>Realizējamība:</strong>
        </div>

        <table width="95%">
            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_4" value="1"
                               @if($select[0]['select_4'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    1. Vai uzņēmumam pietiks resursu izvēlētas stratēģijas realizācijai?
                </td>
            </tr>

            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_5" value="1"
                               @if($select[0]['select_5'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    2. Vai filiale būs spējīga sasniegt operatīvus radītājus nepieciešamā līmeņi?
                </td>
            </tr>
        </table>
        <br>
        <table width="95%">
            <tr>
                <td>
                    3. Kāda būs konkurentu reakcija un kā uzņēmums reaģēs uz konkrenru rīcību?
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::textarea('select_6', $select[0]['select_6'], array('name'=>'select_6','id'=>'select_6', 'placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
                    </div>
                </td>
            </tr>
        </table>

        <br><br>

        <div align="left" style="margin-bottom:10px; margin-left:30px;">
            <strong>Pieņemamība:</strong>
        </div>

        <table width="95%">

            <tr>
                <td>
                    1. Kāda būs uzņēmuma finansiāla efektivitāte?
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::textarea('select_7', $select[0]['select_7'], array('name'=>'select_7','id'=>'select_7', 'placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    2. Vai pastāv attiecību pasliktināšanas risks ar ZS?
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::textarea('select_8', $select[0]['select_8'], array('name'=>'select_8','id'=>'select_8', 'placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    3. Kāda būs piedavatas stratēģijas ietekme uz iekšējam sistēmam un procesiem?
                </td>
            </tr>
            <tr>
                <td>
                    <div class="form-group">
                        {!! Form::textarea('select_9', $select[0]['select_9'], array('name'=>'select_9','id'=>'select_9', 'placeholder' => 'Ievadiet tekstu', 'class' => 'form-control')) !!}
                    </div>
                </td>
            </tr>
        </table>

        <div width="850px" style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-xs">Atjaunot</button>
        </div>
        {!! Form::close() !!}


    </div>

@endsection

