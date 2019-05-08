@extends('Layouts.stratagems_app')


@section('content')

    <div align="center">
        <h3>{{ $stratagems->title }}</h3>
    </div>

    <br><br>

    <div>
    <?php echo $stratagems->intro ?> <!-- Эта строчка нужна для корректного отображения html тегов -->
    </div>

    <div style="margin: 30px;">
        <?php echo  $stratagems->description ?>
    </div>


    <table align="center" style="margin-top: 50px; margin-bottom: 50px; width: 750px; border:1px solid lightgrey;">
        <tr>
            <td>
                <div style="margin-left:30px; font-size: small;"><?php echo  $stratagems->key_elements ?></div>
            </td>
            <td align="center">
                <img src="/images/Stratagems/{{ $stratagems->schema }}" style="margin-top: 50px; margin-bottom: 50px;">
            </td>
        </tr>
    </table>


    <div style="margin: 30px;">
        <?php echo  $stratagems->features ?>
    </div>

    <div style="margin-top: 100px;">
        <?php echo  $stratagems->business ?>
    </div>

    <div style="margin-top: 30px;">
        <?php echo  $stratagems->history ?>
    </div>
@endsection

