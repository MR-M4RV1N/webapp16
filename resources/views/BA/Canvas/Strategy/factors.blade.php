@extends('Layouts.canvas_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div>
        <h4>Факторы</h4><br>
        <table>
            @foreach($content as $c)
            <tr>
                <td width="500px">
                    {{ $c->content }}
                </td>
                <td>
                    <a class="btn btn-info btn-xs" href="/page_canvas/factors_show/{{ $cat }}/{{ $c->id }}">Show</a>
                    <a class="btn btn-primary btn-xs" href="/page_canvas/factors_edit/{{ $cat }}/{{ $c->id }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['page-canvas-strategy-factors-destroy', $cat, $c->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <br><br>

        <table width="800px">
            <tr>
                <td>
                    <a class="btn btn-success btn-xs" href="{{ route('page-canvas-strategy-factors-create', $cat) }}">Add</a>
                </td>
            </tr>
        </table>
    </div>




@endsection

