@extends('Layouts.admin_categories_app')


@section('content')

    <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"
            type="text/javascript" charset="utf-8" >
    </script>


    <!-- Content -->
    {!! Form::open(array('route' => ['page-stratagems-store'],'method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
    <div align="left" style="margin-left:30px;"> <!-- div для выравнивания по центру -->
        <div class="form-group" style="width:800px;">
            <strong>Номер стратагемы:</strong>
            {!! Form::number('number', 'value'); !!}
        </div>

    </div>

    <hr>

    <div align="left" style="margin-left:30px;"> <!-- div для выравнивания по центру -->

        <div class="form-group">
            <strong>Название:</strong>
            {!! Form::text('title', null, array('placeholder' => 'Введите текст','class' => 'form-control')) !!}
        </div>

        <div>
            <strong>Введение:</strong>
            {!! Form::textarea('intro', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <div style="margin-top:50px;">
            <strong>Описание:</strong>
            {!! Form::textarea('description', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <div style="margin-top:50px;">
            <strong>Ключевые элементы:</strong>
            {!! Form::textarea('key_elements', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <br><br>

        <div class="form-group">
            <strong>Схема:</strong>
            {!! Form::file('schema'); !!}
        </div>

        <br><br>

        <div>
            <strong>Особенности:</strong>
            {!! Form::textarea('features', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <div style="margin-top:50px;">
            <strong>Бизнес:</strong>
            {!! Form::textarea('business', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <div style="margin-top:50px;">
            <strong>История:</strong>
            {!! Form::textarea('history', null, array('placeholder' => 'Введите текст','class' => 'myeditablediv')) !!}
        </div>

        <br><br>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-default btn-sm">SAVE</button>
        </div>
    </div> <!-- / div для выравнивания по центру -->
    {!! Form::close() !!}
    <!-- Content -->


    <script type="text/javascript">
        tinymce.init({
            selector: '.myeditablediv',
            plugins: "lists image",

        });
    </script>

@endsection

