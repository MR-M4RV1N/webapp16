@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Life Circle</h3>
    </div>


    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text }}</p>
        @endif
    </div>


    @if(@$selected_value == null)
        <div align="center" style="margin-top:50px;">
            <span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> Izvēle nav izdarīta!
        </div>

        <br><br>
    @endif


    {!! Form::open(array('route' => ['page-circle-update'],'method'=>'POST')) !!}
    <table align="center" width="500px" class="table-bordered">
        <tr height="244px" align="center">
            <td style="background: url('/images/circle-1.png');" width="146px">
                <div style="margin-top:70px;">Izcelsme</div>
                <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option1"
                       @if($selected_value == 'option1') checked @endif
                >
            </td>
            <td style="background: url('/images/circle-2.png')" width="95">
                <div style="margin-top:70px;">Izaugsme</div>
                <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option2"
                       @if($selected_value == 'option2') checked @endif>
            </td>
            <td style="background: url('/images/circle-3.png')" width="154">
                <div style="margin-top:70px;">Briedums</div>
                <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option3"
                       @if($selected_value == 'option3') checked @endif
                >
            </td>
            <td style="background: url('/images/circle-4.png')" width="100">
                <div style="margin-top:70px;">Kritums</div>
                <input class="form-check-input" type="radio" name="selected_value" id="selected_value" value="option4"
                       @if($selected_value == 'option4') checked @endif
                >
            </td>
        </tr>
    </table>

    <br>

    <div align="center">
        <button type="submit" class="btn btn-default btn-xs">Izvēlēties</button>
    </div>
    {!! Form::close() !!}

    <div style="margin-top:30px;" align="right">
        <a href="/my_page/downloadCircle" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Download</a>
    </div>

@endsection

