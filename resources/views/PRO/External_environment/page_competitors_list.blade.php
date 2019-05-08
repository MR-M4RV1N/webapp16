@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h3>Competitors</h3>
    </div>

    <div style="margin: 50px 30px 50px 30px;">
        @if(isset($table_models_text->text))
            <p style="text-indent: 20px;" align="justify">{{ $table_models_text->text }}</p>
        @endif
    </div>

    @if(isset($my_firm->name) and isset($competitors[0]))
        <!-- Заглавие -->
        <div align="center">
            <strong>SIA „XXX” un konkurentu darbības salīdzinājums (CPM MATRIX)</strong>
            <a href="/my_page/page_competitors_edit/" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
        </div>

        <br>

        <!-- Главная таблица -->
        <table class="table-bordered" width="90%" align="center">
            <tr>
                <td rowspan="2" align="center">
                    N.<br>
                    p.<br>
                    k.<br>
                </td>
                <td rowspan="2" align="center">Darbības kritērijs</td>
                <td colspan="{{ $competitors_count }}" align="center">Uzņēmums un tā darbības vērtējums 5 baļļu sistēmā</td>
            </tr>
            <tr>
                <!-- Перебор имен конкурентов -->
                @foreach($competitors as $c)
                    <td align="center">{{ $c->name }}</td>
                @endforeach

                <!-- Название моей фирмы -->
                <td align="center">{{ $my_firm->name }}</td>
            </tr>

            <!-- Перебор категорий -->
            <?php $i = 1?>
            @foreach($criteria as $criteria)
                <tr>
                    <td align="center">{{ $i }}</td>
                    <td>{{ $criteria->name }}</td>

                    <!-- Перебор оценок конкурентов -->
                    <?php $kr = 'kr'.$i; ?>
                    @foreach($competitors as $c)
                        <td align="center">{{ $c->$kr }}</td>
                    @endforeach

                    <!-- Перебор оценок моей фирмы -->
                    <td align="center">{{ $my_firm->$kr }}</td>
                </tr>
                <?php $i++ ?>
            @endforeach

            <tr>
                <td colspan="2" align="right"> KOPĀ:</td>

                <!-- Общее число баллов у конкурентов -->
                @for($td_count = 0; $td_count < $competitors_count-1; $td_count++)
                    <td align="center">{{ $competitors_total[$td_count] }}</td>
                @endfor

                <!-- Общее число баллов у своей фирмы -->
                <td align="center">{{ $my_firm_total }}</td>
            </tr>
        </table>
    @else
        <!-- Заглавие -->
        <div align="center">
            <strong>SIA „XXX” un konkurentu darbības salīdzinājums (CPM MATRIX)</strong>
        </div>

        <br>

        <!-- Была ли введена информация о моей фирме -->
        @if(isset($my_firm->name))
            <div align="center" style="margin-top:30px;">
                <s>1. You must create your firm data!</s> OK!
            </div>
        @else
            <div align="center" style="margin-top:30px;">
                1. You must create your firm data!
                <a href="/my_page/page_competitors_first_create" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
            </div>
        @endif

        <!-- Была ли введена информация о моих конкурентах -->
        @if(isset($competitors[0]))
            <div align="center" style="margin-top:30px;">
                <s>2. You must create your competitor data!</s> OK!
            </div>
        @else
            <div align="center" style="margin-top:30px;">
                2. You must create your competitor data!
                <a href="/my_page/page_competitors_crud_create" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</a>
            </div>
        @endif
    @endif

@endsection

