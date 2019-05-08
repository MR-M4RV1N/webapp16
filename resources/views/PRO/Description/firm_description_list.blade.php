@extends('Layouts.test_app')


@section('content')

    <div align="center" style="margin-bottom: 30px;">
        <h3>Uzņēmuma apraksts</h3>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div align="center" style="margin-left:100px; margin-right:100px;">
        @if(isset($firm_description_result[0]->name))
            <div align="left">
                <strong>Uzņēmuma nosaukums:</strong><br><br>
                {{ $firm_description_result[0]->name }}
            </div>
        @else
            <div class="form-group" align="left">
                <strong>Uzņēmuma nosaukums:</strong><br><br>
                <i>Nav datu</i>
            </div>
        @endif

        <hr>

        @if(isset($firm_description_result[0]->description))
            <div align="left">
                <strong>Uzņēmuma apraksts:</strong><br><br>
                <div style="text-indent: 30px;" align="justify">
                    <?php echo $firm_description_result[0]->description ?> <!-- Эта строчка нужна для корректного отображения html тегов -->
                </div>
            </div>
        @else
            <div class="form-group" align="left">
                <strong>Uzņēmuma apraksts:</strong><br><br>
                <i>Nav datu</i>
            </div>
        @endif

        <br>

        @if(!empty($firm_description_result[0]->name) or !empty($firm_description_result[0]->description))
            <div>
                <a href="/my_page/firm_description_crud_edit" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>EDIT</a>
            </div>
        @else
            <div>
                <a href="/my_page/page_description_first_create" class="btn btn-default btn-xs" style="margin-left:15px;"><span class="glyphicon glyphicon-edit" aria-hidden="true" style="margin-right:5px;"></span>EDIT DESCRIPTION</a>
            </div>
        @endif

        <div style="margin-top:30px;" align="right">
            <a href="/my_page/downloadDescription" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Download</a>
        </div>
    </div>


@endsection

