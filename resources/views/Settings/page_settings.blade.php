@extends('Layouts.settings_app')


@section('content')

    <div>
        <strong>{{ $content }}</strong>
    </div>

    <table class="table-bordered" width="800px">
        <tr>
            <td>
                Login
            </td>
            <td>
                ---
            </td>
        </tr>
        <tr>
            <td>
                Password
            </td>
            <td>
                ---
            </td>
        </tr>
        <tr>
            <td>
                e-mail
            </td>
            <td>
                ---
            </td>
        </tr>
        <tr>
            <td>
                Name
            </td>
            <td>
                ---
            </td>
        </tr>
        <tr>
            <td>
                Surname
            </td>
            <td>
                ---
            </td>
        </tr>
        <tr>
            <td>
                Birth
            </td>
            <td>
                ---
            </td>
        </tr>
    </table>


@endsection

