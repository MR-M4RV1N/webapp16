@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Barriers</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>

    @if(@$selected_value == null)
        <div align="center">
            <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Izvēle nav izdarīta!
        </div>

        <br><br>
    @endif

    {!! Form::open(array('route' => ['page-barriers-update'],'method'=>'POST')) !!}
    <!-- Внешняя таблица 2-->
    <table class="table-bordered" align="center">
        <tr>
            <td width="20px">

            </td>
            <td width="460px" align="center">
                Izejas barjeras
            </td>
        </tr>
        <tr>
            <td>
                <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                    <tr>
                        <td align="center">Ieejas barjeras</td>
                    </tr>
                </table>
            </td>
            <td>
                <!-- Внешняя таблица 1-->
                <table class="table-bordered">
                    <tr>
                        <td width="20px">

                        </td>
                        <td width="440px">
                            <table width="100%">
                                <tr>
                                    <td align="center" width="50%">Zemas</td>
                                    <td align="center" width="50%">Augstas</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                                <tr>
                                    <td align="center">Augstas</td>
                                    <td align="center">Zemas</td>
                                </tr>
                            </table>
                        </td>
                        <td>


                            <!-- Начало главной таблицы-->
                            <table width="440px">
                                <tr height="105px">
                                    <td style="border:1px solid grey" align="center" width="220px">
                                        Zema, stabila nozares peļņa<br>
                                        <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option1"
                                               @if($selected_value == 'option1') checked @endif
                                        >
                                    </td>
                                    <td style="border:1px solid grey" align="center" width="220px">
                                        Zema, riskanta nozares peļņa<br>
                                        <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option2"
                                               @if($selected_value == 'option2') checked @endif
                                        >
                                    </td>
                                </tr>
                                <tr height="105px">
                                    <td style="border:1px solid grey" align="center" width="220px">
                                        Augsta, stabila nozares peļņa<br>
                                        <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option3"
                                               @if($selected_value == 'option3') checked @endif
                                        >
                                    </td>
                                    <td style="border:1px solid grey" align="center" width="220px">
                                        Augsta, riskanta nozares peļņa<br>
                                        <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option4"
                                               @if($selected_value == 'option4') checked @endif
                                        >
                                    </td>
                                </tr>
                            </table>
                            <!-- Конец главной таблицы-->


                        </td>
                    </tr>
                </table>
                <!-- Конец внешней таблице 2-->
            </td>
        </tr>
    </table>
    <!-- Конец внешней таблице 1-->

    <br>

    <div align="center">
        <button type="submit" class="btn btn-default btn-xs">Izvēlēties</button>
    </div>
    {!! Form::close() !!}



@endsection

