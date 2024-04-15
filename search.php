<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

//DB接続
//require_once('src/pdo.php');
////セッション開始
session_start();

if(!isset($_SESSION["sessionid"])){
    header("Location:login.php");
	exit;
}else{
    $sessionid = $_SESSION["sessionid"];
    $post_back_key = md5($sessionid);
}


//doc_cdなどのセッションをクリアにした方が良いかも？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？・


//コードの無効化
function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

//require_once("../src/pdo.php");//ファイルを読み込み
//require_once("../src/Request.php");//外部ファイルの読み込み
require_once("src/pdo.php");//ファイルを読み込み
require_once("src/Request.php");//外部ファイルの読み込み


$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入

if($post['post_back']==$post_back_key){//postback時の処理を書くところ

    if($post['typ']=="btn_open"){
        $_SESSION["doc_cd"] = $post['doc_cd'];
        header("Location:view.php");
        exit();
    }

    $stmtParams = array();
    $stmtParams[] = 'D';

    $sqlstr = "SELECT ";
    $sqlstr .= "id,";
    $sqlstr .= "typ,";
    $sqlstr .= "dttm,";
    $sqlstr .= "nme,";
    $sqlstr .= "gend,";
    $sqlstr .= "age,";
    $sqlstr .= "ken,";
    $sqlstr .= "cty,";
    $sqlstr .= "ttl,";
    $sqlstr .= "txt";
    $sqlstr .= " FROM cn_doc WHERE ";
    $sqlstr .= "typ = ? ";
    $sqlstr .= "and del_flg = 0 ";

    if($post['gend']!="A"){
        $stmtParams[] = $post['gend'];
        $sqlstr .= "and gend = ? ";
    }

    if($post['ken']!="ALL"){
        $stmtParams[] = $post['ken'];
        $sqlstr .= "and ken = ? ";
    }
    if($post['cty']!="ALL"){
        $stmtParams[] = $post['cty'];
        $sqlstr .= "and cty = ? ";
    }

    if($post['age']=="ALL"){

    }elseif($post['age']=="20代"){
        $sqlstr .= "and (age >= 20 and age < 30 ) ";
    }elseif($post['age']=="30代"){
        $sqlstr .= "and (age >= 30 and age < 40 ) ";
    }elseif($post['age']=="40代"){
        $sqlstr .= "and (age >= 40 and age < 50 ) ";
    }elseif($post['age']=="50代"){
        $sqlstr .= "and (age >= 50 and age < 60 ) ";
    }elseif($post['age']=="60代"){
        $sqlstr .= "and (age >= 60 and age < 70 ) ";
    }

    if($post['keyword']!=""){
        $stmtParams[] = "%".$post['keyword']."%";
        $stmtParams[] = "%".$post['keyword']."%";
        $sqlstr .= "and (ttl like ? or txt like ? ) ";
    }

    $sqlstr .= "order by dttm desc";
    
	$sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
	$sth->execute($stmtParams);
	$result = $sth->fetchAll();

    $cunt = $sth->rowCount();//columnCount()

}else{//first open!

}


