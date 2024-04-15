<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

//DB接続
//require_once('src/pdo.php');
////セッション開始
session_start();
//
//if(!isset($_SESSION["userid"])){
//	$_SESSION["request_file"] = $_SERVER["REQUEST_URI"];
//	
//	header("Location:../login.php");
//	exit;
//}

if(!isset($_SESSION["sessionid"])){
    print '[{"res":"false","msg":"1"}]';
	exit;
}else{
    $sessionid = $_SESSION["sessionid"];
    $post_back_key = md5($sessionid);
}

function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

//require_once("../src/pdo.php");//ファイルを読み込み
//require_once("../src/Request.php");//外部ファイルの読み込み
require_once("src/pdo.php");//ファイルを読み込み
require_once("src/Request.php");//外部ファイルの読み込み


//foreach($_POST as $key => $val){echo $key.":".$val."<br>\n";}//postの値を確認

//header("Location:done.php");
//foreach($_POST as $key => $val){$poststr >= $key.":".$val."<br>\n";}//postの値を確認

$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入
//$get=$request->getQuery();//getを変数に配列で代入


//postに全く値がない場合はブランクを返す！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！！１１


if($post['key']==$post_back_key){

    $id = $post['doc_id'];

    $pram = array();
    $pram[] = $id;
    $pram[] = $post['pas'];

    $sqlstr = "UPDATE cn_doc SET ";
    $sqlstr .= " del_flg = 1";
    $sqlstr .= " WHERE id = ?";
    $sqlstr .= " and pas = ?";

    $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	try{

        if($sth->execute($pram)){
            $pram = array();
            $pram[] = $id;
            $sqlstr = "SELECT COUNT(id) FROM cn_doc WHERE id = ? and del_flg = 1";
            $sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($pram);
            $cunt = $sth->fetchAll();
        }else{
            print '[{"res":"false","msg":"2"}]';
            exit;
        }

	} catch ( PDOException $e ) {
        print '[{"res":"false","msg":"3"}]';
        exit;
	}

    if($cunt[0][0]==1){//正常　削除しました。
        print '[{"res":"true","msg":"4"}]';
    }else{
        print '[{"res":"false","msg":"5"}]';
    }
}else{
    print '[{"res":"false","msg":"6"}]';
}
?>