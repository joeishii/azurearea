<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

////セッション開始
session_start();

if($_POST['post_back']=="yes"){
    $sessionid = session_id();
    $_SESSION["sessionid"] = $sessionid;
    header("Location:index.php");
    exit();
}else{
    session_destroy();
}

?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Entrance Page</title>
<meta name="description" content="クンニを通じて素敵な出会いを募集するための掲示板">
<meta name="keywords" content="クンニ,舐め犬,奉仕,募集,舐め犬掲示板,クンニ掲示板">
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
$(document).ready(function() {
    $('#btn_entry').click(function(){
        $('#form_login').submit();
    });

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");
});
</script>
<body>
	<div class="wrapper">Entrance</div>
            <div class="container">
                    <div class="row">
                        <div class="col-sm-12"><h1>舐め犬マッチングサイト</h1></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12"><img src="image/mainimage.png" alt="image" title="image" width="100%"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">このサイトはクンニを通じて素敵な出会いを募集するための掲示板です。年齢、利用規約を確認してご利用ください。</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">・年齢、利用規約確認</div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">・利用規約</div>
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
                        <div class="col-sm-12 mt-1 text-center">
                        利用規約を確認してください
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-grid gap-2 col-6 mx-auto">
                            
                            <button type="button" id="btn_entry" class="btn btn-warning"><b>Entry</b>
                                <p>私は18歳以上です。<br>利用規約を承諾します</p>
                            </button>
                            
                        </div>
                    </div>
                    <form id="form_login" action="login.php" method="post">
                            <input type="hidden" id="post_back" name="post_back" value="yes">
                    </form>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12"><div id="copylight"></dvi></div>
            </div>            
	</div>
</body>
</html>