<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

////セッション開始
session_start();
if(!isset($_SESSION["sessionid"])){
    header("Location:login.php");
	exit;
}


?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Index Page</title>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
$(document).ready(function() {
    $('#btn_ls_home').click(function(){
        window.location.href = "index.php"; //"../www/index.php"
    });
    $('#btn_ls_search').click(function(){
        window.location.href = "search.php";
    });
    $('#btn_ls_entry').click(function(){
        window.location.href = "entry.php";
    });

    $('#menu_ls_search').click(function(){
        window.location.href = "search.php";
    });

    $('#menu_ls_inquiry').click(function(){
        window.location.href = "inquiry.php";
    });

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");
});
</script>
<body>
	<div class="wrapper">Home</div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class='mt-1'>
                            <button type="button" id="btn_ls_home" class="btn btn-outline-dark btn-sm" disabled>Home</button>
                            <button type="button" id="btn_ls_search" class="btn btn-outline-dark btn-sm">Search</button>
                            <button type="button" id="btn_ls_entry" class="btn btn-outline-dark btn-sm">New Entry</button>
                        </div>
		            </div>
                </div>
            </div>

            <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-sm-12"><h1>舐め犬マッチングサイト</h1></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"><img src="image/mainimage.png" alt="image" title="image" width="100%"></div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-12">■このサイトについて</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        このサイトでは性癖の一致からの出会いの場を提供します。
                        特にクンニをされたい者としたい者による一致に特化しています。
                        性的行為についてはお互いの同意の基で行ってください。

                        </div>
                    </div>
                    <div class="row">
                        <div id="menu_ls_search" class="col-sm-12">●掲示板を検索する</div>
                    </div>
                    <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8 iframe_div">
                        <iframe src="terms.html" width="100%" height="100">
                        この部分はインラインフレームを使用してます。
                        </iframe>
                    </div>
                    <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div id="menu_ls_inquiry" class="col-sm-12">●問合せ</div>
                    </div>
                </div>

            <hr>
                <div class="row">
                    <div class="col-sm-12"><div id="copylight"></dvi></div>
                </div>            
	</div>
</body>
</html>