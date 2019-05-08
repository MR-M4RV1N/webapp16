@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>
        <h4>Голубой океан</h4><br>
        <table>
            <tr>
                <td width="500px">
                    {{ $content->content }}
                </td>
            </tr>
        </table>
    </div>




@endsection

