<div id="sidebar-wrapper" style="">
    <div style="color: #AAA7A0; height: 50px; text-align: center; padding-top:20px;">
        <p style="font-family: Palatino Linotype, Book Antiqua, Palatino, serif; font-size: medium"><strong>PRO</strong></p>
    </div>

    <div style="
        @if(isset($page_sidebar) and $page_sidebar == 'home')
            background-color: #4A4542; color: white;
        @else
            color: #AAA7A0;
        @endif
            height: 70px; text-align: center; cursor:pointer; border-top: 3px double grey;" onclick="location.href='/page_home'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';
    ">
        <span class="glyphicon glyphicon-home" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">START</p></span>
    </div>


    <div style="
        @if(isset($page_sidebar) and $page_sidebar == 'strategy')
            background-color: #4A4542; color: white;
        @else
            color: #AAA7A0;
        @endif
            height: 70px; text-align: center; cursor:pointer;" onclick="location.href='/page_firms'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';
    ">
        <span class="glyphicon glyphicon-th-large" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">STRATEGY</p></span>
    </div>


    <!--
    <div style="
    @if(isset($page_sidebar) and $page_sidebar == 'models')
            background-color: #4A4542; color: white;
    @else
            color: #AAA7A0;
    @endif
            height: 70px; text-align: center; cursor:pointer;" onclick="location.href='/page_models'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';
    ">
        <span class="glyphicon glyphicon-th" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">MODELS</p></span>
    </div>


    <div style="
    @if(isset($page_sidebar) and $page_sidebar == 'theories')
            background-color: #4A4542; color: white;
    @else
            color: #AAA7A0;
    @endif
            height: 70px; text-align: center; cursor:pointer;" onclick="location.href='/page_theories'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';
    ">        <span class="glyphicon glyphicon-book" aria-hidden="true" style="padding-top:20px;"><p style="font-size: xx-small; margin-top:3px;">THINKING TOOLS</p></span>
    </div>


    <div style="
    @if(isset($page_sidebar) and $page_sidebar == 'stratagems')
            background-color: #4A4542; color: white;
    @else
            color: #AAA7A0;
    @endif
            height: 70px; text-align: center; cursor:pointer;" onclick="location.href='/page_stratagems'" onmouseover="this.style.fontSize='130%';" onmouseout="this.style.fontSize='100%';
    ">
        <span class="glyphicon glyphicon-knight" aria-hidden="true" style="padding-top:20px;"><p style="font-size: x-small; margin-top:3px;">STATAGEMS</p></span>
    </div>
    -->
</div>