?>
<!doctype html>
<html lang="ja">
<head>
<meta http-equiv="Content-Language" content="ja">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Search Page</title>
<script src="common.js"></script>
<script src='//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
<script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js'></script>
<link rel="stylesheet" href="css/index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<script>
$(document).ready(function() {

    //初期設定
	for(i in ken_data){
        $('#ken_val').append($('<option>').html(ken_data[i]['text']).val(ken_data[i]['value']));
	}

    $("#gender0").prop('checked', true);//selectの初期化

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

    $('#panel_close').click(function(){
        $('.panel').hide();
    });


    //$("#form_search").onkeypress = (e) => {
    $('#keyword').keypress(function (e) {
        //const key = e.keyCode || e.charCode || 0;
        const key = e.keyCode;        
        if (key == 13) {// 13はEnterキーのキーコード
            e.preventDefault();// アクションを行わない
        }
    });


    //個別act
    $('#ken_val').change(function() {
        let val = $('#ken_val').val();
        let txt = $("#ken_val option:selected").text();
        $('#ken').val(txt);

        $('#cty').html("");//リセット
        $('#cty').append($('<option>').html('ALL'));

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
				}
		});
    });

    $('#btn_search').click(function(){
        
        let val = datacheck();//データチェック
        if(val==true){
            dataload();
            //$("#form_search").submit();
        }else{
            $('#blackpanel').show();
            $('#poppanel').show();
        }

    });

    function dataload(){
        $("#result_area").html("");

        let key = $("#post_back").val();
        let gend = $('input[name=gend]:checked').val();
        let age = $('#age').val();
        let ken = $('#ken').val();
        let cty = $('#cty').val();
        let kywd = $('#keyword').val();

        $.ajax({
				url:"ajax_search.php",
				dataType: 'json',
				type:'post',
				cache:false,
				data:{
                    key: key,
                    gend: gend,
                    age: age,
                    ken: ken,
                    cty: cty,
                    kywd: kywd
                },
				success: function(data){
                    let cunt = 0;
                    for(i in data){
                        let cmnt_cunt;
                        if(data[i].cunt==undefined||data[i].cunt==0){
                            cmnt_cunt = "0 コメント";
                        }else{
                            cmnt_cunt = data[i].cunt+" コメント";
                        }
                        $('#result_area').append(
                            '<div class="container"><div class="maintext">'+
                            '<div class="row"><div class="col-sm-12"><h3>' + data[i].ttl + '</h3></div></div>'+
                            '<div class="row"><div class="col-sm-12">'+ data[i].sub + '</div></div>'+
                            '<div class="row"><div class="col-sm-12 mt-2">' + data[i].txt + '</div></div>'+
                            '<div class="row"><div class="d-grid gap-2 col-4 mx-auto">'+
                                '<button type="button" class="btn btn-outline-primary btn_open" value=' + data[i].id + '>OPEN</button>'+
                            '</div></div>'+
                            '</div>'+
                            '<div class="row align-items-start">'+
                            '<div class="col cunt_cmnt">'+ cmnt_cunt + '</div>'+
                            '<div class="col"><div class="dttm_cmnt">'+ data[i].dttm + '</div></div>'+
                            '</div>'
                            );
                            cunt++;
	                }
                    $(document).on("click", ".btn_open", function () {
                            btn_open($(this).val());
                    });
                    if(cunt==0){
                        $('#msg').html("見つかりません");
                    }else{
                        $('#msg').html(cunt+"件見つかりました。");
                    }
				},	
				error: function(XMLHttpRequest, textStatus, errorThrown){
                    $('#msg').html("エラー");
				}
		});
    }


    function datacheck(){
        $("#panel_text").html("");
        let flg;
        let msg = "";
        let ngw = ng_word;

        let lst = [
            {label: 'keyword', data: $('#keyword').val()}
        ];
        for(i in lst){
            let lbl = lst[i]['label'];
            let tst = lst[i]['data'];
            if(tst==''){
            }
            tst = tst.toLowerCase();//小文字に変換
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
    }



    $('.btn_openXXX').click(function(){
        let doc_cd = $(this).val();

        $("body").append('<form action="view.php" method="post" id="post"></form>');
        $("#post").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');
        $("#post").submit();
    });



    function btn_open(doc_cd){
        $("#form_search").append('<input type="hidden" name="typ" value="btn_open" />');
        $("#form_search").append('<input type="hidden" name="doc_cd" value="' + doc_cd + '" />');
        $("#form_search").submit();        
    }



    $('#btn_clear').click(function(){
        $('#msg').html("");
        $("#result_area").html("");

        $("#gender0").prop('checked', true);//selectの初期化
        $('#age').val("ALL");
        $('#ken_val').val("ALL");
        $('#ken').val("ALL");
        $('#cty').html("");//リセット
        $('#cty').append($('<option>').html('ALL'));
        $('#keyword').val("");
    });

<? if($post['post_back']==$post_back_key){//postback時の処理を書くところ ?>

    $('input[name="gend"]').each(function(){
        if($(this).val() == '<?= $post['gend'] ?>'){
            $(this).prop('checked', true);
        }
    });
    $('#ken_val').val('<?= $post['ken_val'] ?>');

    $('#age').val('<?= $post['age'] ?>');
    $('#keyword').val('<?= $post['keyword'] ?>');

    let val = '<?= $post['ken_val'] ?>';
    $('#cty').html("");//リセット
    $('#cty').append($('<option>').html('ALL'));
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
            $('#cty').val('<?= $post['cty'] ?>');
		},	
		error: function(XMLHttpRequest, textStatus, errorThrown){
            //alert('通信に失敗しました。');
		}
	});

    //検索結果のメッセージ
    <? if($cunt==0){ ?>
        $('#msg').html("見つかりません");
    <? }else{ ?>
        $('#msg').html("<?= $cunt ?>件見つかりました。");
    <? } ?>

