@extends('Layouts.test_app')


@section('content')

    <div align="center">
        <h4>{{ $table_title }}</h4>
    </div>

    <br><br>

    <div align="center">
        <div class="spoiler-text-2" align="left">
            <p style="text-indent: 20px;" align="justify">

            <table style="border:1px solid lightgrey" width="700px" align="center">
                <tr height="50px">
                    <td colspan="4" style="border-bottom:1px solid lightgrey">
                        <div style="margin-left:20px;">
                            @if(isset($table_title))
                                {{ $table_title }}
                            @else
                                {{ $category_name }}:
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="10px">

                    </td>
                </tr>

                <?php $i = 1; ?>
                @foreach($example as $e)
                    <tr height="30px">
                        <td width="50px" align="right">
                            {{ $i }}.
                        </td>
                        <td>
                            <div style="margin-left:10px;">
                                {{ $e }}
                            </div>
                        </td>
                        <td width="40px" align="center">

                        </td>
                        <td width="40px" align="left">

                        </td>
                    </tr>
                    <?php $i++ ?>
                @endforeach

            </table>
            </p>
        </div>
    </div>



@endsection

