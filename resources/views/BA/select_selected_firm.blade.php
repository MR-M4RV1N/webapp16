@extends('Layouts.firms_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('alert'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- CRUD список предприятий -->
    {!! Form::open(array('route' => ['selected-firms-update'],'method'=>'POST')) !!}
        <table width="100%">
            <tr>
                <td colspan="2"><strong>Uzņēmumu saraksts:</strong></td>
            </tr>
            <tr>
                <td height="10px"></td>
            </tr>

            @foreach($user_firm_result as $user_firm)
                <tr>
                    <td>
                        {{ $user_firm->firm_name }}
                    </td>
                    <td>
                        <input class="form-check-input" type="radio" name="selected_firm" id="{{ $user_firm->id }}" value="{{ $user_firm->id }}"
                               @if($user_firm->id == $selected_firm_id)
                                    checked
                               @endif
                        >
                    </td>
                </tr>
            @endforeach

        </table>

        <br>

        <table width="800px">
            <tr>
                <td>
                    <button type="submit" class="btn btn-default" style="margin-top:10px;">Izvēlēties</button>
                </td>
            </tr>
        </table>
    {!! Form::close() !!}





@endsection

