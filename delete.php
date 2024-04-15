<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

////セッション開始
session_start();

if(!isset($_SESSION["sessionid"])){
    header("Location:login.php");
	exit;
}else{
    $sessionid = $_SESSION["sessionid"];
    $post_back_key = md5($sessionid);
}


function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

require_once("src/pdo.php");//ファイルを読み込み//DB接続
require_once("src/Request.php");//外部ファイルの読み込み


$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入


if($post['post_back']==$post_back_key){

    if($post['typ']=="delete_done"){
        //$_SESSION["doc_cd"] = $post['doc_cd'];
        //$_SESSION["doc_id"] = $post['doc_cd'];
        $_SESSION["mode"] = "doc_del";
        $_SESSION["pas"] = "";
        header("Location:done.php");
        exit();
    }

}elseif(isset($_SESSION["mode"])){//viewから　本文かコメントか
    //echo $_SESSION["mode"];

    $mode = $_SESSION["mode"];
    $doc_cd = $_SESSION["doc_cd"];
    $com_cd = $_SESSION["com_cd"];


    //本文
    $stmtParams = array();
    $stmtParams[] = $doc_cd;

    $sqlstr = "SELECT ";
    $sqlstr .= "id,";
    $sqlstr .= "dttm,";
    $sqlstr .= "nme,";
    $sqlstr .= "gend,";
    $sqlstr .= "age,";
    $sqlstr .= "ken,";
    $sqlstr .= "cty,";
    $sqlstr .= "ttl,";
    $sqlstr .= "txt";
    $sqlstr .= " FROM cn_doc WHERE ";
    $sqlstr .= "id = ? ";
    $sqlstr .= "order by dttm desc";

    $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
    $sth->execute($stmtParams);
    $result = $sth->fetchAll();


    if($_SESSION["mode"]=="delt_main"){
        $doc_id = $doc_cd;
        $txt = "投稿を削除します";

    }elseif($_SESSION["mode"]=="delt_cmnt"){

        $doc_id = $com_cd;
        $txt = "コメントを削除します";


        //コメント
        $stmtParams = array();
        $stmtParams[] = $com_cd;

        $sqlstr = "SELECT ";
        $sqlstr .= "id,";
        $sqlstr .= "dttm,";
        $sqlstr .= "nme,";
        $sqlstr .= "gend,";
        $sqlstr .= "age,";
        $sqlstr .= "ken,";
        $sqlstr .= "cty,";
        $sqlstr .= "txt";
        $sqlstr .= " FROM cn_doc WHERE ";
        $sqlstr .= "id = ? ";
        $sqlstr .= "and del_flg = 0 ";

        $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
	    $sth->execute($stmtParams);
        $comnt = $sth->fetchAll();
    }

    $let_data .= "let mode = '".$mode."';";
    $let_data .= "let doc_id = ".$doc_id.";";
    $let_data .= "let post_back_key ='".$post_back_key."';";
    $let_data .= "\n";

}else{

}

?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete Page</title>
<script src="common.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
<?= $let_data ?>
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
    })

    $('#btn_delete').click(function(){
        let val = datacheck();//データチェック
        if(val==true){
            //$('#form_delete').submit();
            dataupdate();
        }else{
            $('#blackpanel').show();
            $('#poppanel').show();
        }
    });


    function datacheck(){
        $("#panel_text").html("");
	    let flg;
        let msg = "";
        let ngw = ng_word;
        let lst = [
            {label: 'Password', data: $('#pas').val()}
        ];
        for(i in lst){
            let lbl = lst[i]['label'];
            let tst = lst[i]['data'];
            if(tst==''){
                msg = msg + "<p>" + lbl+ "を入力してください" + "</p>";
                flg = true;
            }
            tst = tst.toLowerCase();
            for(w in ngw){
                if(tst.search(ngw[w])>-1){
                    msg = msg + "<p>" + lbl+ "に不正な文字列があります" + "</p>";
                    flg = true;
                }
	        }
	    }
        if(flg){
            $("#panel_text").html(msg);
            return false;
        }else{
            return true;
        }
    };

    function dataupdate(){
        $("#msg").html("");
        let key = post_back_key;
        let pas = $('#pas').val();

        $.ajax({
				url:"ajax_delete.php",
				dataType: 'json',
				type:'post',
				cache:false,
				data:{
                    key: key,
                    doc_id: doc_id,
                    pas: pas
                },
				success: function(data){
                    if(data[0].res=="true"){
                        delete_done();
                    }else if(data[0].res=="false"){
                        $('#msg').html("削除できませんでした。パスワードを確認してください");
                    }
				},	
				error: function(XMLHttpRequest, textStatus, errorThrown){
                    $('#msg').html("エラー");
				}
		});
    }

    function delete_done(){
        $("#form_delete").append('<input type="hidden" name="typ" value="delete_done" />');
        $("#form_delete").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_delete").submit();        
    }

    $("#dele_txt").html("<?= $txt ?>");

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");
});
</script>
<body>
	<div class="wrapper">Delete</div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-1 mb-2">
                    <button type="button" id="btn_ls_home" class="btn btn-outline-dark btn-sm">Home</button>
                    <button type="button" id="btn_ls_search" class="btn btn-outline-dark btn-sm">Search</button>
                    <button type="button" id="btn_ls_entry" class="btn btn-outline-dark btn-sm">New Entry</button>
		        </div>
            </div>

            <div class="maintext">    
                <div class='row'>
                    <div class='col-sm-12'><h2><?= h($result[0]['ttl']); ?></h2></div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <?
                            echo h($result[0]['nme']);
                            echo " ".$result[0]['gend'];
                            echo "(".$result[0]['age'].")";
                            echo $result[0]['ken'].$result[0]['cty'];
                        ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'><div class='mt-2'><?= h($result[0]['txt']); ?></div></div>
                </div>
            </div>
            <div class='dttm_cmnt'>
                <? $date = new DateTime($result[0]['dttm']);echo $date->format('m/d H:i'); ?>
            </div>
        </div>

        <? foreach($comnt as $row){ ?>

<div class="container">
<div class="balloon">

    <div class='row'>
        <div class='col-sm-12'>
            <?
                echo h($row['nme']);
                echo " ".$row['gend'];
                echo "(".$row['age'].")";
                echo $row['ken'].$row['cty'];
            ?>
        </div>
    </div>
    <div class='row'>
        <div class='col-sm-12'><div class='mt-1'><?= h($row['txt']); ?></div></div>
    </div>
</div>
<div class='dttm_cmnt'><? $date = new DateTime($row['dttm']);echo $date->format('m/d H:i'); ?></div>
</div>

<? } ?>
        <div class="container">

            <form id="form_delete" action="delete.php" method="post">
                <div class="row">
                    <div class="col-sm-12">■Delete</div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><div id="dele_txt"></div></div>
                </div>
                <div class="row">
                    <div class='mt-1'>
                        <div class="col-sm-5">
                        <label>Password :</label>
                        <input type="text" id="pas" class="input_form_red" name="pas" size="16" placeholder="削除用パスワード" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1 text-center">
                        <button type="button" id="btn_delete" class="btn btn-danger">削除する</button>
                    </div>
                </div>
                <div id="msg"></div>
            </div>
        </form>
    </div>
        <hr>
        <div class="row">
            <div class="col-sm-12"><div id="copylight"></dvi></div>
        </div>
	</div>
    <div id="blackpanel" class="panel"></div>
    <div id="poppanel" class="panel">
        <div id="panel_header">エラー</div>
        <div id="panel_close">X</div>
        <div id="panel_text"></div>
    </div>
</body>
</html>