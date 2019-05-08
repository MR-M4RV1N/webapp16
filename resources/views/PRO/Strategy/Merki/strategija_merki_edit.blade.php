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
                    {{ $page_title }}
                </td>
            </tr>
        </table>
        <br>

        {!! Form::open(array('route' => ['strategija-merki-update', $category, $id],'method'=>'POST')) !!}

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Mērķis:</strong>
            {!! Form::text('merkis', $strategija_merki_result[0]->merkis, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Paredzētās darbības mērķa izpildei</strong>
            {!! Form::textarea('darbibas', $strategija_merki_result[0]->darbibas, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Izpildītājs</strong>
            {!! Form::text('izpilditajs', $strategija_merki_result[0]->izpilditajs, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Izpildes laiks</strong>
            {!! Form::text('laiks', $strategija_merki_result[0]->laiks, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Plānotas izmaksas</strong>
            {!! Form::text('izmaksas', $strategija_merki_result[0]->izmaksas, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>


        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm">Atjaunot</button>
        </div>
        {!! Form::close() !!}

    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'darbibas' );
    </script>


@endsection

