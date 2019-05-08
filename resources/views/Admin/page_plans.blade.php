@extends('Layouts.admin_plans_app')


@section('content')

    <strong>{{ $content }}</strong><br><br>

    <table>
        <?php $i = 1 ?>
        @foreach($plans as $plan)
            <tr>
                <td width="30px">
                    {{ $i }}
                </td>
                <td width="300px">
                    {{ $plan->firm_name }}
                </td>
                <td width="50px">
                    {{ $plan->name }}
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
    </table>

@endsection

