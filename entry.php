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

//require_once("../src/pdo.php");//ファイルを読み込み//DB接続 ../だとルート直下
require_once("src/pdo.php");
require_once("src/Request.php");//外部ファイルの読み込み
require_once("src/Log.php");//外部ファイルの読み込み

$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入

if($post['post_back']==$post_back_key){

    $now = new DateTime();
    $pas = $post['pas'];

    $stmtParams = array();
    $stmtParams[] = "D";//mainのdocment
    $stmtParams[] = 0;//mainのdocment
    $stmtParams[] = $now->format('Y-m-d H:i:s');
    $stmtParams[] = $post['nme'];
    $stmtParams[] = $post['age'];
    $stmtParams[] = $post['gend'];
    $stmtParams[] = $post['ken'];
    $stmtParams[] = $post['cty'];
    $stmtParams[] = $post['ttl'];
    $stmtParams[] = $post['txt'];

    $skey = 0;
    $skey = substr($now->format('mdHis').$post_back_key, 0, 16);

    $stmtParams[] = $pas;
    $stmtParams[] = $skey;
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
    $sqlstr .= "ttl,";
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
    $sqlstr .= "?,";
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
            //$_SESSION["doc_id"] = $rows[0][0];
            $_SESSION["mode"] = "doc_ins";
            $_SESSION["pas"] = $pas;
            header("Location:done.php");//フォームの再送信防止のために    
        }
	} catch ( PDOException $e ) {
	}

}else{

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
    $log_pram[] = "new entry open";//act
    $log_pram[] = $sessionid;//ssn
    $res = logWrites($log_pram);
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Entry Page</title>
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
                    alert('都道府県を選びなおしてください');
				}
		});
    });

    $('#btn_entry').click(function(){
        let val = datacheck();//データチェック
        if(val==true){
            $("#form_entry").append('<input type="hidden" name="post_back" value="'+post_back_key+'" />');
            $('#form_entry').submit();
        }else{
            $('#blackpanel').show();
            $('#poppanel').show();
        }
    });


    function datacheck(){
        $("#panel_text").html("");//リセット	

	    let flg;
        let msg = "";
        let ngw = ng_word;

        let lst = [
            {label: 'Title', data: $('#ttl').val()},
            {label: 'Name', data: $('#nme').val()},
            {label: 'Text', data: $('#txt').val()},
            {label: 'Password', data: $('#pas').val()}
        ];
        for(i in lst){
            let lbl = lst[i]['label'];
            let tst = lst[i]['data'];
            if(tst==''){
                msg = msg + "<p>" + lbl+ "は空白で入力できません。"+ "</p>";
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
            msg = msg + "<p>" + "都道府県を選択してください" + "</p>";
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

    $('#panel_close').click(function(){
        $('.panel').hide();
    });

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY Co.");
});
</script>
<body>
	<div class="wrapper">New Entry</div>

        <div class="container">

            <div class="row">
                <div class="col-sm-12 mt-1 mb-2">
                    <button type="button" id="btn_ls_home" class="btn btn-outline-dark btn-sm">Home</button>
                    <button type="button" id="btn_ls_search" class="btn btn-outline-dark btn-sm">Search</button>
                    <button type="button" id="btn_ls_entry" class="btn btn-outline-dark btn-sm">New Entry</button>
		        </div>
            </div>

            <form id="form_entry" action="entry.php" method="post">

                <div class="row">
                    <div class="col-sm-12">■New Entry</div>
                </div>

                <div class="row">
                    <div class="col-sm-12 mt-1">
                        <div class="tag_label"><label>Title :</label></div>
                        <input type="text" id="ttl" class="input_form_main" name="ttl" size="30" placeholder="タイトル">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1">
                        <div class="tag_label"><label>Name :</label></div>
                        <input type="text" id="nme" class="input_form_main" name="nme" placeholder="ニックネーム">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 mt-1">
                    <div class="tag_label"><label>Gender :</label></div>
                        <div id='gend' class="input_form_main">
                            <input type="radio" id="gender1" name="gend" value="M"><label for="gender1">Male(男性)</label>
                            <input type="radio" id="gender2" name="gend" value="F"><label for="gender2">Femail(女性)</label>
                        </div>
                    </div>
                    <div class="col-sm-2 mt-1">
                    <div class="tag_label"><label>Age :</label></div>
                        <select id="age" class="input_form_main" name="age">
                            <option>-</option>
                            <? for($i=20;$i<70;$i++){ ?>
                                <option><?= $i ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="col-sm-5 mt-1">
                        <div class="tag_label"><label>Area :</label></div>
                        <select id="ken_val" class="input_form_main" name="ken_val">
                            <option>-</option>
                        </select>
                        <select id="cty" class="input_form_main" name="cty">
                            <option>-</option>
                        </select>
                        <input type="hidden" id="ken" name="ken" value="-">
                    </div>
                </div>

                <div class="row">
                    <div class='mt-1'>
                        <label>Text :</label>
                        <div class="col-sm-12">
                            <textarea id="txt" class="input_form_main" name="txt" rows="10" cols="36"  placeholder="本文"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5 mt-1">
                        <label>Password :</label>
                        <input type="text" id="pas" class="input_form_main" name="pas" size="16" maxlength="16" placeholder="削除用パスワード" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mt-1 text-center">
                        <button type="button" id="btn_entry" class="btn btn-primary">投稿する</button>
                    </div>
                </div>
            </div>

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