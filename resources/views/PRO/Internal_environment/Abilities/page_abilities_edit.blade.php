@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" merki</strong>
                </td>
            </tr>
        </table>
        <br>

        {!! Form::open(array('route' => ['page-abilities-update', $category, $id],'method'=>'POST')) !!}

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Galvenās kompetences:</strong>
            {!! Form::text('key_ability', $item[0]->key_ability, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Ilgtspējība</strong>
            {!! Form::textarea('durability', $item[0]->durability, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Caurredzamība</strong>
            {!! Form::text('transparence', $item[0]->transparence, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Mobilitāte</strong>
            {!! Form::text('mobility', $item[0]->mobility, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Neatkārtojama</strong>
            {!! Form::text('repeatability', $item[0]->repeatability, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>


        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Atjaunot</button>
        </div>
        {!! Form::close() !!}

    </div>



@endsection

