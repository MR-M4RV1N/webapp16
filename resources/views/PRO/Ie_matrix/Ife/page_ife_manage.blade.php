@extends('Layouts.test_app')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div align="center">
        <h4>IFE ANALĪZE</h4>
    </div>

    <br><br>

    <div align="center">

        <table>
            <tr>
                <td>
                    <strong>Uzņēmuma "X" IFE analīze</strong>
                </td>
            </tr>
        </table>

        <br>

        {!! Form::open(array('route' => ['page-ife-update-1', $category],'method'=>'POST')) !!}
        <table class="table-bordered" width="850px">

            <!-- ITEM 1 -->
            <tr height="30px" style="background-color: lightgrey;">
                <td align="center" colspan="4">
                    Stiprās pusēs
                </td>
            </tr>
            <tr align="center" height="30px">
                <td>Faktors</td>
                <td width="70px">Svars</td>
                <td width="70px">Reitings</td>
                <td>Kopējais svārs</td>
            </tr>
            @if(isset($item1[0]))
                <?php $i = 0; ?>
                @foreach ($item1 as $item1)
                    <tr>
                        <td style="vertical-align: middle; padding-left:10px;" width="600px">
                            {{ $item1->item }}
                        </td>
                        <td>
                            <input type="text" name="weight[]" value="{{ $item1->weight }}" class="form-control" style="border-radius: 0rem; text-align: center">
                            <input type="hidden" name="id[]" value="{{ $item1->id }}">
                        </td>
                        <td>
                            <input type="text" name="rating[]" value="{{ $item1->rating }}" class="form-control" style="border-radius: 0rem; text-align: center">
                        </td>
                        <td align = center>
                            {{ $score1[$i] }}
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @else
                <tr height="40px">
                    <td colspan="4" align="center">IFE table is empty. Get data from SWOT</td>
                </tr>
                <tr height="40px">
                    <td colspan="4" align="center"><a href="/my_page/page_ife_copy_from_swot/1" type="button" class="btn btn-primary btn-sm">Copy from SWOT</a> </td>
                </tr>
            @endif

            <!-- ITEM 2 -->
            <tr height="30px" style="background-color: lightgrey;">
                <td align="center" colspan="4">
                    Vājās pusēs
                </td>
            </tr>
            <tr align="center" height="30px">
                <td>Faktors</td>
                <td width="70px">Svars</td>
                <td width="70px">Reitings</td>
                <td>Kopējais svārs</td>
            </tr>
            @if(isset($item2[0]))
                <?php $i = 0; ?>
                @foreach ($item2 as $item2)
                    <tr>
                        <td style="vertical-align: middle; padding-left:10px;" width="600px">
                            {{ $item2->item }}
                        </td>
                        <td>
                            <input type="text" name="weight[]" value="{{ $item2->weight }}" class="form-control" style="border-radius: 0rem; text-align: center;">
                            <input type="hidden" name="id[]" value="{{ $item2->id }}">
                        </td>
                        <td>
                            <input type="text" name="rating[]" value="{{ $item2->rating }}" class="form-control" style="border-radius: 0rem; text-align: center">
                        </td>
                        <td align = center>
                            {{ $score2[$i] }}
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            @else
                <tr height="40px">
                    <td colspan="4" align="center">IFE table is empty. Get data from SWOT</td>
                </tr>
                <tr height="40px">
                    <td colspan="4" align="center"><a href="/my_page/page_ife_copy_from_swot/2" type="button" class="btn btn-primary btn-sm">Copy from SWOT</a> </td>
                </tr>
            @endif

            <!-- TOTAL -->
            <tr align="center" height="40px" style="border-top:3px double grey;">
                <td>Kopā:</td>
                <td>{{ $total_weight }}</td>
                <td>{{ $total_rating }}</td>
                <td>{{ $total_score }}</td>
            </tr>

        </table>

        <br>

        <button type="submit" class="btn btn-default btn-sm"><span aria-hidden="true" style="margin-right:5px;"></span>Saglabāt</button>
        {!! Form::close() !!}
    </div>


@endsection

