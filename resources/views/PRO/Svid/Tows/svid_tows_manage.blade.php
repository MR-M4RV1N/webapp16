@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" style="margin-bottom: 50px;">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <table class="table-bordered" width="850px">
            <tr>
                <td>

                </td>
                <td align="center">
                    {{ $title_1 }}
                </td>
            </tr>
            <tr>
                <td align="center" width="20px">
                    <div style="-webkit-transform: rotate(-180deg); writing-mode:tb-rl;">{{ $title_3 }}</div>
                </td>
                <td>
                    <table width="100%">
                        <tr style="border-bottom: 1px dashed #cfcfcf">
                            <td align="center" colspan="3">
                                {{ $title_2 }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" height="10px"></td>
                        </tr>
                        @if(isset($strategy_result[0]))
                            @foreach ($strategy_result as $r)
                                <tr>
                                    <td>
                                        <ul style="margin:0px;">
                                            <li>{{ $r->strategy }}</li>
                                        </ul>
                                    </td>
                                    <td width="30px">
                                        <a href="/my_page/svid_tows_edit/{{ $category }}/{{ $r->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td width="30px">
                                        {!! Form::open(['method' => 'DELETE','route' => ['svid-tows-destroy', $category, $r->id]]) !!}
                                            <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" height="10px">
                                    <!-- Это для красивого отступа снизу -->
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="3">
                                    <div style="margin:30px 30px 100px 30px; font-size: x-small;">...</div>
                                </td>
                            </tr>
                        @endif

                    </table>
                </td>
            </tr>
        </table>



    </div>



    <div align="center" style="margin-top:30px;">
        {!! Form::open(array('route' => ['svid-tows-store', $category],'method'=>'POST')) !!}
        <div class="form-group" align="left" style="width:700px;">
            <div align="center">
                <div style="margin:20px 0px 20px 0px;">Pievienot jaunu ierakstu:</div>
            </div>
            <input type="text" name="item" class="form-control" style="border-radius: 0rem;">
        </div>

        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</button>
        </div>
        {!! Form::close() !!}
    </div>


@endsection