<? }else{ ?>

<? } ?>

    $("#post_back").val("<?= $post_back_key ?>");

    let d = new Date();
    let y = d.getFullYear();
    $("#copylight").html("Copylight " + y + " YAY ℠");

});
</script>
<body>
	    <div class="wrapper">Search</div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 mt-1 mb-2">
                            <button type="button" id="btn_ls_home" class="btn btn-outline-dark btn-sm">Home</button>
                            <button type="button" id="btn_ls_search" class="btn btn-outline-dark btn-sm" disabled>Search</button>
                            <button type="button" id="btn_ls_entry" class="btn btn-outline-dark btn-sm">New Entry</button>
		            </div>
                </div>
            </div>

            <form id="form_search" action="search.php" method="post">

                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">■検索条件を指定してください</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5 mt-2">
                            <div class="tag_label"><label>Gender:</label></div>
                            <div id='gend' class="input_form_main">
                                <input type="radio" id="gender0" name="gend" value="A"><label for="gender0">All</label>
                                <input type="radio" id="gender1" name="gend" value="M"><label for="gender1">Male(男性)</label>
                                <input type="radio" id="gender2" name="gend" value="F"><label for="gender2">Femail(女性)</label>
                            </div>
                        </div>
                        <div class="col-sm-2 mt-2">
                        <div class="tag_label"><label>Age:</label></div>
                            <select id="age" class="input_form_main" name="age">
                                <option>ALL</option>
                                <option>20代</option>
                                <option>30代</option>
                                <option>40代</option>
                                <option>50代</option>
                                <option>60代</option>
                            </select>
                        </div>
                        <div class="col-sm-5 mt-2">
                        <div class="tag_label"><label>Area:</label></div>
                            <select id="ken_val" class="input_form_main" name="ken_val">
                                <option>ALL</option>
                            </select>
                            <select id="cty" class="input_form_main" name="cty">
                                <option>ALL</option>
                            </select>
                            <input type="hidden" id="ken" name="ken" value="ALL">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-2">
                        <div class="tag_label"><label>Keyword:</label></div>
                            <input type="text" id="keyword" class="input_form_main" name="keyword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-2 mb-2 text-center">
                            <input type="hidden" id="post_back" name="post_back" value="yes">
                            <button type="button" id="btn_search" class="btn btn-primary">検索する</button>
                            <button type="button" id="btn_clear" class="btn btn-outline-primary">クリア</button>
                        </div>
                    </div>

                    <div id="msg"></div>
                </div>
            </form>
        <div id="result_area">
        <? foreach($result as $row){ ?>
            <div class="container">
                <div class="maintext">
                <div class='row'>
                    <div class='col-sm-12'><h3><?= h($row['ttl']); ?></h3></div>
                </div>
                <div class='row'>
                    <div class='col-sm-12'>
                        <?
                            echo h($row['nme']);
                            echo " ".$row['gend'];
                            echo "(".$row['age'].")";
                            echo "[".$row['ken'].$row['cty']."]";
                        ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-sm-12 mt-2'><?= h($row['txt']); ?></div>
                </div>
                <div class='row'>
                    <div class="d-grid gap-2 col-3 mx-auto">
                        <button type="button" class="btn btn-outline-primary btn_open" value="<?= $row['id'] ?>">OPEN</button>
                    </div>
                </div>

                </div>

                <div class='dttm_cmnt'>
                    <? $date = new DateTime($row['dttm']);echo $date->format('m/d H:i'); ?>
                </div>
            </div>
        <? } ?>
        </div>


	    </div>
        
        <hr>
        <div class="row">
            <div class="col-sm-12"><div id="copylight"></dvi></div>
        </div>
    <div id="blackpanel" class="panel"></div>
    <div id="poppanel" class="panel">
        <div id="panel_header">エラー</div>
        <div id="panel_close">X</div>
        <div id="panel_text"></div>
    </div>
</body>
</html>