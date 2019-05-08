@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div>
        <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span><a href="/page/{{ $catt[0]->id }}" style="color: #000000;">{{ $catt[0]->name }}</a></p>


        <table>
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


        <br><!-- Разделитель -->


        <?php $a = 1; ?>
        <?php $b = 0; ?>
        @for ($i = 1; $i < 3; $i++)
            <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span><a href="/page/{{ $catt[$i]->id }}" style="color: #000000;">{{ $catt[$i]->name }}</a></p>

            <table>
                <tr>
                    <td>

                        <table>
                            @foreach ($check[$a] as $ch)
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
                            @foreach ($subb_pro[$b] as $s)
                                <tr height="30px">
                                    <td width="800px">

                                        <div style="font-family:Calibri Light; margin-left:10px;">
                                            <a href="/my_page/{{ $s->route }}" style="color: #000000;">{{ $s->name }}</a>
                                        </div>

                                    </td>
                                    <td>
                                        <!-- Особое условие для IE -->
                                        @if($s->route == 'page_ie_list')

                                        @else
                                            {!! Form::open(['method' => 'DELETE','route' => ['full-progress-map-delete', $s->id]]) !!}
                                                <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                                            {!! Form::close() !!}
                                        @endif
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

