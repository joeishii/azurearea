<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

session_start();
if(!isset($_SESSION["sessionid"])){
    header("Location:index.php");
	exit();
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

    if($post['typ']=="trans_cmnt"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        header("Location:comment.php");
        exit();

    }elseif($post['typ']=="repot_main"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        $_SESSION["com_cd"] = $post['com_cd'];
        $_SESSION["mode"] = "repot_main";
        header("Location:report.php");
        exit();

    }elseif($post['typ']=="repot_cmnt"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        $_SESSION["com_cd"] = $post['com_cd'];
        $_SESSION["mode"] = "repot_cmnt";
        header("Location:report.php");
        exit();

    }elseif($post['typ']=="delt_main"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        $_SESSION['com_cd'] = 0;
        $_SESSION["mode"] = "delt_main";
        header("Location:delete.php");
        exit();

    }elseif($post['typ']=="delt_cmnt"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        $_SESSION["com_cd"] = $post['com_cd'];
        $_SESSION["mode"] = "delt_cmnt";
        header("Location:delete.php");
        exit();

    }

}elseif(isset($_SESSION["doc_cd"])){//再読み込みでも分岐されない　来ないのかも こっちに変更

    $doc_cd = $_SESSION["doc_cd"];
    data_load($doc_cd);
}

function data_load($doc_cd){

    global $conn;
    global $result;
    global $comnt;
    global $cunt;

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
    $sqlstr .= "and del_flg = 0 ";
    $sqlstr .= "order by dttm desc";

    $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
    $sth->execute($stmtParams);
    $result = $sth->fetchAll();

    //コメント
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
    $sqlstr .= "txt";
    $sqlstr .= " FROM cn_doc WHERE ";
    $sqlstr .= "typ = 'C' ";
    $sqlstr .= "and del_flg = 0 ";
    $sqlstr .= "and dccd = ? ";
    $sqlstr .= "order by dttm desc";

    $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
	$sth->execute($stmtParams);
    $comnt = $sth->fetchAll();

    $cunt = $sth->rowCount();//columnCount()
}

$let_data .= "let doc_cd = ".$doc_cd.";";
$let_data .= "let post_back_key ='".$post_back_key."';";
$let_data .= "\n";

?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Page</title>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
<?= $let_data ?>
$(document).ready(function() {
    //初期設定

    //基本act
    $('#btn_ls_home').click(function(){
        window.location.href = "home.php";
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

    $('#btn_report').click(function(){
        $("#form_view").append('<input type="hidden" name="typ" value="repot_main" />');
        $("#form_view").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');///初めから配置しても良いかも
        $("#form_view").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_view").submit();
    });

    $('#btn_cmnt').click(function(){
        $("#form_view").append('<input type="hidden" name="typ" value="trans_cmnt" />');
        $("#form_view").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');///初めから配置しても良いかも
        $("#form_view").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_view").submit();
    });

    $('#btn_delt').click(function(){
        $("#form_view").append('<input type="hidden" name="typ" value="delt_main" />');
        $("#form_view").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');
        $("#form_view").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_view").submit();

    });

    $('.btn_report').click(function(){
        let com_cd = $(this).val();
        $("#form_view").append('<input type="hidden" name="typ" value="repot_cmnt" />');
        $("#form_view").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');
        $("#form_view").append('<input type="hidden" name="com_cd" value="' + com_cd + '" />');
        $("#form_view").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_view").submit();
    });


    $('.btn_delt').click(function(){
        let com_cd = $(this).val();
        $("#form_view").append('<input type="hidden" name="typ" value="delt_cmnt" />');
        $("#form_view").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');
        $("#form_view").append('<input type="hidden" name="com_cd" value="' + com_cd + '" />');
        $("#form_view").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
        $("#form_view").submit();
    });


    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");
});
</script>
<body>
	<div class="wrapper">View</div>
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
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="text-right">
                        <button type="button" id="btn_report" class="btn btn-link btn-sm">通報する</button>　<button type="button" id="btn_delt" class="btn btn-link btn-sm">削除する</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class='dttm_cmnt'>
                <? $date = new DateTime($result[0]['dttm']);echo $date->format('m/d H:i'); ?>
            </div>

            <div class='row'>
                <div class='col-sm-12 text-center'>
                    <button type="button" id="btn_cmnt" class="btn btn-success">コメントする</button>
                </div>
            </div>
            <label><?= $cunt ?>　コメント</label>
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
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class="text-right">
                            <button type="button" class="btn btn-link btn-sm btn_report" value="<?= $row['id'] ?>">通報する</button>　<button type="button" class="btn btn-link btn-sm btn_delt" value="<?= $row['id'] ?>">削除する</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class='dttm_cmnt'><? $date = new DateTime($row['dttm']);echo $date->format('m/d H:i'); ?></div>
            </div>
            
            <? } ?>
            <form id="form_view" action="view.php" method="post">
            </form>
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