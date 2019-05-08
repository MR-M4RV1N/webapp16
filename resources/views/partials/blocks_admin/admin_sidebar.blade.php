<div id="sidebar-wrapper" style="">
    <div style="color: red; height: 50px; text-align: center; padding-top:20px;">
        <p style="font-size: small;">ADMIN</p>
    </div>

    @if($sidebar == 'admin')
        <div style="background-color: #4A4542; color: white; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
    @else
        <div style="color: #AAA7A0; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
    @endif
            <span class="glyphicon glyphicon-home" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">HOME</p></span>
        </div>


     @if($sidebar == 'console')
         <div style="background-color: #4A4542; color: white; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_console'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @else
         <div style="color: #AAA7A0; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_console'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @endif
            <span class="glyphicon glyphicon-console" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">CONSOLE</p></span>
        </div>

     @if($sidebar == 'users')
         <div style="background-color: #4A4542; color: white; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_users'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @else
         <div style="color: #AAA7A0; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_users'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @endif
            <span class="glyphicon glyphicon-user" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">USERS</p></span>
        </div>

     @if($sidebar == 'categories')
         <div style="background-color: #4A4542; color: white; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_categories'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @else
         <div style="color: #AAA7A0; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_categories'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @endif
            <span class="glyphicon glyphicon-list" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">CONTENT</p></span>
        </div>

     @if($sidebar == 'plans')
         <div style="background-color: #4A4542; color: white; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_plans'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @else
         <div style="color: #AAA7A0; height: 70px; text-align: center; cursor:pointer;"  onclick="location.href='/admin/page_plans'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';">
     @endif
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">PLANS</p></span>
        </div>
</div>