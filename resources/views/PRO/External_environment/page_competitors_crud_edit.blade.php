@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Competitors</h3>
    </div>

    <br>

    @if($competitors[0]->type == 'my_firm')
        <div align="center">
            <strong>Uzņēmuma {{ $competitors[0]->name }} analīze</strong>
        </div>
    @else
        <div align="center">
            <strong>Konkurenta {{ $competitors[0]->name }} analīze</strong>
        </div>
    @endif


    <br>

    {!! Form::open(array('route' => ['page-competitors-crud-update', $competitors[0]->id],'method'=>'POST')) !!}
    <table width="600px" align="center">
        <tr>
            <td width="80%">

                <!-- Категории -->
                <table width="100%" class="table-bordered">
                    @foreach($criteria as $criteria)
                        <tr height="50px">
                            <td>
                                <div style="margin-left:20px;">{{ $criteria->name }}</div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </td>
            <td width="20%">

                <table width="100%" align="center" class="table-bordered">

                    @for ($i = 1; $i <= 18; $i++)
                        <tr height="50px">
                            <td align="center">

                                <!-- Баллы -->
                                <table width="100px" align="center">
                                    <?php $kr = 'kr'.$i; ?>
                                    <tr align="center">
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                            5
                                        </td>
                                    </tr>

                                    <tr align="center">
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="1"
                                                   @if($competitors[0]->$kr == '1') checked @endif
                                            >
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="2"
                                                   @if($competitors[0]->$kr == '2') checked @endif
                                            >
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="3"
                                                   @if($competitors[0]->$kr == '3') checked @endif
                                            >
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="4"
                                                   @if($competitors[0]->$kr == '4') checked @endif
                                            >
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="5"
                                                   @if($competitors[0]->$kr == '5') checked @endif
                                            >
                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                    @endfor

                </table>

            </td>
        </tr>
    </table>

    <br><br>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-default">Atjaunot</button>
    </div>
    {!! Form::close() !!}

@endsection

