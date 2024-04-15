<?
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Tokyo');//タイムゾーンの設定

//DB接続
//require_once('src/pdo.php');
////セッション開始
//session_start();
//
//if(!isset($_SESSION["userid"])){
//	$_SESSION["request_file"] = $_SERVER["REQUEST_URI"];
//	
//	header("Location:../login.php");
//	exit;
//}
//
//function h($s){
//	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
//}

//Mは、male [meil] ﾒｲﾙ（雄、男性、男子）の略で、
//Fは、femail [fíːmeil] ﾌｨｰﾒｲﾙ(雌、女性）の略です。
//多様な性別表現、LGBTQ
//Lは、Lesbian（女性同性愛者）lézbiən　レズビアン　
//Gは、Gay（男性同性愛者）géi ゲイ
//Bは、Bisexual（男女問わず両性愛者）baisékʃuəl バイセクシュアル　
//Tは、Transgender（トランスジェンダー）複数の性同一性の総称、
//Qは、Queer （変わり者；以前は差別語）kwíər　クウィア　もしくは　
//　　  Qestioning (性を決めかねている人) kwéstʃəniŋ クウェスチョニング 


//require_once("../src/pdo.php");//ファイルを読み込み
//require_once("../src/Request.php");//外部ファイルの読み込み
require_once("src/Request.php");//外部ファイルの読み込み


//foreach($_POST as $key => $val){echo $key.":".$val."<br>\n";}//postの値を確認


//header("Location:done.php");
//foreach($_POST as $key => $val){$poststr >= $key.":".$val."<br>\n";}//postの値を確認


$request=new Request();//postを得るためのクラス　　　　　　　　不要な気がする！！！！！！！！！！！！！
$post=$request->getPost();//postを変数に配列で代入
$get=$request->getQuery();//getを変数に配列で代入
//$code_file=$get['code_file'];//URLにあるcodefile名を変数に代入

