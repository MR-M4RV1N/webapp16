@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>{{ $force_name }}</h3>
    </div>

    <br>

    {!! Form::open(array('route' => ['page-forces-crud-update', $force_cat],'method'=>'POST')) !!}
    <table width="600px" align="center">
        <tr>
            <td>

                @if(isset($force))
                    <div class="form-group">
                        <label for="ietekme">Spēka ietekme:</label>
                        <select id="ietekme" class="form-control" name="ietekme">
                            <option @if($force->ietekme == 'ZEMA IETEKME"') selected="selected" @endif value="ZEMA IETEKME">ZEMA</option>
                            <option @if($force->ietekme == 'VIDĒJA IETEKME') selected="selected" @endif value="VIDĒJA IETEKME">VIDĒJA</option>
                            <option @if($force->ietekme == 'LIELA IETEKME') selected="selected" @endif value="LIELA IETEKME">LIELA</option>
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="ietekme">Spēka ietekme:</label>
                        <select id="ietekme" class="form-control" name="ietekme">
                            <option value="ZEMA IETEKME">ZEMA</option>
                            <option value="VIDĒJA IETEKME">VIDĒJA</option>
                            <option value="LIELA IETEKME">LIELA</option>
                        </select>
                    </div>
                @endif

            </td>
        </tr>
    </table>

    <br><br>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-default">Atjaunot</button>
    </div>
    {!! Form::close() !!}

@endsection

