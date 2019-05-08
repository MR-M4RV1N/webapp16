<!--- 3 div-a для каркаса -->
<div id="page-content-wrapper">
<div class="page-content">
<div class="container-fluid">
    <!--- Белый div -->
    <div class="row" style="height:50px; line-height: 50px; padding-left: 30px; background-color: white; border-bottom:2px solid #aaaaaa;">
        <div style="font-size: 6mm; float: left;">{{$page_title}}</div>


        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right" style="margin-right:30px;">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- -->
    </div>
    <!--- / Белый div -->
</div>

<!--- 1 из 4 div перед контентом -->
<div style="min-height: 650px; padding-bottom:0px; background-color: #FBFBFB;">

<!-- Хлебные крошки -->
<div class="row" style="margin:0px;">
    <div class="col-lg-12">

        <div style="margin-top:10px;">
            <div class="btn-group" role="group" style="float:left; margin-left:10px;">
                <button type="button" class="btn btn-sm" style="background-color:white; border: 1px solid grey">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                </button>
                <button type="button" class="btn btn-sm" style="background-color:white; border: 1px solid grey">
                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                </button>
            </div>
            <div class="btn-group" role="group" style="float:left; margin-left:10px;">
                <button type="button" class="btn btn-sm" style="background-color:white; border: 1px solid grey">
                    <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>
                </button>
            </div>
            <ul class="my_breadcrumb">
                <span class="
                    @if($page_sidebar == 'home') glyphicon glyphicon-home @endif
                    @if($page_sidebar == 'strategy') glyphicon glyphicon-th-large @endif
                    @if($page_sidebar == 'models') glyphicon glyphicon-th @endif
                    @if($page_sidebar == 'stratagems') glyphicon glyphicon-knight @endif
                    @if($page_sidebar == 'theories') glyphicon glyphicon-book @endif
                " aria-hidden="true"></span>

                @if(isset($page_breadcrumbs))
                    @foreach($page_breadcrumbs as $p_name => $p_link)
                    <li><a href="{{$p_link}}"><strong>{{$p_name}}</strong></a></li>
                    @endforeach
                @endif
                <li>{{$page_title}}</li>
            </ul>
        </div>

    </div>
</div>
<!-- / Хлебные крошки -->


<!--- 2 из 4 div перед контентом -->
<div class="row" style="margin:0px;">