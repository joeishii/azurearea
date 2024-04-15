<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

////セッション開始
session_start();

if(!isset($_SESSION["sessionid"])){
    print "nothing";
	exit;
}else{
    $sessionid = $_SESSION["sessionid"];
    $post_back_key = md5($sessionid);
}


function h($s){
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

require_once("../src/pdo.php");//ファイルを読み込み
require_once("../src/Request.php");//外部ファイルの読み込み


$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入


if($post['key']==$post_back_key){

    $stmtParams = array();
    $stmtParams[] = 'D';

    $sqlstr = "SELECT ";
    $sqlstr .= "A.id,";
    $sqlstr .= "A.typ,";
    $sqlstr .= "A.dttm,";
    $sqlstr .= "A.nme,";
    $sqlstr .= "A.gend,";
    $sqlstr .= "A.age,";
    $sqlstr .= "A.ken,";
    $sqlstr .= "A.cty,";
    $sqlstr .= "A.ttl,";
    $sqlstr .= "A.txt,";
    $sqlstr .= "B.cunt";
    
    //$sqlstr .= " FROM cn_doc WHERE ";
    $sqlstr .= " FROM cn_doc AS A";
    $sqlstr .= " LEFT OUTER JOIN";
    $sqlstr .= " (SELECT dccd,count(id) AS cunt FROM cn_doc WHERE typ = 'C' AND del_flg = 0 GROUP BY dccd) AS B";
    $sqlstr .= " ON A.id = B.dccd";
    
    $sqlstr .= " WHERE A.typ = ?";    
    $sqlstr .= " and A.del_flg = 0 ";




    if(!isset($post['gend'])||$post['gend']=="A"){
    }else{
        $stmtParams[] = $post['gend'];
        $sqlstr .= "and A.gend = ? ";
    }

    if(!isset($post['ken'])||$post['ken']=="ALL"){
    }else{
        $stmtParams[] = $post['ken'];
        $sqlstr .= "and A.ken = ? ";
    }
    
    if(!isset($post['cty'])||$post['cty']=="ALL"){
    }else{
        $stmtParams[] = $post['cty'];
        $sqlstr .= "and A.cty = ? ";
    }

    if(!isset($post['age'])||$post['age']=="ALL"){
    }elseif($post['age']=="20代"){
        $sqlstr .= "and (A.age >= 20 and A.age < 30 ) ";
    }elseif($post['age']=="30代"){
        $sqlstr .= "and (A.age >= 30 and A.age < 40 ) ";
    }elseif($post['age']=="40代"){
        $sqlstr .= "and (A.age >= 40 and A.age < 50 ) ";
    }elseif($post['age']=="50代"){
        $sqlstr .= "and (A.age >= 50 and A.age < 60 ) ";
    }elseif($post['age']=="60代"){
        $sqlstr .= "and (A.age >= 60 and A.age < 70 ) ";
    }


    if(!isset($post['kywd'])||$post['kywd']==""){
    }else{

        $stmtParams[] = "%".$post['kywd']."%";
        $stmtParams[] = "%".$post['kywd']."%";
        $stmtParams[] = "%".$post['kywd']."%";
        $sqlstr .= "and (A.nme like ? or A.ttl like ? or A.txt like ? ) ";
    }
    $sqlstr .= "order by A.dttm desc";
    
	$sth = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));//まずはキーを見て存在するか確認、あれば更新なければ新規
	$sth->execute($stmtParams);
	$result = $sth->fetchAll();


    $text = [];
    $recd = [];

    print '[';
    foreach($result as $row){
        $recd[] = '"id":"'.$row['id'].'"';
        $recd[] = '"ttl":"'.h($row['ttl']).$test.'"';
        $recd[] = '"sub":"'.h($row['nme']).' '.$row['gend'].'('.$row['age'].')'.$row['ken'].$row['cty'].'"';
        $recd[] = '"txt":"'.h($row['txt']).'"';
        $recd[] = '"cunt":"'.h($row['cunt']).'"';

        $date = new DateTime($row['dttm']);
        $recd[] = '"dttm":"'.$date->format('m/d H:i').'"';

        $text[] = "{".implode( ",", $recd )."}";
    }
    print implode( ",", $text );

    print ']';
}else{
    print '[]';
}
?>