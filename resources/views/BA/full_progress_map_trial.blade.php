@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div>
        <!-- 1/2 Trial version -->
        <p style="font-family:Times New Roman; margin-bottom:5px; margin-left:170px"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>{{ $catt[0]->name }}</p>

        <table align="center">
            <tr>
                <td>

                    <table>
                        @foreach ($check[0] as $ch)
                            <tr height="30px">
                                <td>
                                    @if($ch == 1)
                                        <div style="margin-left:10px">
                                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                                        </div>
                                    @else
                                        <div style="margin-left:10px">
                                            <span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>


                </td>
                <td>

                    <table>
                        @foreach ($subb_trial as $s)
                            <tr height="30px">
                                <td width="800px">

                                    <div style="font-family:Calibri Light; margin-left:10px;">
                                        <a href="/my_page/{{ $s->route }}" style="color: #000000;">{{ $s->name }}</a>
                                    </div>

                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['full-progress-map-delete', $s->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>


                </td>
            </tr>
        </table>


        <br><!-- ----------Разделитель---------- -->
        <div align="center"><button type="button" onclick="location.href='/get_pro_statuss'"><img src="/images/icons-key.png" style="width: 20px;">   Get PRO statuss</button></div>
        <br>

        <!-- 2/2 PRO version -->
        <?php $a = 1; ?>
        <?php $b = 0; ?>
        @for ($i = 1; $i < 6; $i++)
            <p style="font-family:Times New Roman; margin-bottom:5px; color: #aaaaaa; margin-left:170px"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>{{ $catt[$i]->name }}</p>

            <table align="center">
                <tr>
                    <td>

                        <table>
                            @foreach ($check[$a] as $ch)
                                <tr height="30px">
                                    <td>
                                        <div style="margin-left:10px; color: #aaaaaa;">
                                            <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </td>
                    <td>

                        <table>
                            @foreach ($subb_pro[$b] as $s)
                                <tr height="30px">
                                    <td width="800px">
                                        <div style="font-family:Calibri Light; margin-left:10px;">
                                            <div style="color: #aaaaaa;">{{ $s->name }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="glyphicon glyphicon-remove" style="color: #aaaaaa; margin-left:3px;"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>


                    </td>
                </tr>
            </table>

            <br>

            <?php $a++; ?>
            <?php $b++; ?>
        @endfor
    </div>



@endsection

