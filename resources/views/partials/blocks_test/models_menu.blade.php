
<!-- 1/2 Navigator/Actions -->
<div class="col-lg-3" style="margin:0px; padding:0px;">
    <table style="border-top:1px solid grey;" width="100%">
        <tr>
            <td>
                <div style="margin-left:20px; margin-top:30px;">
                    <div style="align:left;">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true" style="margin-right:10px;"></span>Главное меню:<br>
                    </div>

                    @foreach($catt as $c)
                        <div style="margin-left:10px; margin-top:5px;">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span> <a href="/page_models_cat/{{ $c->id }}" style="color: black;">{{ $c->name }}</a><br>
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
    </table>

</div>
<!-- / 1/2 Navigator/Actions -->