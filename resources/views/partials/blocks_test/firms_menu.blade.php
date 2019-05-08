
<!-- 1/2 Navigator/Actions -->
<div class="col-lg-3" style="margin:0px; padding:0px;">
    <table style="border-top:1px solid grey;" width="100%">
        <tr>
            <td>
                <div style="margin-left:20px; margin-top:30px;">
                    <div style="align:left;">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>Stratēģijas izstrāde:<br>
                    </div>
                    @if(isset($not_selected) and $not_selected == true)
                        <div style="margin-left:10px; margin-top:5px;">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_all_firms" style="color: black;">Uzņēmumu redaktors</a><br>
                        </div>
                    @else
                        <div style="margin-left:10px; margin-top:5px;">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_firms" style="color: black;">Izvēlēts uzņēmums</a><br>
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/select_selected_firm" style="color: black;">Izvēlēties citu uzņēmumu</a><br>
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_all_firms" style="color: black;">Uzņēmumu redaktors</a><br>
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/full_progress_map" style="color: black;">Pilna progresa karte</a><br>
                        </div>
                    @endif
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- / 1/2 Navigator/Actions -->
