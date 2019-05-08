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
                <td align="center">
                    ORGANIZĀCIJAS IEKŠĒJĀ VIDE
                </td>
            </tr>
            <tr>
                <td align="center">{{ $title_1 }}</td>
            </tr>
            <tr>
                <td style="padding:15px; vertical-align: top;">
                    <table width="100%">
                        @if(isset($svid_content[0]))
                            @foreach ($svid_content as $content)
                                <tr>
                                    <td valign="top" width="500px" style="font-size: small;"><div style="margin:5px;">{{ $content->item }}</div></td>
                                    <td width="10px" align="center">
                                        <a href="/my_page/svid_iekseja_edit/{{ $category }}/{{ $content->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                    </td>
                                    <td width="10px" align="center">
                                        {!! Form::open(['method' => 'DELETE','route' => ['svid-iekseja-destroy', $category, $content->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td>
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
        {!! Form::open(array('route' => ['svid-iekseja-store', $category],'method'=>'POST')) !!}
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

