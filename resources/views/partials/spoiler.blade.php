<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('css/my_css_for_spoiler.css')}}"/>
<!------ Include the above in your HEAD tag ---------->


<div align="center">
    <div class="spoiler" style="margin-top:50px; width: 800px;">
        <div class="spoiler-toggle-1"><span class="glyphicon glyphicon-plus"></span> Theory</div>
        <div class="spoiler-text-1" align="left">
            <p style="text-indent: 20px;" align="justify">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Aenean commodo ligula eget dolor. Aenean massa.
                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
                Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
            </p>
        </div>
    </div>
</div>


<div align="center">
    <div class="spoiler" style="margin-top:10px; width: 800px;">
        <div class="spoiler-toggle-2"><span class="glyphicon glyphicon-plus"></span> Example</div>
        <div class="spoiler-text-2" align="left">
            <p style="text-indent: 20px;" align="justify">

            <table style="border:1px solid lightgrey" width="700px" align="center">
                <tr height="50px">
                    <td colspan="4" style="border-bottom:1px solid lightgrey">
                        <div style="margin-left:20px;">
                            @if(isset($table_title))
                                <i>{{ $table_title }}</i>
                            @else
                                {{ $category_name }}:
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" height="10px">

                    </td>
                </tr>

                <tr height="30px">
                    <td width="50px" align="right">
                        1.
                    </td>
                    <td>
                        <div style="margin-left:10px;">
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                        </div>
                    </td>
                    <td width="40px" align="center">

                    </td>
                    <td width="40px" align="left">

                    </td>
                </tr>


                <tr height="30px">
                    <td width="50px" align="right">
                        2.
                    </td>
                    <td>
                        <div style="margin-left:10px;">
                            Aenean commodo ligula eget dolor. Aenean massa.
                        </div>
                    </td>
                    <td width="40px" align="center">

                    </td>
                    <td width="40px" align="left">

                    </td>
                </tr>


                <tr height="30px">
                    <td width="50px" align="right">
                        3.
                    </td>
                    <td>
                        <div style="margin-left:10px;">
                            Cum sociis natoque penatibus et magnis dis parturient montes,
                        </div>
                    </td>
                    <td width="40px" align="center">

                    </td>
                    <td width="40px" align="left">

                    </td>
                </tr>



            </table>
            </p>
        </div>
    </div>
</div>


<script>
    $(function(){
        $('.spoiler-text-1').hide();
        $('.spoiler-toggle-1').click(function(){
            $(this).next().animate({height: 'toggle'});
            if ($(this).html() == '<span class="glyphicon glyphicon-plus"></span> Theory'){
                $(this).html('<span class="glyphicon glyphicon-minus"></span> Theory');
            }
            else{
                $(this).html('<span class="glyphicon glyphicon-plus"></span> Theory');
            }
        }); // end spoiler-toggle
    }); // end document ready
</script>

<script>
    $(function(){
        $('.spoiler-text-2').hide();
        $('.spoiler-toggle-2').click(function(){
            $(this).next().animate({height: 'toggle'});
            if ($(this).html() == '<span class="glyphicon glyphicon-plus"></span> Example'){
                $(this).html('<span class="glyphicon glyphicon-minus"></span> Example');
            }
            else{
                $(this).html('<span class="glyphicon glyphicon-plus"></span> Example');
            }
        }); // end spoiler-toggle
    }); // end document ready
</script>