<div id="treeview-wrapper" style="border-right:1px solid black; padding:30px 20px 30px 20px;">
    <!-- snipp --->

    <!-- / snipp -->

    <table width="100%" height="50px">
        <tr>
            <td>
                <strong><p style="color: white">Canvas Business Model</p></strong>
            </td>
        </tr>
    </table>

    <hr style="margin:0px 20px 20px 20px;">

    <div style="color: #eeeeee">
        @foreach ($catt as $c)
            @if (isset($cat) && ($cat == $c->id))
                <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span><a href="/page_canvas_cat/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
            @else
                <p style="font-family:Times New Roman; margin-bottom:5px;"><span class=" glyphicon glyphicon-folder-close" aria-hidden="true" style="margin-right:10px;"></span><a href="/page_canvas_cat/{{ $c->id }}" style="color: #eeeeee;">{{ $c->name }}</a></p>
            @endif

            @if(isset($subb) && ($cat == $c->id) && !empty($subb[0]))
                @foreach ($subb as $s)
                   <p style="font-family:Calibri Light; margin:0px;"><span class=" glyphicon glyphicon-list-alt" aria-hidden="true" style="margin-left:15px; margin-right:5px;"></span><a href="/page_canvas/{{ $s->link }}/{{ $c->id }}" style="color: #eeeeee;">{{ $s->name }}</a></p>
                @endforeach
                <div style="margin-bottom:10px;"></div>
            @endif
        @endforeach
    </div>

</div>