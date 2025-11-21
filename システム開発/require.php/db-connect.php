<?php
const SERVER ='mysql326.phy.lolipop.lan';
const DBNAME ='LAA1607573-aso2401135';
const USER   ='LAA1607573';
const PASS   ='teamYOSHII';


function connect() {
    $connect = 'mysql:host=' . SERVER . ';dbname=' . DBNAME . ';charset=utf8';
    
    try {
        $pdo = new PDO($connect, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    } catch (PDOException $e) {
        // 本番環境では詳細を表示しない
        error_log('DB接続エラー: ' . $e->getMessage());
        die('データベース接続に失敗しました');
    }
}

?>