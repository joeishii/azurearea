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
    $post_back_key = md5($sessionid);
}

function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}


require_once("src/pdo.php");//ファイルを読み込み//DB接続
require_once("src/Request.php");//外部ファイルの読み込み
require_once("src/Log.php");//外部ファイルの読み込み

$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入

if($post['post_back']==$post_back_key){

    $now = new DateTime();
    $pas = $post['pas'];


    $stmtParams = array();
    $stmtParams[] = "C";
    $stmtParams[] = $post['doc_cd'];
    $stmtParams[] = $now->format('Y-m-d H:i:s');
    $stmtParams[] = $post['nme'];
    $stmtParams[] = $post['age'];
    $stmtParams[] = $post['gend'];
    $stmtParams[] = $post['ken'];
    $stmtParams[] = $post['cty'];
    //$stmtParams[] = $post['ttl'];
    $stmtParams[] = $post['txt'];
    $stmtParams[] = $pas;
    $stmtParams[] = 0;//skey
    $stmtParams[] = 0;//del_flg
    $stmtParams[] = $sessionid;


    $sqlstr = "INSERT INTO cn_doc (";
    $sqlstr .= "typ,";
    $sqlstr .= "dccd,";
    $sqlstr .= "dttm,";
    $sqlstr .= "nme,";
    $sqlstr .= "age,";
    $sqlstr .= "gend,";
    $sqlstr .= "ken,";
    $sqlstr .= "cty,";
    //$sqlstr .= "ttl,";
    $sqlstr .= "txt,";
    $sqlstr .= "pas,";
    $sqlstr .= "skey,";
    $sqlstr .= "del_flg,"; 

    $sqlstr .= "ssn";
    $sqlstr .= ") ";
	$sqlstr .= "OUTPUT inserted.id ";//outputでフィールドをしている　挿入されたidが返る
    $sqlstr .= "VALUES (";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    //$sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?";
    $sqlstr .= ")";
    
	$result = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	try{
        $result->execute($stmtParams);//$result->execute(array(":page" => $page));
        $rows = $result->fetchAll();
		$cunt = $result->rowCount();

        if($cunt==1){
            $_SESSION["doc_id"] = $rows[0][0];
            $_SESSION["mode"] = "com_ins";
            $_SESSION["pas"] = $pas;
            header("Location:done.php");//フォームの再送信防止のために    
        }else{
            //例外エラーページ
        }

	} catch ( PDOException $e ) {
		$flg = $e;
		$flg .= "/sqlstr:".$sqlstr;
		$flg .= "/post_pram:".$post_pram;
	}

}elseif(isset($_SESSION["doc_cd"])){

    $doc_cd = $_SESSION["doc_cd"];

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
    $sqlstr .= "and del_flg = 0 ";
    $sqlstr .= "order by dttm desc";

    $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
	$sth->execute($stmtParams);
    $result = $sth->fetchAll();

    //$let_data .= "let mode = '".$mode."';";
    $let_data .= "let doc_cd = ".$doc_cd.";";
    $let_data .= "let post_back_key ='".$post_back_key."';";
    $let_data .= "\n";

    $log_pram = array();
    $log_pram[] = "N";//typ
    $log_pram[] = 0;//dccd    
    $log_pram[] = "";//gend
    $log_pram[] = "0";//age
    $log_pram[] = "";//ken
    $log_pram[] = "";//cty
    $log_pram[] = "";//kwd
    $log_pram[] = "cmnt entry open";//act
    $log_pram[] = $sessionid;//ssn
    $res = logWrites($log_pram);
}else{

}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Comment Page</title>
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

    //初期設定
	for(i in ken_data){
        $('#ken_val').append($('<option>').html(ken_data[i]['text']).val(ken_data[i]['value']));
	}


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


    $('#ken_val').change(function() {
        let val = $('#ken_val').val();
        let txt = $("#ken_val option:selected").text();
        $('#ken').val(txt);

        $('#cty').html("");
        $('#cty').append($('<option>').html('-')); 
        $.ajax({
				url:"area.php",
				dataType: 'json',
				type:'post',
				cache:false,
				data:{area_cd: val},
				success: function(data){
                    for(i in data){
                        $('#cty').append($('<option>').html(data[i].text));
	                }
				},
				error: function(XMLHttpRequest, textStatus, errorThrown){
                    //alert('通信に失敗しました。');
				}
		});
    });

    $('#btn_entry').click(function(){

        let val = datacheck();//データチェック
        if(val==true){
            $("#form_comment").append('<input type="hidden" name="doc_cd" value="'+doc_cd+'" />');
            $("#form_comment").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
            $('#form_comment').submit();
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
            {label: 'Name', data: $('#nme').val()},
            {label: 'Text', data: $('#txt').val()},
            {label: 'Password', data: $('#pas').val()}
        ];
        for(i in lst){
            let lbl = lst[i]['label'];
            let tst = lst[i]['data'];
            if(tst==''){
                msg = msg + "<p>" + lbl+ "は空白で入力できません。" + "</p>";
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
        if($('input[name="gend"]:checked').val()==""||$('input[name="gend"]:checked').val()==undefined){
            msg = msg + "<p>" + "Genderを選択してください" + "</p>";
            flg = true;
        }
        if($('#ken_val').val()=="-"){
            msg = msg + "<p>" + "Areaを選択してください" + "</p>";
            flg = true;
        }
        if($('#age').val()=="-"){
            msg = msg + "<p>" + "Ageを選択してください" + "</p>";
            flg = true;
        }

        if(flg){
            $("#panel_text").html(msg);
            return false;
        }else{
            return true;
        }
    };

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");
});
</script>
<body>
	<div class="wrapper">Comment</div>
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

        <div class="container">

            <form id="form_comment" action="comment.php" method="post">
                <div class="row">
                    <div class="col-sm-12">■Commentを入力します</div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1">
                        <div class="tag_label"><label>Name :</label></div>
                        <input type="text" id="nme" class="input_form_cmnt" name="nme" placeholder="ニックネーム"></div>
                </div>

                <div class="row">
                    <div class="col-sm-5 mt-1">
                        <div class="tag_label"><label>Gender :</label></div>
                        <div id="gend" class="input_form_cmnt">
                            <input type="radio" id="gender1" name="gend" value="M"><label for="gender1">Male(男性)</label>
                            <input type="radio" id="gender2" name="gend" value="F"><label for="gender2">Femail(女性)</label>
                        </div>
                    </div>
                    <div class="col-sm-2 mt-1">
                    <div class="tag_label"><label>Age :</label></div>
                        <select id="age" class="input_form_cmnt" name="age">
                            <option>-</option>
                            <? for($i=20;$i<70;$i++){ ?>
                                <option><?= $i ?></option>
                            <? } ?>
                        </select>
                    </div>

                    <div class="col-sm-5 mt-1">
                    <div class="tag_label"><label>Area :</label></div>
                        <select id="ken_val" class="input_form_cmnt" name="ken_val">
                            <option>-</option>
                        </select>
                        <select id="cty" class="input_form_cmnt" name="cty">
                            <option>-</option>
                        </select>
                        <input type="hidden" id="ken" name="ken" value="-">
                    </div>
                </div>

                <div class="row">
                    <label>Text :</label>
                    <div class="col-sm-12 mt-1">
                        <textarea id="txt" class="input_form_cmnt" name="txt" rows="10" placeholder="本文"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class='mt-1'>
                        <div class="col-sm-5">
                        <label>Password :</label>
                        <input type="text" id="pas" class="input_form_cmnt" name="pas" size="16" placeholder="削除用パスワード" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1 text-center">
                        <button type="button" id="btn_entry" class="btn btn-success">コメントする</button>
                    </div>
                </div>
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