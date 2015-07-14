<!DOCTYPE html>
<html>
<head>
    <title>AskWilly? - DashBoard</title>
    <LINK rel="stylesheet" type="text/css" href="Style.css"/>
    <LINK rel="stylesheet" type="text/css" href="tabcontent.css"/>
    <script src="tabcontent.js" type="text/javascript"></script>

    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="fullscreen-bg" style="  -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
    filter: blur(5px);">
    <video loop muted autoplay poster="VideoFrame.JPG" class="fullscreen-bg__video">
        <source src="bg10.webm" type="video/webm">
    </video>
</div>
<center>

    <div id="askwillyProfile" >
        <ul id="menu">
            <li><a href="index.html">Home</a>
            <li><a href="DashBoard.php">DashBoard</a>
            <li><a href="profile.php">Profile</a>
        </ul>
        <div style="float: right; margin-right: 1.5rem;">
            <form method="post" action="AddQuestion.php">
                <input type="submit" name="SearchBtn" formtarget="_blank" value="Make a Search" style="
                                                                                        width: 120%;
                                                                                        padding: 2px;
                                                                                        border: none;
                                                                                        font-size: 1.1rem;
                                                                                        background: rgba(255,255,255,0.23);
                                                                                        color: #fff;
                                                                                        border-radius: 3px;
                                                                                        cursor: pointer;
                                                                                        transition: .3s background;"/>
            </form>
        </div>
        <ul class="tabs" data-persist="true">
            <li class="selected"><a href="#Div1"><span>Top Questions</span></a></li>
            <li class=""><a href="#Div2"><span>Recent Questions</span></a></li>
            <li class=""><a href="#Div3"><span>QOD - Questions Of the Day</span></a></li>
            <li class=""><a href="#Div4"><span>Tutorials</span></a></li>

        </ul>
        <div class="tabcontents">
            <div id="Div1" style="display: block;">
                <li>Top Questions will be listed here.</li>
                <li>Questions With The Most Amount Of Answers Or Discussions.</li>
            </div>
            <div id="Div2" style="display: none;">
                <li>Recently Asked Questions Will Be Listed Here.</li>
            </div>
            <div id="Div3" style="display: none;">
                <li>QOD - Question Of The Day Will Be Updated Daily.</li>
                <li>The Point For Correctly Answering This Will be 10 Points.</li>
            </div>
            <div id="Div4" style="display: none;">
                <li>Special Tutorial will be Displayed Here.</li>
                <li>Requests Can Be Made By Users On A Topic Of Their Choosing.</li>
                <li>This Will Include Step By Step Image/Video Tutorials On Specific Topics.</li>

            </div>
        </div>

    </div>
</center>
</body>
</html>