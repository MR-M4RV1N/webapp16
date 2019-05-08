@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- CRUD список предприятий -->
    <table width="100%">
        <tr>
            <td colspan="2"><strong>Dokumenti:</strong></td>
        </tr>
        <tr>
            <td height="10px"></td>
        </tr>
        @if(isset($user_firm_result[0]->firm_name))
            <?php $i = 1;?>
            @foreach($user_firm_result as $user_firm)
                <tr>
                    <td width="30px">
                        {{ $i }}.
                    </td>
                    <td>
                        {{ $user_firm->firm_name }}
                    </td>
                    <td align="right" width="150px">
                        <a class="btn btn-info btn-xs" href="{{ route('firms_show',$user_firm->id) }}">Show</a>

                        <a class="btn btn-primary btn-xs" href="{{ route('firms_edit',$user_firm->id) }}">Edit</a>

                        {!! Form::open(['method' => 'DELETE','route' => ['firms_destroy', $user_firm->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                <?php $i++ ?>
            @endforeach
        @else
            <tr>
                <td>
                    Nav neviena dokumenta
                </td>
            </tr>
        @endif
    </table>

    <br><br>

    <table width="800px">
        <tr>
            <td>
                <a class="btn btn-success btn-xs" href="{{ route('firms_create') }}"> Izveidot dokumentu</a>
            </td>
        </tr>
    </table>

    @if(isset($user_firm_result[0]->firm_name))
        <br><br>
        <div align="center">
            <table width="800px">
                <tr>
                    <td align="center">
                        <a class="btn btn-default btn-xs" href="{{ route('page-firms') }}"> Stratēģijas izstrāde</a>
                    </td>
                </tr>
            </table>
        </div>
    @endif





@endsection

