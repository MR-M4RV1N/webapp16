<div id="treeview-wrapper" style="border-right:1px solid black; padding:30px 20px 30px 20px;">
    <!-- snipp --->

    <!-- / snipp -->
    <div>
        <table width="100%" height="50px">
            <tr>
                <td>
                    <strong><p style="color: white">Stratēģijas izstrāde</p></strong>
                </td>
                <td align="center" style="padding-bottom:10px; cursor:pointer" onclick="location.href='/categories/index'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
                    <div style="border:1px solid white; color:white; width:50px;">Edit</div>
                </td>
            </tr>
        </table>

        <hr style="margin:0px 20px 20px 20px;">

        <div style="color: #eeeeee">
            @foreach ($catt as $c)
                @if (isset($cat) && ($cat == $c->id))
                    <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span><a href="/page/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
                @else
                    <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-close" aria-hidden="true" style="margin-right:10px;"></span><a href="/page/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
                @endif

                @if(isset($cat) && ($cat == $c->id) && !empty($subb[0]))
                        @foreach ($subb as $s)
                            @if($s->route == null)
                                <p style="font-family:Calibri Light; margin:0px;"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-left:15px; margin-right:5px;"></span><a href="/page/{{ $c->id }}/{{ $s->id }}" style="color: #eeeeee;">{{ $s->name }}</a></p>
                            @else
                                <p style="font-family:Calibri Light; margin:0px;"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-left:15px; margin-right:5px;"></span><a href="/my_page/{{ $s->route }}/{{ $c->id }}/" style="color: #eeeeee;">{{ $s->name }}</a></p>
                            @endif
                        @endforeach
                        <br>
                    @endif
            @endforeach
        </div>
    </div>


</div>