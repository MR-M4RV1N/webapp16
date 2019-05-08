@extends('Layouts.test_app')


@section('content')


    <div align="center">
        <h3>RUMELTA TESTS</h3>
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


        {!! Form::open(array('route' => ['page-rumelt-update'],'method'=>'POST')) !!}
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
                    1. Secība
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
                    2. Harmoniskums
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
                    3. Priekšrocība
                </td>
            </tr>


            <tr>
                <td width="50px">
                    <div class="form-check" style="margin-left:20px;">
                        <input type="checkbox" class="form-check-input" name="select_4" value="1"
                               @if($select[0]['select_4'] == 1) checked @endif
                        >
                    </div>
                </td>
                <td>
                    4. Realizējamība
                </td>
            </tr>
        </table>


        <div width="850px" style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-xs">Submit</button>
        </div>
        {!! Form::close() !!}


    </div>

@endsection

