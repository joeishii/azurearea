<?php

function logWrites($pram){

    global $conn;

    $now = new DateTime();
    $pram[] = $now->format('Y-m-d H:i:s');    
    $pram[] = substr($_SERVER['REMOTE_ADDR'],0,15);
    $pram[] = substr($_SERVER['REMOTE_HOST'],0,20);
    //$pram[] = substr($_SERVER['HTTP_USER_AGENT'],0,10);
    $pram[] = substr($_SERVER['HTTP_REFERER'],0,200);
    $pram[] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,100);

    $sqlstr = "INSERT INTO cn_log (";
    $sqlstr .= "typ,";
    $sqlstr .= "dccd,";
    $sqlstr .= "gend,";
    $sqlstr .= "age,";
    $sqlstr .= "ken,";
    $sqlstr .= "cty,";
    $sqlstr .= "kwd,";
    $sqlstr .= "act,";
    $sqlstr .= "ssn,";
    $sqlstr .= "dttm,";
    $sqlstr .= "addr,";
    $sqlstr .= "host,";
    //$sqlstr .= "agnt,";
    $sqlstr .= "refe,";
    $sqlstr .= "lang";
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
    //$sqlstr .= "?,";
    $sqlstr .= "?,";
    $sqlstr .= "?";
    $sqlstr .= ")";

    $result = $conn->prepare($sqlstr, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    try{
        $result->execute($pram);//$result->execute(array(":page" => $page));
        $rows = $result->fetchAll();
        $cunt = $result->rowCount();

        if($cunt==1){
            return $rows[0][0];
        }else{
            return 0;
        }
    } catch ( PDOException $e ) {
        return 0;
    }
}