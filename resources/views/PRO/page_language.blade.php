@extends('Layouts.home_app')


@section('content')

    <!-- CRUD список предприятий -->
    {!! Form::open(array('route' => ['page-language-update'],'method'=>'POST')) !!}
    <table width="100%">
        <tr>
            <td colspan="2"><strong>Languages:</strong></td>
        </tr>
        <tr>
            <td height="10px"></td>
        </tr>

        @foreach($languages as $lang)
            <tr>
                <td>
                    <div style="margin-left:10px">{{ $lang->name }}</div>
                </td>
                <td>
                    <input class="form-check-input" type="radio" name="selected_language" id="{{ $lang->id }}" value="{{ $lang->name }}"
                       @if($lang->name == $selected_language )
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

