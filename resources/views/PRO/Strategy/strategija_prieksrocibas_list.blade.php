@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>PRIEKŠROCĪBAS</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>


    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" priekšrocības</strong>
                </td>
            </tr>
        </table>
        <br><br>


    @if($selected_item == 'Strategy is not selected!')
        {!! Form::open(array('route' => ['strategija_prieksrocibas_store'],'method'=>'POST')) !!}

        <!-- Внешняя таблица 2-->
            <table class="table-bordered">
                <tr>
                    <td width="20px">

                    </td>
                    <td width="460px" align="center">
                        Konkurētspējīga priekšrocība
                    </td>
                </tr>
                <tr>
                    <td>
                        <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                            <tr>
                                <td align="center">Konkurences mērogs</td>
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
                                            <td align="center" width="50%">Zemas izmaksas</td>
                                            <td align="center" width="50%">Unikalitāte</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                                        <tr>
                                            <td align="center">Šaurs</td>
                                            <td align="center">Plašs</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>


                                    <!-- Начало главной таблицы-->
                                    <table width="440px" style="font-size: x-small">
                                        <tr height="70px">
                                            <td style="border-left:1px solid black; border-top:1px solid black" width="150px" align="center" valign="bottom">
                                                Līderība pēc izmaksām<br>
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5">
                                            </td>
                                            <td style="border-top:1px solid black; border-right:1px solid black" width="70px"></td>
                                            <td style="border-top:1px solid black;" width="70px"></td>
                                            <td style="border-top:1px solid black; border-right:1px solid black;" width="150px" align="center" valign="bottom">
                                                Diferenciācija<br>
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios7" value="option7">
                                            </td>
                                        </tr>
                                        <tr height="45px">
                                            <td style="border-bottom:1px solid black; border-left:1px solid black" align="center" valign="top">

                                            </td>
                                            <td colspan="2" rowspan="2" style="border:1px solid black" align="center">
                                                Zemo izmaksu un diferenciācijas kombinācija<br>
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="option6">
                                            </td>
                                            <td style="border-right:1px solid black; border-bottom:1px solid black;" align="center" valign="top">

                                            </td>
                                        </tr>
                                        <tr height="45px">
                                            <td style="border-left:1px solid black;" align="center" valign="bottom">

                                            </td>
                                            <td style="border-right:1px solid black;" align="center" valign="bottom">

                                            </td>
                                        </tr>
                                        <tr height="70px">
                                            <td style="border-left:1px solid black; border-bottom:1px solid black;" align="center" valign="top">
                                                Fokusēšana<br>
                                                pie zemām izmaksām<br>
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios10" value="option10">
                                            </td>
                                            <td style="border-bottom:1px solid black; border-right:1px solid black;"></td>
                                            <td style="border-bottom:1px solid black;"></td>
                                            <td style="border-bottom:1px solid black; border-right:1px solid black;" align="center" valign="top">
                                                Fokusēta <br>
                                                diferenciācija<br>
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios13" value="option13">
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

            <div width="850px" style="margin-top:30px;">
                <button type="submit" class="btn btn-default btn-xs">Submit</button>
            </div>
        {!! Form::close() !!}
    @else
        {!! Form::open(array('route' => ['strategija_prieksrocibas_update'],'method'=>'POST')) !!}

        <!-- Внешняя таблица 2-->
        <table class="table-bordered">
            <tr>
                <td width="20px">

                </td>
                <td width="460px" align="center">
                    Konkurētspējīga priekšrocība
                </td>
            </tr>
            <tr>
                <td>
                    <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                        <tr>
                            <td align="center">Konkurences mērogs</td>
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
                                        <td align="center" width="50%">Zemas izmaksas</td>
                                        <td align="center" width="50%">Unikalitāte</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table height="210px" style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">
                                    <tr>
                                        <td align="center">Šaurs</td>
                                        <td align="center">Plašs</td>
                                    </tr>
                                </table>
                            </td>
                            <td>


                                <!-- Начало главной таблицы-->
                                <table width="440px" style="font-size: x-small">
                                    <tr height="70px">
                                        <td style="border-left:1px solid black; border-top:1px solid black" width="150px" align="center" valign="bottom">
                                            Līderība pēc izmaksām<br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios5" value="option5"
                                                   @if($selected_item == 'option5') checked @endif
                                            >
                                        </td>
                                        <td style="border-top:1px solid black; border-right:1px solid black" width="70px"></td>
                                        <td style="border-top:1px solid black;" width="70px"></td>
                                        <td style="border-top:1px solid black; border-right:1px solid black;" width="150px" align="center" valign="bottom">
                                            Diferenciācija<br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios7" value="option7"
                                                   @if($selected_item == 'option7') checked @endif
                                            >
                                        </td>
                                    </tr>
                                    <tr height="45px">
                                        <td style="border-bottom:1px solid black; border-left:1px solid black" align="center" valign="top">

                                        </td>
                                        <td colspan="2" rowspan="2" style="border:1px solid black" align="center">
                                            Zemo izmaksu un diferenciācijas kombinācija<br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios6" value="option6"
                                                   @if($selected_item == 'option6') checked @endif
                                            >
                                        </td>
                                        <td style="border-right:1px solid black; border-bottom:1px solid black;" align="center" valign="top">

                                        </td>
                                    </tr>
                                    <tr height="45px">
                                        <td style="border-left:1px solid black;" align="center" valign="bottom">

                                        </td>
                                        <td style="border-right:1px solid black;" align="center" valign="bottom">

                                        </td>
                                    </tr>
                                    <tr height="70px">
                                        <td style="border-left:1px solid black; border-bottom:1px solid black;" align="center" valign="top">
                                            Fokusēšana<br>
                                            pie zemām izmaksām<br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios10" value="option10"
                                                   @if($selected_item == 'option10') checked @endif
                                            >
                                        </td>
                                        <td style="border-bottom:1px solid black; border-right:1px solid black;"></td>
                                        <td style="border-bottom:1px solid black;"></td>
                                        <td style="border-bottom:1px solid black; border-right:1px solid black;" align="center" valign="top">
                                            Fokusēta <br>
                                            diferenciācija<br>
                                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios13" value="option13"
                                                   @if($selected_item == 'option13') checked @endif
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

        <div width="850px" style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-xs">Submit</button>
        </div>
        {!! Form::close() !!}
    @endif

    </div>



@endsection

