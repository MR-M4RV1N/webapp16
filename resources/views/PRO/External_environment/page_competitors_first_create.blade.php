@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Uzņēmuma novērtēšana</h3>
    </div>

    <br><br>
    <hr>

    {!! Form::open(array('route' => ['page-competitors-first-store'],'method'=>'POST')) !!}
    <table width="800px" align="center">
        <tr>
            <td width="30%">
                <div style="margin-left:20px;">Uzņēmuma nosaukums:</div>
            </td>
            <td width="70%">
                {{ $page_title }}
            </td>
        </tr>
    </table>

    <hr>

    <table width="600px" align="center">
        <tr>
            <td width="40%">

                <!-- Категории -->
                <table width="100%">
                    @foreach($criteria as $criteria)
                        <tr height="50px">
                            <td>
                                <div style="margin-left:20px;">{{ $criteria->name }}</div>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </td>
            <td width="60%">

                <table width="100%">

                    @for ($i = 1; $i <= 18; $i++)
                        <tr height="50px">
                            <td>

                                <!-- Баллы -->
                                <table width="100px">
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
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="1">
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="2">
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="3">
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="4">
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="radio" name="{{ $kr }}" id="{{ $kr }}" value="5">
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

    <hr>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-default">Pievienot</button>
    </div>

    <br><br><hr>
    {!! Form::close() !!}

@endsection

