@extends('Layouts.admin_categories_app')


@section('content')

    <div align="center">
        <h3>{{ $theories->title }}</h3>
    </div>

    <br><br>


    <div style="margin: 30px;">
        <?php echo $theories->description ?>
    </div>

    <div style="margin: 30px;">
        <?php echo $theories->text ?>
    </div>

@endsection

