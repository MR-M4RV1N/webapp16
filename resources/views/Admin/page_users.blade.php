@extends('Layouts.admin_users_app')


@section('content')

    <strong>{{ $content }}</strong><br><br>

    <table>
        <tr style="border-bottom: 3px double black;">
            <td>
                <strong>nikname</strong>
            </td>
            <td>
                <strong>email</strong>
            </td>
            <td>
                <strong>status</strong>
            </td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td width="200px">
                    {{ $user->name }}
                </td>
                <td width="200px">
                    {{ $user->email }}
                </td>
                <td width="200px">
                    {{ $user->type }}
                </td>
            </tr>
        @endforeach
    </table>



@endsection

