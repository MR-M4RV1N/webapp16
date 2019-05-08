
<!-- 1/2 Navigator/Actions -->
<div class="col-lg-3" style="margin:0px; padding:0px;">
    <table style="border-top:1px solid grey;" width="100%">
        <tr>
            <td>
                <div style="margin-left:20px; margin-top:30px;">
                    <div style="align:left;">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>Главное меню:<br>
                    </div>
                    <div style="margin-left:10px; margin-top:5px;">
                        @foreach($stratagems_cat as $sc)
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_stratagems_list/{{ $sc->id }}" style="color: black;">{{ $sc->part_name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- / 1/2 Navigator/Actions -->
