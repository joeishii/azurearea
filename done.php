<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

////セッション開始
session_start();

if(!isset($_SESSION["sessionid"])){
    header("Location:index.php");
	exit;
}else{
    $sessionid = $_SESSION["sessionid"];
}

$mode = $_SESSION["mode"];
$pas = $_SESSION["pas"];


if($mode=="doc_del"){
    //echo "Delete";
}elseif($mode=="doc_ins"){
    //echo "New Entry";
}elseif($mode=="com_ins"){
    //echo "Comment Entry";
}


//require_once("src/pdo.php");//ファイルを読み込み
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Done Page</title>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
$(document).ready(function() {

    //基本act
	$('#btn_ls_home').click(function(){
        window.location.href = "index.php";
    });
    $('#btn_ls_search').click(function(){
        window.location.href = "search.php";
    });
    $('#btn_ls_entry').click(function(){
        window.location.href = "entry.php";
    });

    $('#blackpanel').click(function(){
        $('.panel').hide();
    });

    $('#btn_copy').click(function(){
		$("#pas_area").select();
		document.execCommand('copy');

        $("#panel_text").html("Copyしました");
        $('#blackpanel').show();
        $('#poppanel').show();
    });

    <? if($mode=="doc_ins"){ ?>

        $('#msg').html("新規投稿が完了しました");

    <? }elseif($mode=="com_ins"){ ?>

        $('#msg').html("コメントの書き込みが完了しました");

    <? }elseif($mode=="doc_del"){ ?>

        $('#msg').html("削除が完了しました");
        $('#block_pas').hide();

    <? }elseif($mode=="repot_ins"){ ?>

        $('#msg').html("通報が完了しました");
        $('#block_pas').hide();

    <? }else{ ?>

    <? } ?>

    $('#panel_close').click(function(){
        $('.panel').hide();
    });


    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY Co.");
});
</script>
<body>
<div class="wrapper">Completion</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-1 mb-2">
                    <button type="button" id="btn_ls_home" class="btn btn-outline-dark btn-sm">Home</button>
                    <button type="button" id="btn_ls_search" class="btn btn-outline-dark btn-sm">Search</button>
                    <button type="button" id="btn_ls_entry" class="btn btn-outline-dark btn-sm">New Entry</button>
		        </div>
            </div>

        </div>
		<div class="container">
                <hr>
				<div class="row">
                        <div class="col-sm-12">■処理の完了</div>
                </div>
                <div id="msg"></div>
                <div id="block_pas">
                    <div class="row">
                        <div class="col-sm-6">削除用キーワード
					        <input type="text" id="pas_area" name="pas_area" value="<?= $pas ?>" readonly>
					        <button type="button" id="btn_copy" class="btn btn-outline-dark btn-sm">COPY</button>
				        </div>
				    </div>
                </div>
		</div>
        <hr>
        <div class="row">
                <div class="col-sm-12"><div id="copylight"></dvi></div>
        </div>
</div>
<div id="blackpanel" class="panel"></div>
    <div id="poppanel" class="panel">
        <div id="panel_header">Info!</div>
        <div id="panel_close">X</div>
        <div id="panel_text"></div>
    </div>
</body>
</html>