<!--- 3 div-a для каркаса -->
<div id="page-content-wrapper">
<div class="page-content">
<div class="container-fluid">



<!--- 4 div-a перед контентом -->
<div class="container-fluid" style="min-height: 650px; background-color: #FBFBFB;">

    <!-- Хлебные крошки -->
    <div class="row">
        <div class="col-lg-12">

            <div style="margin-top:10px;">
                <div class="btn-group" role="group" style="float:left;">
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
                <span class="glyphicon glyphicon-console" aria-hidden="true"></span>

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

<div class="row" >
<div class="col-lg-12" >
<div style=" border:1px solid #969696; background-color: white; padding:10px 20px 50px 20px;">

    <div align="center" style="margin-top:30px;">
        <strong>CONTENT EDITOR</strong>
    </div>

    <br><br>