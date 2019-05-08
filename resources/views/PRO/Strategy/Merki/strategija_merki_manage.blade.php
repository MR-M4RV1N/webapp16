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

        <table width="850px" style="font-size: small;" class="table-bordered">
            <tr height="50px" align="center" style="border-bottom:3px double black">
                <td width="150px">
                    <strong>Mērķis</strong>
                </td>
                <td width="200px">
                    <strong>Paredzētās darbības mērķa izpildei</strong>
                </td>
                <td width="150px">
                    <strong>Izpildītājs</strong>
                </td>
                <td width="150px">
                    <strong>Izpildes laiks</strong>
                </td>
                <td width="150px">
                    <strong>Plānotas izmaksas</strong>
                </td>
                <td width="50px" colspan="2">
                    ACTIONS
                </td>
            </tr>

            @if(isset($strategija_merki_result[0]))
                @foreach($strategija_merki_result as $strategija_merki_result)
                    <tr height="50px" style="font-size: x-small">
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->merkis }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;"><?php echo $strategija_merki_result->darbibas ?></div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->izpilditajs }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->laiks }}</div>
                        </td>
                        <td>
                            <div style="margin-left:5px;">{{ $strategija_merki_result->izmaksas }}</div>
                        </td>
                        <td width="25" align="center">
                            <a href="/my_page/strategija_merki_edit/{{ $category }}/{{ $strategija_merki_result->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                        <td width="25" align="center">
                            {!! Form::open(['method' => 'DELETE','route' => ['strategija-merki-destroy', $category, $strategija_merki_result->id]]) !!}
                            <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @else
                <tr height="50px">
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                    <td>
                        <div style="margin-left:30px;">
                            <i>...</i>
                        </div>
                    </td>
                </tr>
            @endif
        </table>

        <br><br>

        <div align="center">

            <table>
                <tr>
                    <td>
                        Pievienot jaunu ierakstu:
                    </td>
                </tr>
            </table>

            <br>

            {!! Form::open(array('route' => ['strategija-merki-store', $category],'method'=>'POST')) !!}

            <div class="form-group" style="width:800px; text-align:left;">
                <strong>Mērķis:</strong>
                {!! Form::text('merkis', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
            </div>

            <div class="form-group" style="width:800px; text-align:left;">
                <strong>Paredzētās darbības mērķa izpildei</strong>
                {!! Form::textarea('darbibas', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
            </div>

            <div class="form-group" style="width:800px; text-align:left;">
                <strong>Izpildītājs</strong>
                {!! Form::text('izpilditajs', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
            </div>

            <div class="form-group" style="width:800px; text-align:left;">
                <strong>Izpildes laiks</strong>
                {!! Form::text('laiks', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
            </div>

            <div class="form-group" style="width:800px; text-align:left;">
                <strong>Plānotas izmaksas</strong>
                {!! Form::text('izmaksas', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
            </div>


            <div style="margin-top:30px;">
                <button type="submit" class="btn btn-default btn-sm">Saglabāt</button>
            </div>
            {!! Form::close() !!}

        </div>


    </div>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'darbibas' );
    </script>


@endsection

