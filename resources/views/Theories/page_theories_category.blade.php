@extends('Layouts.theories_app')


@section('content')

    <div align="center">
        <h3>{{ $theory_cat_title->category }}</h3>
    </div>

    <br><br>


    @foreach($theories as $theories)
        <?php $i = 1; ?>
        <table width="100%" align="center" style="margin-bottom: 30px;">

            <tr height="30px">
                <td>
                    <div style="margin-left:10px;">
                        <a href="/page_theories_show/{{ $theory_cat_title->id }}/{{ $theories->id }}"><h4>{{ $theories->title }}</h4></a>
                    </div>
                </td>
            </tr>

            <tr height="30px">
                <td>
                    <table style="margin-left:10px;">
                        <tr>
                            <td style="padding-right:5px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></td>
                            <td style="padding-right:30px; font-size: x-small; ">{{ $theories->created_at }}</td>

                            <td style="padding-right:5px;"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></td>
                            <td style="padding-right:30px; font-size: x-small; ">{{ $theories->updated_at }}</td>

                            <td style="padding-right:5px;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></td>
                            <td style="padding-right:30px; font-size: x-small; ">{{ $theories->author }}</td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr height="30px">
                <td>
                    <div style="margin-left:10px;">
                        {{ $theories->description }}
                    </div>
                </td>
            </tr>

            <tr>
                <td height="10px">
                    <div style="margin-top:10px; margin-left:10px;">
                        <button type="submit" class="btn btn-default btn-sm">ЧИТАТЬ ДАЛЕЕ</button>
                    </div>
                </td>
            </tr>
        </table>

        <hr style="border-top: 1px solid lightgrey;">

        <?php $i++; ?>
    @endforeach


@endsection

