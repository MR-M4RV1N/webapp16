<div id="treeview-wrapper" style="border-right:1px solid black; padding:30px 20px 30px 20px;">
    <!-- snipp --->

    <!-- / snipp -->

    <table width="100%" height="50px">
        <tr>
            <td>
                <strong><p style="color: white">Business Analitic Models</p></strong>
            </td>
        </tr>
    </table>

    <hr style="margin:0px 20px 20px 20px;">

    <table style="color: #eeeeee;">
        @foreach ($catt as $c)
            @if (isset($cat) && ($cat == $c->id))
                <tr>
                    <td colspan="2">
                        <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span><a href="/page_models_cat/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
                    </td>
                </tr>
            @else
                <tr>
                    <td colspan="2">
                        <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-close" aria-hidden="true" style="margin-right:10px;"></span><a href="/page_models_cat/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
                    </td>
                </tr>
            @endif

            @if(isset($subb_1) && ($cat == $c->id) && !empty($subb_1[0]))
                <!-- Заглавие списка -->
                <tr>
                    <td colspan="2">
                        <i style="font-family:Calibri Light; margin:0px;">Основные инструменты:</i>
                    </td>
                </tr>
                <!-- Вывод списка -->
                @foreach ($subb_1 as $s1)
                    <tr>
                        <td valign="top">
                            <span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:5px; margin-left:15px;"></span>
                        </td>
                        <td>
                            <p style="font-family:Calibri Light; font-size:small; margin:0px;"><a href="/page_models/{{ $s1->link }}/{{ $c->id }}" style="color: #eeeeee;">{{ $s1->name }}</a></p>
                        </td>
                    </tr>
                @endforeach
                <!-- Отступ снизу -->
                    <tr>
                        <td colspan="2" height="10px">

                        </td>
                    </tr>
            @endif

            @if(isset($subb_2) && ($cat == $c->id) && !empty($subb_2[0]))
                <!-- Заглавие списка -->
                <tr>
                    <td colspan="2">
                        <i style="font-family:Calibri Light; margin:0px;">Полезные инструменты:</i>
                    </td>
                </tr>
                <!-- Вывод списка -->
                @foreach ($subb_2 as $s2)
                    <tr>
                        <td valign="top">
                            <span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-right:5px; margin-left:15px;"></span>
                        </td>
                        <td valign="top">
                            <p style="font-family:Calibri Light; font-size:small; margin:0px;"><a href="/page_models/{{ $s2->link }}/{{ $c->id }}" style="color: #eeeeee;">{{ $s2->name }}</a></p>
                        </td>
                    </tr>
                @endforeach
                <!-- Отступ снизу -->
                <tr>
                    <td colspan="2" height="20px">

                    </td>
                </tr>
            @endif

        @endforeach
    </table>

</div>