
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
                        @foreach($theories_category as $t_cat)
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_theories_category/{{ $t_cat->id }}" style="color: black;">{{ $t_cat->category }}</a><br>
                        @endforeach
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<!-- / 1/2 Navigator/Actions -->