if($post['area_cd']=="-"){//postback時の処理を書くところ
    //print '[{"text":"ALL","val":"ALL"}]';
    print '[]';

}elseif($post['area_cd']=="01"){//北海道

    print '[';
    print '{"text":"札幌市"},';
    print '{"text":"函館市"},';
    print '{"text":"小樽市"},';
    print '{"text":"旭川市"},';
    print '{"text":"室蘭市"},';
    print '{"text":"釧路市"},';
    print '{"text":"帯広市"},';
    print '{"text":"北見市"},';
    print '{"text":"夕張市"},';
    print '{"text":"岩見沢市"},';
    print '{"text":"網走市"},';
    print '{"text":"留萌市"},';
    print '{"text":"苫小牧市"},';
    print '{"text":"稚内市"},';
    print '{"text":"美唄市"},';
    print '{"text":"芦別市"},';
    print '{"text":"江別市"},';
    print '{"text":"赤平市"},';
    print '{"text":"紋別市"},';
    print '{"text":"士別市"},';
    print '{"text":"名寄市"},';
    print '{"text":"三笠市"},';
    print '{"text":"根室市"},';
    print '{"text":"千歳市"},';
    print '{"text":"滝川市"},';
    print '{"text":"砂川市"},';
    print '{"text":"歌志内市"},';
    print '{"text":"深川市"},';
    print '{"text":"富良野市"},';
    print '{"text":"登別市"},';
    print '{"text":"恵庭市"},';
    print '{"text":"伊達市"},';
    print '{"text":"北広島市"},';
    print '{"text":"石狩市"},';
    print '{"text":"北斗市"},';
    print '{"text":"当別町"},';
    print '{"text":"新篠津村"},';
    print '{"text":"松前町"},';
    print '{"text":"福島町"},';
    print '{"text":"知内町"},';
    print '{"text":"木古内町"},';
    print '{"text":"七飯町"},';
    print '{"text":"鹿部町"},';
    print '{"text":"森町"},';
    print '{"text":"八雲町"},';
    print '{"text":"長万部町"},';
    print '{"text":"江差町"},';
    print '{"text":"上ノ国町"},';
    print '{"text":"厚沢部町"},';
    print '{"text":"乙部町"},';
    print '{"text":"奥尻町"},';
    print '{"text":"今金町"},';
    print '{"text":"せたな町"},';
    print '{"text":"島牧村"},';
    print '{"text":"寿都町"},';
    print '{"text":"黒松内町"},';
    print '{"text":"蘭越町"},';
    print '{"text":"ニセコ町"},';
    print '{"text":"真狩村"},';
    print '{"text":"留寿都村"},';
    print '{"text":"喜茂別町"},';
    print '{"text":"京極町"},';
    print '{"text":"倶知安町"},';
    print '{"text":"共和町"},';
    print '{"text":"岩内町"},';
    print '{"text":"泊村"},';
    print '{"text":"神恵内村"},';
    print '{"text":"積丹町"},';
    print '{"text":"古平町"},';
    print '{"text":"仁木町"},';
    print '{"text":"余市町"},';
    print '{"text":"赤井川村"},';
    print '{"text":"南幌町"},';
    print '{"text":"奈井江町"},';
    print '{"text":"上砂川町"},';
    print '{"text":"由仁町"},';
    print '{"text":"長沼町"},';
    print '{"text":"栗山町"},';
    print '{"text":"月形町"},';
    print '{"text":"浦臼町"},';
    print '{"text":"新十津川町"},';
    print '{"text":"妹背牛町"},';
    print '{"text":"秩父別町"},';
    print '{"text":"雨竜町"},';
    print '{"text":"北竜町"},';
    print '{"text":"沼田町"},';
    print '{"text":"鷹栖町"},';
    print '{"text":"東神楽町"},';
    print '{"text":"当麻町"},';
    print '{"text":"比布町"},';
    print '{"text":"愛別町"},';
    print '{"text":"上川町"},';
    print '{"text":"東川町"},';
    print '{"text":"美瑛町"},';
    print '{"text":"上富良野町"},';
    print '{"text":"中富良野町"},';
    print '{"text":"南富良野町"},';
    print '{"text":"占冠村"},';
    print '{"text":"和寒町"},';
    print '{"text":"剣淵町"},';
    print '{"text":"下川町"},';
    print '{"text":"美深町"},';
    print '{"text":"音威子府村"},';
    print '{"text":"中川町"},';
    print '{"text":"幌加内町"},';
    print '{"text":"増毛町"},';
    print '{"text":"小平町"},';
    print '{"text":"苫前町"},';
    print '{"text":"羽幌町"},';
    print '{"text":"初山別村"},';
    print '{"text":"遠別町"},';
    print '{"text":"天塩町"},';
    print '{"text":"猿払村"},';
    print '{"text":"浜頓別町"},';
    print '{"text":"中頓別町"},';
    print '{"text":"枝幸町"},';
    print '{"text":"豊富町"},';
    print '{"text":"礼文町"},';
    print '{"text":"利尻町"},';
    print '{"text":"利尻富士町"},';
    print '{"text":"幌延町"},';
    print '{"text":"美幌町"},';
    print '{"text":"津別町"},';
    print '{"text":"斜里町"},';
    print '{"text":"清里町"},';
    print '{"text":"小清水町"},';
    print '{"text":"訓子府町"},';
    print '{"text":"置戸町"},';
    print '{"text":"佐呂間町"},';
    print '{"text":"遠軽町"},';
    print '{"text":"湧別町"},';
    print '{"text":"滝上町"},';
    print '{"text":"興部町"},';
    print '{"text":"西興部村"},';
    print '{"text":"雄武町"},';
    print '{"text":"大空町"},';
    print '{"text":"豊浦町"},';
    print '{"text":"壮瞥町"},';
    print '{"text":"白老町"},';
    print '{"text":"厚真町"},';
    print '{"text":"洞爺湖町"},';
    print '{"text":"安平町"},';
    print '{"text":"むかわ町"},';
    print '{"text":"日高町"},';
    print '{"text":"平取町"},';
    print '{"text":"新冠町"},';
    print '{"text":"浦河町"},';
    print '{"text":"様似町"},';
    print '{"text":"えりも町"},';
    print '{"text":"新ひだか町"},';
    print '{"text":"音更町"},';
    print '{"text":"士幌町"},';
    print '{"text":"上士幌町"},';
    print '{"text":"鹿追町"},';
    print '{"text":"新得町"},';
    print '{"text":"清水町"},';
    print '{"text":"芽室町"},';
    print '{"text":"中札内村"},';
    print '{"text":"更別村"},';
    print '{"text":"大樹町"},';
    print '{"text":"広尾町"},';
    print '{"text":"幕別町"},';
    print '{"text":"池田町"},';
    print '{"text":"豊頃町"},';
    print '{"text":"本別町"},';
    print '{"text":"足寄町"},';
    print '{"text":"陸別町"},';
    print '{"text":"浦幌町"},';
    print '{"text":"釧路町"},';
    print '{"text":"厚岸町"},';
    print '{"text":"浜中町"},';
    print '{"text":"標茶町"},';
    print '{"text":"弟子屈町"},';
    print '{"text":"鶴居村"},';
    print '{"text":"白糠町"},';
    print '{"text":"別海町"},';
    print '{"text":"中標津町"},';
    print '{"text":"標津町"},';
    print '{"text":"羅臼町"},';
    print '{"text":"色丹村"},';
    print '{"text":"泊村"},';
    print '{"text":"留夜別村"},';
    print '{"text":"留別村"},';
    print '{"text":"紗那村"},';
    print '{"text":"蘂取村"}';

    print ']';

}elseif($post['area_cd']=="02"){//青森県

    print '[';

    print '{"text":"青森市"},';
    print '{"text":"弘前市"},';
    print '{"text":"八戸市"},';
    print '{"text":"黒石市"},';
    print '{"text":"五所川原市"},';
    print '{"text":"十和田市"},';
    print '{"text":"三沢市"},';
    print '{"text":"むつ市"},';
    print '{"text":"つがる市"},';
    print '{"text":"平川市"},';
    print '{"text":"平内町"},';
    print '{"text":"今別町"},';
    print '{"text":"蓬田村"},';
    print '{"text":"外ヶ浜町"},';
    print '{"text":"鰺ヶ沢町"},';
    print '{"text":"深浦町"},';
    print '{"text":"西目屋村"},';
    print '{"text":"藤崎町"},';
    print '{"text":"大鰐町"},';
    print '{"text":"田舎館村"},';
    print '{"text":"板柳町"},';
    print '{"text":"鶴田町"},';
    print '{"text":"中泊町"},';
    print '{"text":"野辺地町"},';
    print '{"text":"七戸町"},';
    print '{"text":"六戸町"},';
    print '{"text":"横浜町"},';
    print '{"text":"東北町"},';
    print '{"text":"六ヶ所村"},';
    print '{"text":"おいらせ町"},';
    print '{"text":"大間町"},';
    print '{"text":"東通村"},';
    print '{"text":"風間浦村"},';
    print '{"text":"佐井村"},';
    print '{"text":"三戸町"},';
    print '{"text":"五戸町"},';
    print '{"text":"田子町"},';
    print '{"text":"南部町"},';
    print '{"text":"階上町"},';
    print '{"text":"新郷村"}';
    
    print ']';

}elseif($post['area_cd']=="03"){//岩手県

    print '[';

    print '{"text":"盛岡市"},';
    print '{"text":"宮古市"},';
    print '{"text":"大船渡市"},';
    print '{"text":"花巻市"},';
    print '{"text":"北上市"},';
    print '{"text":"久慈市"},';
    print '{"text":"遠野市"},';
    print '{"text":"一関市"},';
    print '{"text":"陸前高田市"},';
    print '{"text":"釜石市"},';
    print '{"text":"二戸市"},';
    print '{"text":"八幡平市"},';
    print '{"text":"奥州市"},';
    print '{"text":"滝沢市"},';
    print '{"text":"雫石町"},';
    print '{"text":"葛巻町"},';
    print '{"text":"岩手町"},';
    print '{"text":"紫波町"},';
    print '{"text":"矢巾町"},';
    print '{"text":"西和賀町"},';
    print '{"text":"金ケ崎町"},';
    print '{"text":"平泉町"},';
    print '{"text":"住田町"},';
    print '{"text":"大槌町"},';
    print '{"text":"山田町"},';
    print '{"text":"岩泉町"},';
    print '{"text":"田野畑村"},';
    print '{"text":"普代村"},';
    print '{"text":"軽米町"},';
    print '{"text":"野田村"},';
    print '{"text":"九戸村"},';
    print '{"text":"洋野町"},';
    print '{"text":"一戸町"}';
    
    print ']';

}elseif($post['area_cd']=="04"){//宮城県

    print '[';

    print '{"text":"仙台市"},';
    print '{"text":"石巻市"},';
    print '{"text":"塩竈市"},';
    print '{"text":"気仙沼市"},';
    print '{"text":"白石市"},';
    print '{"text":"名取市"},';
    print '{"text":"角田市"},';
    print '{"text":"多賀城市"},';
    print '{"text":"岩沼市"},';
    print '{"text":"登米市"},';
    print '{"text":"栗原市"},';
    print '{"text":"東松島市"},';
    print '{"text":"大崎市"},';
    print '{"text":"富谷市"},';
    print '{"text":"蔵王町"},';
    print '{"text":"七ヶ宿町"},';
    print '{"text":"大河原町"},';
    print '{"text":"村田町"},';
    print '{"text":"柴田町"},';
    print '{"text":"川崎町"},';
    print '{"text":"丸森町"},';
    print '{"text":"亘理町"},';
    print '{"text":"山元町"},';
    print '{"text":"松島町"},';
    print '{"text":"七ヶ浜町"},';
    print '{"text":"利府町"},';
    print '{"text":"大和町"},';
    print '{"text":"大郷町"},';
    print '{"text":"大衡村"},';
    print '{"text":"色麻町"},';
    print '{"text":"加美町"},';
    print '{"text":"涌谷町"},';
    print '{"text":"美里町"},';
    print '{"text":"女川町"},';
    print '{"text":"南三陸町"}';
    
    print ']';

}elseif($post['area_cd']=="05"){//秋田県

    print '[';

    print '{"text":"秋田市"},';
    print '{"text":"能代市"},';
    print '{"text":"横手市"},';
    print '{"text":"大館市"},';
    print '{"text":"男鹿市"},';
    print '{"text":"湯沢市"},';
    print '{"text":"鹿角市"},';
    print '{"text":"由利本荘市"},';
    print '{"text":"潟上市"},';
    print '{"text":"大仙市"},';
    print '{"text":"北秋田市"},';
    print '{"text":"にかほ市"},';
    print '{"text":"仙北市"},';
    print '{"text":"小坂町"},';
    print '{"text":"上小阿仁村"},';
    print '{"text":"藤里町"},';
    print '{"text":"三種町"},';
    print '{"text":"八峰町"},';
    print '{"text":"五城目町"},';
    print '{"text":"八郎潟町"},';
    print '{"text":"井川町"},';
    print '{"text":"大潟村"},';
    print '{"text":"美郷町"},';
    print '{"text":"羽後町"},';
    print '{"text":"東成瀬村"}';

    print ']';

}elseif($post['area_cd']=="06"){//山形県

    print '[';
    print '{"text":"山形市"},';
    print '{"text":"米沢市"},';
    print '{"text":"鶴岡市"},';
    print '{"text":"酒田市"},';
    print '{"text":"新庄市"},';
    print '{"text":"寒河江市"},';
    print '{"text":"上山市"},';
    print '{"text":"村山市"},';
    print '{"text":"長井市"},';
    print '{"text":"天童市"},';
    print '{"text":"東根市"},';
    print '{"text":"尾花沢市"},';
    print '{"text":"南陽市"},';
    print '{"text":"山辺町"},';
    print '{"text":"中山町"},';
    print '{"text":"河北町"},';
    print '{"text":"西川町"},';
    print '{"text":"朝日町"},';
    print '{"text":"大江町"},';
    print '{"text":"大石田町"},';
    print '{"text":"金山町"},';
    print '{"text":"最上町"},';
    print '{"text":"舟形町"},';
    print '{"text":"真室川町"},';
    print '{"text":"大蔵村"},';
    print '{"text":"鮭川村"},';
    print '{"text":"戸沢村"},';
    print '{"text":"高畠町"},';
    print '{"text":"川西町"},';
    print '{"text":"小国町"},';
    print '{"text":"白鷹町"},';
    print '{"text":"飯豊町"},';
    print '{"text":"三川町"},';
    print '{"text":"庄内町"},';
    print '{"text":"遊佐町"}';
    
    print ']';

}elseif($post['area_cd']=="07"){//福島県

    print '[';

    print '{"text":"福島市"},';
    print '{"text":"会津若松市"},';
    print '{"text":"郡山市"},';
    print '{"text":"いわき市"},';
    print '{"text":"白河市"},';
    print '{"text":"須賀川市"},';
    print '{"text":"喜多方市"},';
    print '{"text":"相馬市"},';
    print '{"text":"二本松市"},';
    print '{"text":"田村市"},';
    print '{"text":"南相馬市"},';
    print '{"text":"伊達市"},';
    print '{"text":"本宮市"},';
    print '{"text":"桑折町"},';
    print '{"text":"国見町"},';
    print '{"text":"川俣町"},';
    print '{"text":"大玉村"},';
    print '{"text":"鏡石町"},';
    print '{"text":"天栄村"},';
    print '{"text":"下郷町"},';
    print '{"text":"檜枝岐村"},';
    print '{"text":"只見町"},';
    print '{"text":"南会津町"},';
    print '{"text":"北塩原村"},';
    print '{"text":"西会津町"},';
    print '{"text":"磐梯町"},';
    print '{"text":"猪苗代町"},';
    print '{"text":"会津坂下町"},';
    print '{"text":"湯川村"},';
    print '{"text":"柳津町"},';
    print '{"text":"三島町"},';
    print '{"text":"金山町"},';
    print '{"text":"昭和村"},';
    print '{"text":"会津美里町"},';
    print '{"text":"西郷村"},';
    print '{"text":"泉崎村"},';
    print '{"text":"中島村"},';
    print '{"text":"矢吹町"},';
    print '{"text":"棚倉町"},';
    print '{"text":"矢祭町"},';
    print '{"text":"塙町"},';
    print '{"text":"鮫川村"},';
    print '{"text":"石川町"},';
    print '{"text":"玉川村"},';
    print '{"text":"平田村"},';
    print '{"text":"浅川町"},';
    print '{"text":"古殿町"},';
    print '{"text":"三春町"},';
    print '{"text":"小野町"},';
    print '{"text":"広野町"},';
    print '{"text":"楢葉町"},';
    print '{"text":"富岡町"},';
    print '{"text":"川内村"},';
    print '{"text":"大熊町"},';
    print '{"text":"双葉町"},';
    print '{"text":"浪江町"},';
    print '{"text":"葛尾村"},';
    print '{"text":"新地町"},';
    print '{"text":"飯舘村"}';
    
    print ']';

}elseif($post['area_cd']=="08"){//茨城県

    print '[';

    print '{"text":"水戸市"},';
    print '{"text":"日立市"},';
    print '{"text":"土浦市"},';
    print '{"text":"古河市"},';
    print '{"text":"石岡市"},';
    print '{"text":"結城市"},';
    print '{"text":"龍ケ崎市"},';
    print '{"text":"下妻市"},';
    print '{"text":"常総市"},';
    print '{"text":"常陸太田市"},';
    print '{"text":"高萩市"},';
    print '{"text":"北茨城市"},';
    print '{"text":"笠間市"},';
    print '{"text":"取手市"},';
    print '{"text":"牛久市"},';
    print '{"text":"つくば市"},';
    print '{"text":"ひたちなか市"},';
    print '{"text":"鹿嶋市"},';
    print '{"text":"潮来市"},';
    print '{"text":"守谷市"},';
    print '{"text":"常陸大宮市"},';
    print '{"text":"那珂市"},';
    print '{"text":"筑西市"},';
    print '{"text":"坂東市"},';
    print '{"text":"稲敷市"},';
    print '{"text":"かすみがうら市"},';
    print '{"text":"桜川市"},';
    print '{"text":"神栖市"},';
    print '{"text":"行方市"},';
    print '{"text":"鉾田市"},';
    print '{"text":"つくばみらい市"},';
    print '{"text":"小美玉市"},';
    print '{"text":"茨城町"},';
    print '{"text":"大洗町"},';
    print '{"text":"城里町"},';
    print '{"text":"東海村"},';
    print '{"text":"大子町"},';
    print '{"text":"美浦村"},';
    print '{"text":"阿見町"},';
    print '{"text":"河内町"},';
    print '{"text":"八千代町"},';
    print '{"text":"五霞町"},';
    print '{"text":"境町"},';
    print '{"text":"利根町"}';
    
    print ']';

}elseif($post['area_cd']=="09"){//栃木県

    print '[';

    print '{"text":"宇都宮市"},';
    print '{"text":"足利市"},';
    print '{"text":"栃木市"},';
    print '{"text":"佐野市"},';
    print '{"text":"鹿沼市"},';
    print '{"text":"日光市"},';
    print '{"text":"小山市"},';
    print '{"text":"真岡市"},';
    print '{"text":"大田原市"},';
    print '{"text":"矢板市"},';
    print '{"text":"那須塩原市"},';
    print '{"text":"さくら市"},';
    print '{"text":"那須烏山市"},';
    print '{"text":"下野市"},';
    print '{"text":"上三川町"},';
    print '{"text":"益子町"},';
    print '{"text":"茂木町"},';
    print '{"text":"市貝町"},';
    print '{"text":"芳賀町"},';
    print '{"text":"壬生町"},';
    print '{"text":"野木町"},';
    print '{"text":"塩谷町"},';
    print '{"text":"高根沢町"},';
    print '{"text":"那須町"},';
    print '{"text":"那珂川町"}';
    
    print ']';

}elseif($post['area_cd']=="10"){//群馬県

    print '[';

    print '{"text":"前橋市"},';
    print '{"text":"高崎市"},';
    print '{"text":"桐生市"},';
    print '{"text":"伊勢崎市"},';
    print '{"text":"太田市"},';
    print '{"text":"沼田市"},';
    print '{"text":"館林市"},';
    print '{"text":"渋川市"},';
    print '{"text":"藤岡市"},';
    print '{"text":"富岡市"},';
    print '{"text":"安中市"},';
    print '{"text":"みどり市"},';
    print '{"text":"榛東村"},';
    print '{"text":"吉岡町"},';
    print '{"text":"上野村"},';
    print '{"text":"神流町"},';
    print '{"text":"下仁田町"},';
    print '{"text":"南牧村"},';
    print '{"text":"甘楽町"},';
    print '{"text":"中之条町"},';
    print '{"text":"長野原町"},';
    print '{"text":"嬬恋村"},';
    print '{"text":"草津町"},';
    print '{"text":"高山村"},';
    print '{"text":"東吾妻町"},';
    print '{"text":"片品村"},';
    print '{"text":"川場村"},';
    print '{"text":"昭和村"},';
    print '{"text":"みなかみ町"},';
    print '{"text":"玉村町"},';
    print '{"text":"板倉町"},';
    print '{"text":"明和町"},';
    print '{"text":"千代田町"},';
    print '{"text":"大泉町"},';
    print '{"text":"邑楽町"}';
    
    print ']';        

}elseif($post['area_cd']=="11"){//埼玉県

    print '[';

    print '{"text":"さいたま市"},';
    print '{"text":"川越市"},';
    print '{"text":"熊谷市"},';
    print '{"text":"川口市"},';
    print '{"text":"行田市"},';
    print '{"text":"秩父市"},';
    print '{"text":"所沢市"},';
    print '{"text":"飯能市"},';
    print '{"text":"加須市"},';
    print '{"text":"本庄市"},';
    print '{"text":"東松山市"},';
    print '{"text":"春日部市"},';
    print '{"text":"狭山市"},';
    print '{"text":"羽生市"},';
    print '{"text":"鴻巣市"},';
    print '{"text":"深谷市"},';
    print '{"text":"上尾市"},';
    print '{"text":"草加市"},';
    print '{"text":"越谷市"},';
    print '{"text":"蕨市"},';
    print '{"text":"戸田市"},';
    print '{"text":"入間市"},';
    print '{"text":"朝霞市"},';
    print '{"text":"志木市"},';
    print '{"text":"和光市"},';
    print '{"text":"新座市"},';
    print '{"text":"桶川市"},';
    print '{"text":"久喜市"},';
    print '{"text":"北本市"},';
    print '{"text":"八潮市"},';
    print '{"text":"富士見市"},';
    print '{"text":"三郷市"},';
    print '{"text":"蓮田市"},';
    print '{"text":"坂戸市"},';
    print '{"text":"幸手市"},';
    print '{"text":"鶴ヶ島市"},';
    print '{"text":"日高市"},';
    print '{"text":"吉川市"},';
    print '{"text":"ふじみ野市"},';
    print '{"text":"白岡市"},';
    print '{"text":"伊奈町"},';
    print '{"text":"三芳町"},';
    print '{"text":"毛呂山町"},';
    print '{"text":"越生町"},';
    print '{"text":"滑川町"},';
    print '{"text":"嵐山町"},';
    print '{"text":"小川町"},';
    print '{"text":"川島町"},';
    print '{"text":"吉見町"},';
    print '{"text":"鳩山町"},';
    print '{"text":"ときがわ町"},';
    print '{"text":"横瀬町"},';
    print '{"text":"皆野町"},';
    print '{"text":"長瀞町"},';
    print '{"text":"小鹿野町"},';
    print '{"text":"東秩父村"},';
    print '{"text":"美里町"},';
    print '{"text":"神川町"},';
    print '{"text":"上里町"},';
    print '{"text":"寄居町"},';
    print '{"text":"宮代町"},';
    print '{"text":"杉戸町"},';
    print '{"text":"松伏町"}';
    
    print ']';

}elseif($post['area_cd']=="12"){//千葉県

    print '[';

    print '{"text":"千葉市"},';
    print '{"text":"銚子市"},';
    print '{"text":"市川市"},';
    print '{"text":"船橋市"},';
    print '{"text":"館山市"},';
    print '{"text":"木更津市"},';
    print '{"text":"松戸市"},';
    print '{"text":"野田市"},';
    print '{"text":"茂原市"},';
    print '{"text":"成田市"},';
    print '{"text":"佐倉市"},';
    print '{"text":"東金市"},';
    print '{"text":"旭市"},';
    print '{"text":"習志野市"},';
    print '{"text":"柏市"},';
    print '{"text":"勝浦市"},';
    print '{"text":"市原市"},';
    print '{"text":"流山市"},';
    print '{"text":"八千代市"},';
    print '{"text":"我孫子市"},';
    print '{"text":"鴨川市"},';
    print '{"text":"鎌ケ谷市"},';
    print '{"text":"君津市"},';
    print '{"text":"富津市"},';
    print '{"text":"浦安市"},';
    print '{"text":"四街道市"},';
    print '{"text":"袖ケ浦市"},';
    print '{"text":"八街市"},';
    print '{"text":"印西市"},';
    print '{"text":"白井市"},';
    print '{"text":"富里市"},';
    print '{"text":"南房総市"},';
    print '{"text":"匝瑳市"},';
    print '{"text":"香取市"},';
    print '{"text":"山武市"},';
    print '{"text":"いすみ市"},';
    print '{"text":"大網白里市"},';
    print '{"text":"酒々井町"},';
    print '{"text":"栄町"},';
    print '{"text":"神崎町"},';
    print '{"text":"多古町"},';
    print '{"text":"東庄町"},';
    print '{"text":"九十九里町"},';
    print '{"text":"芝山町"},';
    print '{"text":"横芝光町"},';
    print '{"text":"一宮町"},';
    print '{"text":"睦沢町"},';
    print '{"text":"長生村"},';
    print '{"text":"白子町"},';
    print '{"text":"長柄町"},';
    print '{"text":"長南町"},';
    print '{"text":"大多喜町"},';
    print '{"text":"御宿町"},';
    print '{"text":"鋸南町"}';
    
    print ']';

}elseif($post['area_cd']=="13"){//東京都

    print '[';

    print '{"text":"千代田区"},';
    print '{"text":"中央区"},';
    print '{"text":"港区"},';
    print '{"text":"新宿区"},';
    print '{"text":"文京区"},';
    print '{"text":"台東区"},';
    print '{"text":"墨田区"},';
    print '{"text":"江東区"},';
    print '{"text":"品川区"},';
    print '{"text":"目黒区"},';
    print '{"text":"大田区"},';
    print '{"text":"世田谷区"},';
    print '{"text":"渋谷区"},';
    print '{"text":"中野区"},';
    print '{"text":"杉並区"},';
    print '{"text":"豊島区"},';
    print '{"text":"北区"},';
    print '{"text":"荒川区"},';
    print '{"text":"板橋区"},';
    print '{"text":"練馬区"},';
    print '{"text":"足立区"},';
    print '{"text":"葛飾区"},';
    print '{"text":"江戸川区"},';
    print '{"text":"八王子市"},';
    print '{"text":"立川市"},';
    print '{"text":"武蔵野市"},';
    print '{"text":"三鷹市"},';
    print '{"text":"青梅市"},';
    print '{"text":"府中市"},';
    print '{"text":"昭島市"},';
    print '{"text":"調布市"},';
    print '{"text":"町田市"},';
    print '{"text":"小金井市"},';
    print '{"text":"小平市"},';
    print '{"text":"日野市"},';
    print '{"text":"東村山市"},';
    print '{"text":"国分寺市"},';
    print '{"text":"国立市"},';
    print '{"text":"福生市"},';
    print '{"text":"狛江市"},';
    print '{"text":"東大和市"},';
    print '{"text":"清瀬市"},';
    print '{"text":"東久留米市"},';
    print '{"text":"武蔵村山市"},';
    print '{"text":"多摩市"},';
    print '{"text":"稲城市"},';
    print '{"text":"羽村市"},';
    print '{"text":"あきる野市"},';
    print '{"text":"西東京市"},';
    print '{"text":"瑞穂町"},';
    print '{"text":"日の出町"},';
    print '{"text":"檜原村"},';
    print '{"text":"奥多摩町"},';
    print '{"text":"大島町"},';
    print '{"text":"利島村"},';
    print '{"text":"新島村"},';
    print '{"text":"神津島村"},';
    print '{"text":"三宅村"},';
    print '{"text":"御蔵島村"},';
    print '{"text":"八丈町"},';
    print '{"text":"青ヶ島村"},';
    print '{"text":"小笠原村"}';
    
    print ']';

}elseif($post['area_cd']=="14"){//神奈川県

    print '[';

    print '{"text":"横浜市"},';
    print '{"text":"川崎市"},';
    print '{"text":"相模原市"},';
    print '{"text":"横須賀市"},';
    print '{"text":"平塚市"},';
    print '{"text":"鎌倉市"},';
    print '{"text":"藤沢市"},';
    print '{"text":"小田原市"},';
    print '{"text":"茅ヶ崎市"},';
    print '{"text":"逗子市"},';
    print '{"text":"三浦市"},';
    print '{"text":"秦野市"},';
    print '{"text":"厚木市"},';
    print '{"text":"大和市"},';
    print '{"text":"伊勢原市"},';
    print '{"text":"海老名市"},';
    print '{"text":"座間市"},';
    print '{"text":"南足柄市"},';
    print '{"text":"綾瀬市"},';
    print '{"text":"葉山町"},';
    print '{"text":"寒川町"},';
    print '{"text":"大磯町"},';
    print '{"text":"二宮町"},';
    print '{"text":"中井町"},';
    print '{"text":"大井町"},';
    print '{"text":"松田町"},';
    print '{"text":"山北町"},';
    print '{"text":"開成町"},';
    print '{"text":"箱根町"},';
    print '{"text":"真鶴町"},';
    print '{"text":"湯河原町"},';
    print '{"text":"愛川町"},';
    print '{"text":"清川村"}';
    
    print ']';

}elseif($post['area_cd']=="15"){//新潟県

    print '[';

    print '{"text":"新潟市"},';
    print '{"text":"長岡市"},';
    print '{"text":"三条市"},';
    print '{"text":"柏崎市"},';
    print '{"text":"新発田市"},';
    print '{"text":"小千谷市"},';
    print '{"text":"加茂市"},';
    print '{"text":"十日町市"},';
    print '{"text":"見附市"},';
    print '{"text":"村上市"},';
    print '{"text":"燕市"},';
    print '{"text":"糸魚川市"},';
    print '{"text":"妙高市"},';
    print '{"text":"五泉市"},';
    print '{"text":"上越市"},';
    print '{"text":"阿賀野市"},';
    print '{"text":"佐渡市"},';
    print '{"text":"魚沼市"},';
    print '{"text":"南魚沼市"},';
    print '{"text":"胎内市"},';
    print '{"text":"聖籠町"},';
    print '{"text":"弥彦村"},';
    print '{"text":"田上町"},';
    print '{"text":"阿賀町"},';
    print '{"text":"出雲崎町"},';
    print '{"text":"湯沢町"},';
    print '{"text":"津南町"},';
    print '{"text":"刈羽村"},';
    print '{"text":"関川村"},';
    print '{"text":"粟島浦村"}';
    
    print ']';

}elseif($post['area_cd']=="16"){//富山県

    print '[';

    print '{"text":"富山市"},';
    print '{"text":"高岡市"},';
    print '{"text":"魚津市"},';
    print '{"text":"氷見市"},';
    print '{"text":"滑川市"},';
    print '{"text":"黒部市"},';
    print '{"text":"砺波市"},';
    print '{"text":"小矢部市"},';
    print '{"text":"南砺市"},';
    print '{"text":"射水市"},';
    print '{"text":"舟橋村"},';
    print '{"text":"上市町"},';
    print '{"text":"立山町"},';
    print '{"text":"入善町"},';
    print '{"text":"朝日町"}';
    
    print ']';

}elseif($post['area_cd']=="17"){//石川県

    print '[';

    print '{"text":"金沢市"},';
    print '{"text":"七尾市"},';
    print '{"text":"小松市"},';
    print '{"text":"輪島市"},';
    print '{"text":"珠洲市"},';
    print '{"text":"加賀市"},';
    print '{"text":"羽咋市"},';
    print '{"text":"かほく市"},';
    print '{"text":"白山市"},';
    print '{"text":"能美市"},';
    print '{"text":"野々市市"},';
    print '{"text":"川北町"},';
    print '{"text":"津幡町"},';
    print '{"text":"内灘町"},';
    print '{"text":"志賀町"},';
    print '{"text":"宝達志水町"},';
    print '{"text":"中能登町"},';
    print '{"text":"穴水町"},';
    print '{"text":"能登町"}';
    
    print ']';

}elseif($post['area_cd']=="18"){//福井県

    print '[';

    print '{"text":"福井市"},';
    print '{"text":"敦賀市"},';
    print '{"text":"小浜市"},';
    print '{"text":"大野市"},';
    print '{"text":"勝山市"},';
    print '{"text":"鯖江市"},';
    print '{"text":"あわら市"},';
    print '{"text":"越前市"},';
    print '{"text":"坂井市"},';
    print '{"text":"永平寺町"},';
    print '{"text":"池田町"},';
    print '{"text":"南越前町"},';
    print '{"text":"越前町"},';
    print '{"text":"美浜町"},';
    print '{"text":"高浜町"},';
    print '{"text":"おおい町"},';
    print '{"text":"若狭町"}';
    
    print ']';

}elseif($post['area_cd']=="19"){//山梨県

    print '[';

    print '{"text":"甲府市"},';
    print '{"text":"富士吉田市"},';
    print '{"text":"都留市"},';
    print '{"text":"山梨市"},';
    print '{"text":"大月市"},';
    print '{"text":"韮崎市"},';
    print '{"text":"南アルプス市"},';
    print '{"text":"北杜市"},';
    print '{"text":"甲斐市"},';
    print '{"text":"笛吹市"},';
    print '{"text":"上野原市"},';
    print '{"text":"甲州市"},';
    print '{"text":"中央市"},';
    print '{"text":"市川三郷町"},';
    print '{"text":"早川町"},';
    print '{"text":"身延町"},';
    print '{"text":"南部町"},';
    print '{"text":"富士川町"},';
    print '{"text":"昭和町"},';
    print '{"text":"道志村"},';
    print '{"text":"西桂町"},';
    print '{"text":"忍野村"},';
    print '{"text":"山中湖村"},';
    print '{"text":"鳴沢村"},';
    print '{"text":"富士河口湖町"},';
    print '{"text":"小菅村"},';
    print '{"text":"丹波山村"}';
    
    print ']';

}elseif($post['area_cd']=="20"){//長野県

    print '[';

    print '{"text":"長野市"},';
    print '{"text":"松本市"},';
    print '{"text":"上田市"},';
    print '{"text":"岡谷市"},';
    print '{"text":"飯田市"},';
    print '{"text":"諏訪市"},';
    print '{"text":"須坂市"},';
    print '{"text":"小諸市"},';
    print '{"text":"伊那市"},';
    print '{"text":"駒ヶ根市"},';
    print '{"text":"中野市"},';
    print '{"text":"大町市"},';
    print '{"text":"飯山市"},';
    print '{"text":"茅野市"},';
    print '{"text":"塩尻市"},';
    print '{"text":"佐久市"},';
    print '{"text":"千曲市"},';
    print '{"text":"東御市"},';
    print '{"text":"安曇野市"},';
    print '{"text":"小海町"},';
    print '{"text":"川上村"},';
    print '{"text":"南牧村"},';
    print '{"text":"南相木村"},';
    print '{"text":"北相木村"},';
    print '{"text":"佐久穂町"},';
    print '{"text":"軽井沢町"},';
    print '{"text":"御代田町"},';
    print '{"text":"立科町"},';
    print '{"text":"青木村"},';
    print '{"text":"長和町"},';
    print '{"text":"下諏訪町"},';
    print '{"text":"富士見町"},';
    print '{"text":"原村"},';
    print '{"text":"辰野町"},';
    print '{"text":"箕輪町"},';
    print '{"text":"飯島町"},';
    print '{"text":"南箕輪村"},';
    print '{"text":"中川村"},';
    print '{"text":"宮田村"},';
    print '{"text":"松川町"},';
    print '{"text":"高森町"},';
    print '{"text":"阿南町"},';
    print '{"text":"阿智村"},';
    print '{"text":"平谷村"},';
    print '{"text":"根羽村"},';
    print '{"text":"下條村"},';
    print '{"text":"売木村"},';
    print '{"text":"天龍村"},';
    print '{"text":"泰阜村"},';
    print '{"text":"喬木村"},';
    print '{"text":"豊丘村"},';
    print '{"text":"大鹿村"},';
    print '{"text":"上松町"},';
    print '{"text":"南木曽町"},';
    print '{"text":"木祖村"},';
    print '{"text":"王滝村"},';
    print '{"text":"大桑村"},';
    print '{"text":"木曽町"},';
    print '{"text":"麻績村"},';
    print '{"text":"生坂村"},';
    print '{"text":"山形村"},';
    print '{"text":"朝日村"},';
    print '{"text":"筑北村"},';
    print '{"text":"池田町"},';
    print '{"text":"松川村"},';
    print '{"text":"白馬村"},';
    print '{"text":"小谷村"},';
    print '{"text":"坂城町"},';
    print '{"text":"小布施町"},';
    print '{"text":"高山村"},';
    print '{"text":"山ノ内町"},';
    print '{"text":"木島平村"},';
    print '{"text":"野沢温泉村"},';
    print '{"text":"信濃町"},';
    print '{"text":"小川村"},';
    print '{"text":"飯綱町"},';
    print '{"text":"栄村"}';
    
    print ']';

}elseif($post['area_cd']=="21"){//岐阜県

    print '[';

    print '{"text":"岐阜市"},';
    print '{"text":"大垣市"},';
    print '{"text":"高山市"},';
    print '{"text":"多治見市"},';
    print '{"text":"関市"},';
    print '{"text":"中津川市"},';
    print '{"text":"美濃市"},';
    print '{"text":"瑞浪市"},';
    print '{"text":"羽島市"},';
    print '{"text":"恵那市"},';
    print '{"text":"美濃加茂市"},';
    print '{"text":"土岐市"},';
    print '{"text":"各務原市"},';
    print '{"text":"可児市"},';
    print '{"text":"山県市"},';
    print '{"text":"瑞穂市"},';
    print '{"text":"飛騨市"},';
    print '{"text":"本巣市"},';
    print '{"text":"郡上市"},';
    print '{"text":"下呂市"},';
    print '{"text":"海津市"},';
    print '{"text":"岐南町"},';
    print '{"text":"笠松町"},';
    print '{"text":"養老町"},';
    print '{"text":"垂井町"},';
    print '{"text":"関ケ原町"},';
    print '{"text":"神戸町"},';
    print '{"text":"輪之内町"},';
    print '{"text":"安八町"},';
    print '{"text":"揖斐川町"},';
    print '{"text":"大野町"},';
    print '{"text":"池田町"},';
    print '{"text":"北方町"},';
    print '{"text":"坂祝町"},';
    print '{"text":"富加町"},';
    print '{"text":"川辺町"},';
    print '{"text":"七宗町"},';
    print '{"text":"八百津町"},';
    print '{"text":"白川町"},';
    print '{"text":"東白川村"},';
    print '{"text":"御嵩町"},';
    print '{"text":"白川村"}';
    
    print ']';

}elseif($post['area_cd']=="22"){//静岡県

    print '[';

    print '{"text":"静岡市"},';
    print '{"text":"浜松市"},';
    print '{"text":"沼津市"},';
    print '{"text":"熱海市"},';
    print '{"text":"三島市"},';
    print '{"text":"富士宮市"},';
    print '{"text":"伊東市"},';
    print '{"text":"島田市"},';
    print '{"text":"富士市"},';
    print '{"text":"磐田市"},';
    print '{"text":"焼津市"},';
    print '{"text":"掛川市"},';
    print '{"text":"藤枝市"},';
    print '{"text":"御殿場市"},';
    print '{"text":"袋井市"},';
    print '{"text":"下田市"},';
    print '{"text":"裾野市"},';
    print '{"text":"湖西市"},';
    print '{"text":"伊豆市"},';
    print '{"text":"御前崎市"},';
    print '{"text":"菊川市"},';
    print '{"text":"伊豆の国市"},';
    print '{"text":"牧之原市"},';
    print '{"text":"東伊豆町"},';
    print '{"text":"河津町"},';
    print '{"text":"南伊豆町"},';
    print '{"text":"松崎町"},';
    print '{"text":"西伊豆町"},';
    print '{"text":"函南町"},';
    print '{"text":"清水町"},';
    print '{"text":"長泉町"},';
    print '{"text":"小山町"},';
    print '{"text":"吉田町"},';
    print '{"text":"川根本町"},';
    print '{"text":"森町"}';
    
    print ']';

}elseif($post['area_cd']=="23"){//愛知県

    print '[';

    print '{"text":"名古屋市"},';
    print '{"text":"豊橋市"},';
    print '{"text":"岡崎市"},';
    print '{"text":"一宮市"},';
    print '{"text":"瀬戸市"},';
    print '{"text":"半田市"},';
    print '{"text":"春日井市"},';
    print '{"text":"豊川市"},';
    print '{"text":"津島市"},';
    print '{"text":"碧南市"},';
    print '{"text":"刈谷市"},';
    print '{"text":"豊田市"},';
    print '{"text":"安城市"},';
    print '{"text":"西尾市"},';
    print '{"text":"蒲郡市"},';
    print '{"text":"犬山市"},';
    print '{"text":"常滑市"},';
    print '{"text":"江南市"},';
    print '{"text":"小牧市"},';
    print '{"text":"稲沢市"},';
    print '{"text":"新城市"},';
    print '{"text":"東海市"},';
    print '{"text":"大府市"},';
    print '{"text":"知多市"},';
    print '{"text":"知立市"},';
    print '{"text":"尾張旭市"},';
    print '{"text":"高浜市"},';
    print '{"text":"岩倉市"},';
    print '{"text":"豊明市"},';
    print '{"text":"日進市"},';
    print '{"text":"田原市"},';
    print '{"text":"愛西市"},';
    print '{"text":"清須市"},';
    print '{"text":"北名古屋市"},';
    print '{"text":"弥富市"},';
    print '{"text":"みよし市"},';
    print '{"text":"あま市"},';
    print '{"text":"長久手市"},';
    print '{"text":"東郷町"},';
    print '{"text":"豊山町"},';
    print '{"text":"大口町"},';
    print '{"text":"扶桑町"},';
    print '{"text":"大治町"},';
    print '{"text":"蟹江町"},';
    print '{"text":"飛島村"},';
    print '{"text":"阿久比町"},';
    print '{"text":"東浦町"},';
    print '{"text":"南知多町"},';
    print '{"text":"美浜町"},';
    print '{"text":"武豊町"},';
    print '{"text":"幸田町"},';
    print '{"text":"設楽町"},';
    print '{"text":"東栄町"},';
    print '{"text":"豊根村"}';
    
    print ']';

}elseif($post['area_cd']=="24"){//三重県

    print '[';

    print '{"text":"津市"},';
    print '{"text":"四日市市"},';
    print '{"text":"伊勢市"},';
    print '{"text":"松阪市"},';
    print '{"text":"桑名市"},';
    print '{"text":"鈴鹿市"},';
    print '{"text":"名張市"},';
    print '{"text":"尾鷲市"},';
    print '{"text":"亀山市"},';
    print '{"text":"鳥羽市"},';
    print '{"text":"熊野市"},';
    print '{"text":"いなべ市"},';
    print '{"text":"志摩市"},';
    print '{"text":"伊賀市"},';
    print '{"text":"木曽岬町"},';
    print '{"text":"東員町"},';
    print '{"text":"菰野町"},';
    print '{"text":"朝日町"},';
    print '{"text":"川越町"},';
    print '{"text":"多気町"},';
    print '{"text":"明和町"},';
    print '{"text":"大台町"},';
    print '{"text":"玉城町"},';
    print '{"text":"度会町"},';
    print '{"text":"大紀町"},';
    print '{"text":"南伊勢町"},';
    print '{"text":"紀北町"},';
    print '{"text":"御浜町"},';
    print '{"text":"紀宝町"}';
    
    print ']';

}elseif($post['area_cd']=="25"){//滋賀県

    print '[';

    print '{"text":"大津市"},';
    print '{"text":"彦根市"},';
    print '{"text":"長浜市"},';
    print '{"text":"近江八幡市"},';
    print '{"text":"草津市"},';
    print '{"text":"守山市"},';
    print '{"text":"栗東市"},';
    print '{"text":"甲賀市"},';
    print '{"text":"野洲市"},';
    print '{"text":"湖南市"},';
    print '{"text":"高島市"},';
    print '{"text":"東近江市"},';
    print '{"text":"米原市"},';
    print '{"text":"日野町"},';
    print '{"text":"竜王町"},';
    print '{"text":"愛荘町"},';
    print '{"text":"豊郷町"},';
    print '{"text":"甲良町"},';
    print '{"text":"多賀町"}';
    
    print ']';

}elseif($post['area_cd']=="26"){//京都府

    print '[';

    print '{"text":"京都市"},';
    print '{"text":"福知山市"},';
    print '{"text":"舞鶴市"},';
    print '{"text":"綾部市"},';
    print '{"text":"宇治市"},';
    print '{"text":"宮津市"},';
    print '{"text":"亀岡市"},';
    print '{"text":"城陽市"},';
    print '{"text":"向日市"},';
    print '{"text":"長岡京市"},';
    print '{"text":"八幡市"},';
    print '{"text":"京田辺市"},';
    print '{"text":"京丹後市"},';
    print '{"text":"南丹市"},';
    print '{"text":"木津川市"},';
    print '{"text":"大山崎町"},';
    print '{"text":"久御山町"},';
    print '{"text":"井手町"},';
    print '{"text":"宇治田原町"},';
    print '{"text":"笠置町"},';
    print '{"text":"和束町"},';
    print '{"text":"精華町"},';
    print '{"text":"南山城村"},';
    print '{"text":"京丹波町"},';
    print '{"text":"伊根町"},';
    print '{"text":"与謝野町"}';
    
    print ']';

}elseif($post['area_cd']=="27"){//大阪府

    print '[';

    print '{"text":"大阪市"},';
    print '{"text":"堺市"},';
    print '{"text":"岸和田市"},';
    print '{"text":"豊中市"},';
    print '{"text":"池田市"},';
    print '{"text":"吹田市"},';
    print '{"text":"泉大津市"},';
    print '{"text":"高槻市"},';
    print '{"text":"貝塚市"},';
    print '{"text":"守口市"},';
    print '{"text":"枚方市"},';
    print '{"text":"茨木市"},';
    print '{"text":"八尾市"},';
    print '{"text":"泉佐野市"},';
    print '{"text":"富田林市"},';
    print '{"text":"寝屋川市"},';
    print '{"text":"河内長野市"},';
    print '{"text":"松原市"},';
    print '{"text":"大東市"},';
    print '{"text":"和泉市"},';
    print '{"text":"箕面市"},';
    print '{"text":"柏原市"},';
    print '{"text":"羽曳野市"},';
    print '{"text":"門真市"},';
    print '{"text":"摂津市"},';
    print '{"text":"高石市"},';
    print '{"text":"藤井寺市"},';
    print '{"text":"東大阪市"},';
    print '{"text":"泉南市"},';
    print '{"text":"四條畷市"},';
    print '{"text":"交野市"},';
    print '{"text":"大阪狭山市"},';
    print '{"text":"阪南市"},';
    print '{"text":"島本町"},';
    print '{"text":"豊能町"},';
    print '{"text":"能勢町"},';
    print '{"text":"忠岡町"},';
    print '{"text":"熊取町"},';
    print '{"text":"田尻町"},';
    print '{"text":"岬町"},';
    print '{"text":"太子町"},';
    print '{"text":"河南町"},';
    print '{"text":"千早赤阪村"}';
    
    print ']';

}elseif($post['area_cd']=="28"){//兵庫県

    print '[';

    print '{"text":"神戸市"},';
    print '{"text":"姫路市"},';
    print '{"text":"尼崎市"},';
    print '{"text":"明石市"},';
    print '{"text":"西宮市"},';
    print '{"text":"洲本市"},';
    print '{"text":"芦屋市"},';
    print '{"text":"伊丹市"},';
    print '{"text":"相生市"},';
    print '{"text":"豊岡市"},';
    print '{"text":"加古川市"},';
    print '{"text":"赤穂市"},';
    print '{"text":"西脇市"},';
    print '{"text":"宝塚市"},';
    print '{"text":"三木市"},';
    print '{"text":"高砂市"},';
    print '{"text":"川西市"},';
    print '{"text":"小野市"},';
    print '{"text":"三田市"},';
    print '{"text":"加西市"},';
    print '{"text":"丹波篠山市"},';
    print '{"text":"養父市"},';
    print '{"text":"丹波市"},';
    print '{"text":"南あわじ市"},';
    print '{"text":"朝来市"},';
    print '{"text":"淡路市"},';
    print '{"text":"宍粟市"},';
    print '{"text":"加東市"},';
    print '{"text":"たつの市"},';
    print '{"text":"猪名川町"},';
    print '{"text":"多可町"},';
    print '{"text":"稲美町"},';
    print '{"text":"播磨町"},';
    print '{"text":"市川町"},';
    print '{"text":"福崎町"},';
    print '{"text":"神河町"},';
    print '{"text":"太子町"},';
    print '{"text":"上郡町"},';
    print '{"text":"佐用町"},';
    print '{"text":"香美町"},';
    print '{"text":"新温泉町"}';
    
    print ']';

}elseif($post['area_cd']=="29"){//奈良県

    print '[';

    print '{"text":"奈良市"},';
    print '{"text":"大和高田市"},';
    print '{"text":"大和郡山市"},';
    print '{"text":"天理市"},';
    print '{"text":"橿原市"},';
    print '{"text":"桜井市"},';
    print '{"text":"五條市"},';
    print '{"text":"御所市"},';
    print '{"text":"生駒市"},';
    print '{"text":"香芝市"},';
    print '{"text":"葛城市"},';
    print '{"text":"宇陀市"},';
    print '{"text":"山添村"},';
    print '{"text":"平群町"},';
    print '{"text":"三郷町"},';
    print '{"text":"斑鳩町"},';
    print '{"text":"安堵町"},';
    print '{"text":"川西町"},';
    print '{"text":"三宅町"},';
    print '{"text":"田原本町"},';
    print '{"text":"曽爾村"},';
    print '{"text":"御杖村"},';
    print '{"text":"高取町"},';
    print '{"text":"明日香村"},';
    print '{"text":"上牧町"},';
    print '{"text":"王寺町"},';
    print '{"text":"広陵町"},';
    print '{"text":"河合町"},';
    print '{"text":"吉野町"},';
    print '{"text":"大淀町"},';
    print '{"text":"下市町"},';
    print '{"text":"黒滝村"},';
    print '{"text":"天川村"},';
    print '{"text":"野迫川村"},';
    print '{"text":"十津川村"},';
    print '{"text":"下北山村"},';
    print '{"text":"上北山村"},';
    print '{"text":"川上村"},';
    print '{"text":"東吉野村"}';
    
    print ']';        

}elseif($post['area_cd']=="30"){//和歌山県

    print '[';

    print '{"text":"和歌山市"},';
    print '{"text":"海南市"},';
    print '{"text":"橋本市"},';
    print '{"text":"有田市"},';
    print '{"text":"御坊市"},';
    print '{"text":"田辺市"},';
    print '{"text":"新宮市"},';
    print '{"text":"紀の川市"},';
    print '{"text":"岩出市"},';
    print '{"text":"紀美野町"},';
    print '{"text":"かつらぎ町"},';
    print '{"text":"九度山町"},';
    print '{"text":"高野町"},';
    print '{"text":"湯浅町"},';
    print '{"text":"広川町"},';
    print '{"text":"有田川町"},';
    print '{"text":"美浜町"},';
    print '{"text":"日高町"},';
    print '{"text":"由良町"},';
    print '{"text":"印南町"},';
    print '{"text":"みなべ町"},';
    print '{"text":"日高川町"},';
    print '{"text":"白浜町"},';
    print '{"text":"上富田町"},';
    print '{"text":"すさみ町"},';
    print '{"text":"那智勝浦町"},';
    print '{"text":"太地町"},';
    print '{"text":"古座川町"},';
    print '{"text":"北山村"},';
    print '{"text":"串本町"}';
    
    print ']';

}elseif($post['area_cd']=="31"){//鳥取県

    print '[';

    print '{"text":"鳥取市"},';
    print '{"text":"米子市"},';
    print '{"text":"倉吉市"},';
    print '{"text":"境港市"},';
    print '{"text":"岩美町"},';
    print '{"text":"若桜町"},';
    print '{"text":"智頭町"},';
    print '{"text":"八頭町"},';
    print '{"text":"三朝町"},';
    print '{"text":"湯梨浜町"},';
    print '{"text":"琴浦町"},';
    print '{"text":"北栄町"},';
    print '{"text":"日吉津村"},';
    print '{"text":"大山町"},';
    print '{"text":"南部町"},';
    print '{"text":"伯耆町"},';
    print '{"text":"日南町"},';
    print '{"text":"日野町"},';
    print '{"text":"江府町"}';
    
    print ']';

}elseif($post['area_cd']=="32"){//島根県

    print '[';

    print '{"text":"松江市"},';
    print '{"text":"浜田市"},';
    print '{"text":"出雲市"},';
    print '{"text":"益田市"},';
    print '{"text":"大田市"},';
    print '{"text":"安来市"},';
    print '{"text":"江津市"},';
    print '{"text":"雲南市"},';
    print '{"text":"奥出雲町"},';
    print '{"text":"飯南町"},';
    print '{"text":"川本町"},';
    print '{"text":"美郷町"},';
    print '{"text":"邑南町"},';
    print '{"text":"津和野町"},';
    print '{"text":"吉賀町"},';
    print '{"text":"海士町"},';
    print '{"text":"西ノ島町"},';
    print '{"text":"知夫村"},';
    print '{"text":"隠岐の島町"}';
    
    print ']';

}elseif($post['area_cd']=="33"){//岡山県

    print '[';

    print '{"text":"岡山市"},';
    print '{"text":"倉敷市"},';
    print '{"text":"津山市"},';
    print '{"text":"玉野市"},';
    print '{"text":"笠岡市"},';
    print '{"text":"井原市"},';
    print '{"text":"総社市"},';
    print '{"text":"高梁市"},';
    print '{"text":"新見市"},';
    print '{"text":"備前市"},';
    print '{"text":"瀬戸内市"},';
    print '{"text":"赤磐市"},';
    print '{"text":"真庭市"},';
    print '{"text":"美作市"},';
    print '{"text":"浅口市"},';
    print '{"text":"和気町"},';
    print '{"text":"早島町"},';
    print '{"text":"里庄町"},';
    print '{"text":"矢掛町"},';
    print '{"text":"新庄村"},';
    print '{"text":"鏡野町"},';
    print '{"text":"勝央町"},';
    print '{"text":"奈義町"},';
    print '{"text":"西粟倉村"},';
    print '{"text":"久米南町"},';
    print '{"text":"美咲町"},';
    print '{"text":"吉備中央町"}';
    
    print ']';

}elseif($post['area_cd']=="34"){//広島県

    print '[';

    print '{"text":"広島市"},';
    print '{"text":"呉市"},';
    print '{"text":"竹原市"},';
    print '{"text":"三原市"},';
    print '{"text":"尾道市"},';
    print '{"text":"福山市"},';
    print '{"text":"府中市"},';
    print '{"text":"三次市"},';
    print '{"text":"庄原市"},';
    print '{"text":"大竹市"},';
    print '{"text":"東広島市"},';
    print '{"text":"廿日市市"},';
    print '{"text":"安芸高田市"},';
    print '{"text":"江田島市"},';
    print '{"text":"府中町"},';
    print '{"text":"海田町"},';
    print '{"text":"熊野町"},';
    print '{"text":"坂町"},';
    print '{"text":"安芸太田町"},';
    print '{"text":"北広島町"},';
    print '{"text":"大崎上島町"},';
    print '{"text":"世羅町"},';
    print '{"text":"神石高原町"}';
    
    print ']';

}elseif($post['area_cd']=="35"){//山口県

    print '[';

    print '{"text":"下関市"},';
    print '{"text":"宇部市"},';
    print '{"text":"山口市"},';
    print '{"text":"萩市"},';
    print '{"text":"防府市"},';
    print '{"text":"下松市"},';
    print '{"text":"岩国市"},';
    print '{"text":"光市"},';
    print '{"text":"長門市"},';
    print '{"text":"柳井市"},';
    print '{"text":"美祢市"},';
    print '{"text":"周南市"},';
    print '{"text":"山陽小野田市"},';
    print '{"text":"周防大島町"},';
    print '{"text":"和木町"},';
    print '{"text":"上関町"},';
    print '{"text":"田布施町"},';
    print '{"text":"平生町"},';
    print '{"text":"阿武町"}';
    
    print ']';

}elseif($post['area_cd']=="36"){//徳島県

    print '[';

    print '{"text":"徳島市"},';
    print '{"text":"鳴門市"},';
    print '{"text":"小松島市"},';
    print '{"text":"阿南市"},';
    print '{"text":"吉野川市"},';
    print '{"text":"阿波市"},';
    print '{"text":"美馬市"},';
    print '{"text":"三好市"},';
    print '{"text":"勝浦町"},';
    print '{"text":"上勝町"},';
    print '{"text":"佐那河内村"},';
    print '{"text":"石井町"},';
    print '{"text":"神山町"},';
    print '{"text":"那賀町"},';
    print '{"text":"牟岐町"},';
    print '{"text":"美波町"},';
    print '{"text":"海陽町"},';
    print '{"text":"松茂町"},';
    print '{"text":"北島町"},';
    print '{"text":"藍住町"},';
    print '{"text":"板野町"},';
    print '{"text":"上板町"},';
    print '{"text":"つるぎ町"},';
    print '{"text":"東みよし町"}';
    
    print ']';        

}elseif($post['area_cd']=="37"){//香川県

    print '[';

    print '{"text":"高松市"},';
    print '{"text":"丸亀市"},';
    print '{"text":"坂出市"},';
    print '{"text":"善通寺市"},';
    print '{"text":"観音寺市"},';
    print '{"text":"さぬき市"},';
    print '{"text":"東かがわ市"},';
    print '{"text":"三豊市"},';
    print '{"text":"土庄町"},';
    print '{"text":"小豆島町"},';
    print '{"text":"三木町"},';
    print '{"text":"直島町"},';
    print '{"text":"宇多津町"},';
    print '{"text":"綾川町"},';
    print '{"text":"琴平町"},';
    print '{"text":"多度津町"},';
    print '{"text":"まんのう町"}';
    
    print ']';        

}elseif($post['area_cd']=="38"){//愛媛県

    print '[';

    print '{"text":"松山市"},';
    print '{"text":"今治市"},';
    print '{"text":"宇和島市"},';
    print '{"text":"八幡浜市"},';
    print '{"text":"新居浜市"},';
    print '{"text":"西条市"},';
    print '{"text":"大洲市"},';
    print '{"text":"伊予市"},';
    print '{"text":"四国中央市"},';
    print '{"text":"西予市"},';
    print '{"text":"東温市"},';
    print '{"text":"上島町"},';
    print '{"text":"久万高原町"},';
    print '{"text":"松前町"},';
    print '{"text":"砥部町"},';
    print '{"text":"内子町"},';
    print '{"text":"伊方町"},';
    print '{"text":"松野町"},';
    print '{"text":"鬼北町"},';
    print '{"text":"愛南町"}';
    
    print ']';

}elseif($post['area_cd']=="39"){//高知県

    print '[';

    print '{"text":"高知市"},';
    print '{"text":"室戸市"},';
    print '{"text":"安芸市"},';
    print '{"text":"南国市"},';
    print '{"text":"土佐市"},';
    print '{"text":"須崎市"},';
    print '{"text":"宿毛市"},';
    print '{"text":"土佐清水市"},';
    print '{"text":"四万十市"},';
    print '{"text":"香南市"},';
    print '{"text":"香美市"},';
    print '{"text":"東洋町"},';
    print '{"text":"奈半利町"},';
    print '{"text":"田野町"},';
    print '{"text":"安田町"},';
    print '{"text":"北川村"},';
    print '{"text":"馬路村"},';
    print '{"text":"芸西村"},';
    print '{"text":"本山町"},';
    print '{"text":"大豊町"},';
    print '{"text":"土佐町"},';
    print '{"text":"大川村"},';
    print '{"text":"いの町"},';
    print '{"text":"仁淀川町"},';
    print '{"text":"中土佐町"},';
    print '{"text":"佐川町"},';
    print '{"text":"越知町"},';
    print '{"text":"梼原町"},';
    print '{"text":"日高村"},';
    print '{"text":"津野町"},';
    print '{"text":"四万十町"},';
    print '{"text":"大月町"},';
    print '{"text":"三原村"},';
    print '{"text":"黒潮町"}';
    
    print ']';

}elseif($post['area_cd']=="40"){//福岡県

    print '[';

    print '{"text":"北九州市"},';
    print '{"text":"福岡市"},';
    print '{"text":"大牟田市"},';
    print '{"text":"久留米市"},';
    print '{"text":"直方市"},';
    print '{"text":"飯塚市"},';
    print '{"text":"田川市"},';
    print '{"text":"柳川市"},';
    print '{"text":"八女市"},';
    print '{"text":"筑後市"},';
    print '{"text":"大川市"},';
    print '{"text":"行橋市"},';
    print '{"text":"豊前市"},';
    print '{"text":"中間市"},';
    print '{"text":"小郡市"},';
    print '{"text":"筑紫野市"},';
    print '{"text":"春日市"},';
    print '{"text":"大野城市"},';
    print '{"text":"宗像市"},';
    print '{"text":"太宰府市"},';
    print '{"text":"古賀市"},';
    print '{"text":"福津市"},';
    print '{"text":"うきは市"},';
    print '{"text":"宮若市"},';
    print '{"text":"嘉麻市"},';
    print '{"text":"朝倉市"},';
    print '{"text":"みやま市"},';
    print '{"text":"糸島市"},';
    print '{"text":"那珂川市"},';
    print '{"text":"宇美町"},';
    print '{"text":"篠栗町"},';
    print '{"text":"志免町"},';
    print '{"text":"須恵町"},';
    print '{"text":"新宮町"},';
    print '{"text":"久山町"},';
    print '{"text":"粕屋町"},';
    print '{"text":"芦屋町"},';
    print '{"text":"水巻町"},';
    print '{"text":"岡垣町"},';
    print '{"text":"遠賀町"},';
    print '{"text":"小竹町"},';
    print '{"text":"鞍手町"},';
    print '{"text":"桂川町"},';
    print '{"text":"筑前町"},';
    print '{"text":"東峰村"},';
    print '{"text":"大刀洗町"},';
    print '{"text":"大木町"},';
    print '{"text":"広川町"},';
    print '{"text":"香春町"},';
    print '{"text":"添田町"},';
    print '{"text":"糸田町"},';
    print '{"text":"川崎町"},';
    print '{"text":"大任町"},';
    print '{"text":"赤村"},';
    print '{"text":"福智町"},';
    print '{"text":"苅田町"},';
    print '{"text":"みやこ町"},';
    print '{"text":"吉富町"},';
    print '{"text":"上毛町"},';
    print '{"text":"築上町"}';
    
    print ']';

}elseif($post['area_cd']=="41"){//佐賀県

    print '[';

    print '{"text":"佐賀市"},';
    print '{"text":"唐津市"},';
    print '{"text":"鳥栖市"},';
    print '{"text":"多久市"},';
    print '{"text":"伊万里市"},';
    print '{"text":"武雄市"},';
    print '{"text":"鹿島市"},';
    print '{"text":"小城市"},';
    print '{"text":"嬉野市"},';
    print '{"text":"神埼市"},';
    print '{"text":"吉野ヶ里町"},';
    print '{"text":"基山町"},';
    print '{"text":"上峰町"},';
    print '{"text":"みやき町"},';
    print '{"text":"玄海町"},';
    print '{"text":"有田町"},';
    print '{"text":"大町町"},';
    print '{"text":"江北町"},';
    print '{"text":"白石町"},';
    print '{"text":"太良町"}';
    
    print ']';

}elseif($post['area_cd']=="42"){//長崎県

    print '[';

    print '{"text":"長崎市"},';
    print '{"text":"佐世保市"},';
    print '{"text":"島原市"},';
    print '{"text":"諫早市"},';
    print '{"text":"大村市"},';
    print '{"text":"平戸市"},';
    print '{"text":"松浦市"},';
    print '{"text":"対馬市"},';
    print '{"text":"壱岐市"},';
    print '{"text":"五島市"},';
    print '{"text":"西海市"},';
    print '{"text":"雲仙市"},';
    print '{"text":"南島原市"},';
    print '{"text":"長与町"},';
    print '{"text":"時津町"},';
    print '{"text":"東彼杵町"},';
    print '{"text":"川棚町"},';
    print '{"text":"波佐見町"},';
    print '{"text":"小値賀町"},';
    print '{"text":"佐々町"},';
    print '{"text":"新上五島町"}';
    
    print ']';

}elseif($post['area_cd']=="43"){//熊本県

    print '[';

    print '{"text":"熊本市"},';
    print '{"text":"八代市"},';
    print '{"text":"人吉市"},';
    print '{"text":"荒尾市"},';
    print '{"text":"水俣市"},';
    print '{"text":"玉名市"},';
    print '{"text":"山鹿市"},';
    print '{"text":"菊池市"},';
    print '{"text":"宇土市"},';
    print '{"text":"上天草市"},';
    print '{"text":"宇城市"},';
    print '{"text":"阿蘇市"},';
    print '{"text":"天草市"},';
    print '{"text":"合志市"},';
    print '{"text":"美里町"},';
    print '{"text":"玉東町"},';
    print '{"text":"南関町"},';
    print '{"text":"長洲町"},';
    print '{"text":"和水町"},';
    print '{"text":"大津町"},';
    print '{"text":"菊陽町"},';
    print '{"text":"南小国町"},';
    print '{"text":"小国町"},';
    print '{"text":"産山村"},';
    print '{"text":"高森町"},';
    print '{"text":"西原村"},';
    print '{"text":"南阿蘇村"},';
    print '{"text":"御船町"},';
    print '{"text":"嘉島町"},';
    print '{"text":"益城町"},';
    print '{"text":"甲佐町"},';
    print '{"text":"山都町"},';
    print '{"text":"氷川町"},';
    print '{"text":"芦北町"},';
    print '{"text":"津奈木町"},';
    print '{"text":"錦町"},';
    print '{"text":"多良木町"},';
    print '{"text":"湯前町"},';
    print '{"text":"水上村"},';
    print '{"text":"相良村"},';
    print '{"text":"五木村"},';
    print '{"text":"山江村"},';
    print '{"text":"球磨村"},';
    print '{"text":"あさぎり町"},';
    print '{"text":"苓北町"}';
    
    print ']';

}elseif($post['area_cd']=="44"){//大分県

    print '[';

    print '{"text":"大分市"},';
    print '{"text":"別府市"},';
    print '{"text":"中津市"},';
    print '{"text":"日田市"},';
    print '{"text":"佐伯市"},';
    print '{"text":"臼杵市"},';
    print '{"text":"津久見市"},';
    print '{"text":"竹田市"},';
    print '{"text":"豊後高田市"},';
    print '{"text":"杵築市"},';
    print '{"text":"宇佐市"},';
    print '{"text":"豊後大野市"},';
    print '{"text":"由布市"},';
    print '{"text":"国東市"},';
    print '{"text":"姫島村"},';
    print '{"text":"日出町"},';
    print '{"text":"九重町"},';
    print '{"text":"玖珠町"}';
    
    print ']';

}elseif($post['area_cd']=="45"){//宮崎県

    print '[';

    print '{"text":"宮崎市"},';
    print '{"text":"都城市"},';
    print '{"text":"延岡市"},';
    print '{"text":"日南市"},';
    print '{"text":"小林市"},';
    print '{"text":"日向市"},';
    print '{"text":"串間市"},';
    print '{"text":"西都市"},';
    print '{"text":"えびの市"},';
    print '{"text":"三股町"},';
    print '{"text":"高原町"},';
    print '{"text":"国富町"},';
    print '{"text":"綾町"},';
    print '{"text":"高鍋町"},';
    print '{"text":"新富町"},';
    print '{"text":"西米良村"},';
    print '{"text":"木城町"},';
    print '{"text":"川南町"},';
    print '{"text":"都農町"},';
    print '{"text":"門川町"},';
    print '{"text":"諸塚村"},';
    print '{"text":"椎葉村"},';
    print '{"text":"美郷町"},';
    print '{"text":"高千穂町"},';
    print '{"text":"日之影町"},';
    print '{"text":"五ヶ瀬町"}';
    
    print ']';

}elseif($post['area_cd']=="46"){//鹿児島県

    print '[';

    print '{"text":"鹿児島市"},';
    print '{"text":"鹿屋市"},';
    print '{"text":"枕崎市"},';
    print '{"text":"阿久根市"},';
    print '{"text":"出水市"},';
    print '{"text":"指宿市"},';
    print '{"text":"西之表市"},';
    print '{"text":"垂水市"},';
    print '{"text":"薩摩川内市"},';
    print '{"text":"日置市"},';
    print '{"text":"曽於市"},';
    print '{"text":"霧島市"},';
    print '{"text":"いちき串木野市"},';
    print '{"text":"南さつま市"},';
    print '{"text":"志布志市"},';
    print '{"text":"奄美市"},';
    print '{"text":"南九州市"},';
    print '{"text":"伊佐市"},';
    print '{"text":"姶良市"},';
    print '{"text":"三島村"},';
    print '{"text":"十島村"},';
    print '{"text":"さつま町"},';
    print '{"text":"長島町"},';
    print '{"text":"湧水町"},';
    print '{"text":"大崎町"},';
    print '{"text":"東串良町"},';
    print '{"text":"錦江町"},';
    print '{"text":"南大隅町"},';
    print '{"text":"肝付町"},';
    print '{"text":"中種子町"},';
    print '{"text":"南種子町"},';
    print '{"text":"屋久島町"},';
    print '{"text":"大和村"},';
    print '{"text":"宇検村"},';
    print '{"text":"瀬戸内町"},';
    print '{"text":"龍郷町"},';
    print '{"text":"喜界町"},';
    print '{"text":"徳之島町"},';
    print '{"text":"天城町"},';
    print '{"text":"伊仙町"},';
    print '{"text":"和泊町"},';
    print '{"text":"知名町"},';
    print '{"text":"与論町"}';
    
    print ']';

}elseif($post['area_cd']=="47"){//沖縄県

    print '[';

    print '{"text":"那覇市"},';
    print '{"text":"宜野湾市"},';
    print '{"text":"石垣市"},';
    print '{"text":"浦添市"},';
    print '{"text":"名護市"},';
    print '{"text":"糸満市"},';
    print '{"text":"沖縄市"},';
    print '{"text":"豊見城市"},';
    print '{"text":"うるま市"},';
    print '{"text":"宮古島市"},';
    print '{"text":"南城市"},';
    print '{"text":"国頭村"},';
    print '{"text":"大宜味村"},';
    print '{"text":"東村"},';
    print '{"text":"今帰仁村"},';
    print '{"text":"本部町"},';
    print '{"text":"恩納村"},';
    print '{"text":"宜野座村"},';
    print '{"text":"金武町"},';
    print '{"text":"伊江村"},';
    print '{"text":"読谷村"},';
    print '{"text":"嘉手納町"},';
    print '{"text":"北谷町"},';
    print '{"text":"北中城村"},';
    print '{"text":"中城村"},';
    print '{"text":"西原町"},';
    print '{"text":"与那原町"},';
    print '{"text":"南風原町"},';
    print '{"text":"渡嘉敷村"},';
    print '{"text":"座間味村"},';
    print '{"text":"粟国村"},';
    print '{"text":"渡名喜村"},';
    print '{"text":"南大東村"},';
    print '{"text":"北大東村"},';
    print '{"text":"伊平屋村"},';
    print '{"text":"伊是名村"},';
    print '{"text":"久米島町"},';
    print '{"text":"八重瀬町"},';
    print '{"text":"多良間村"},';
    print '{"text":"竹富町"},';
    print '{"text":"与那国町"}';
    
    print ']';

}else{

    //print '[{"text":"その他"}]';
    print '[]';

}
?>