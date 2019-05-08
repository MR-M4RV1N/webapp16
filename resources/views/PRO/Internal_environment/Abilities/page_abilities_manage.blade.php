@extends('Layouts.test_app')


@section('content')
    
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>{{ $page_title }}</h3>
    </div>
    
    <br><br>


    <table class="table-bordered" width="100%">
        <tr align="center" height="50px">
            <td>Galvenās kompetences</td>
            <td>Ilgtspējība</td>
            <td>Caurredzamība</td>
            <td>Mobilitāte</td>
            <td>Neatkārtojama</td>
            @if(isset($item[0]))
                <td colspan="2"><i>ACTIONS</i></td>
            @endif
        </tr>

        @if(isset($item[0]))
            @foreach($item as $item)
                <tr height="50px" style="font-size: x-small">
                    <td>
                        <div style="margin-left:5px;">{{ $item->key_ability }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->durability }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->transparence }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->mobility }}</div>
                    </td>
                    <td>
                        <div style="margin-left:5px;">{{ $item->repeatability }}</div>
                    </td>
                    <td width="40px" align="center">
                        <a href="/my_page/page_abilities_edit/{{ $category }}/{{ $item->id }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                    <td width="40px" align="center">
                        {!! Form::open(['method' => 'DELETE','route' => ['page-abilities-destroy', $category, $item->id]]) !!}
                        <button type="submit" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @else
            <tr height="50px" style="font-size: x-small">
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
                <td>
                    <div style="margin-left:30px;">
                        <i>...</i>
                    </div>
                </td>
            </tr>
        @endif
    </table>

    <br><br>

    <div align="center">

        <table>
            <tr>
                <td>
                    Pievienot jaunu ierakstu:
                </td>
            </tr>
        </table>
        <br>

        {!! Form::open(array('route' => ['page-abilities-store', $category],'method'=>'POST')) !!}

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Galvenās kompetences:</strong>
            {!! Form::text('key_ability', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Ilgtspējība</strong>
            {!! Form::textarea('durability', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Caurredzamība</strong>
            {!! Form::text('transparence', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Mobilitāte</strong>
            {!! Form::text('mobility', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>

        <div class="form-group" style="width:800px; text-align:left;">
            <strong>Neatkārtojama</strong>
            {!! Form::text('repeatability', null, array('placeholder' => 'Введите текст', 'class' => 'form-control')) !!}
        </div>


        <div style="margin-top:30px;">
            <button type="submit" class="btn btn-default btn-sm"><span class=" glyphicon glyphicon-plus" aria-hidden="true" style="margin-right:5px;"></span>Pievienot</button>
        </div>
        {!! Form::close() !!}

    </div>

@endsection

