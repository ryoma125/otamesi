<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', '1');
<<<<<<< HEAD
require '../require.php/db-connect.php';
$pdo = new PDO($connect, USER, PASS);
=======
>>>>>>> main

echo "<h3>=== パステスト ===</h3>";

// ★ まずは require のパスが本当に存在するかテスト
$path = '../require.php/db-connect.php';
echo "チェック対象パス： " . htmlspecialchars($path) . "<br>";

if (file_exists($path)) {
    echo "<span style='color:green;'>file_exists：TRUE（パスは存在しています）</span><br>";
} else {
    echo "<span style='color:red;'>file_exists：FALSE（パスが間違っています）</span><br>";
    exit("<b>→ この時点で require が失敗し、白画面になります。</b>");
}

echo "<h3>=== require テスト ===</h3>";

try {
    require $path;
    echo "<span style='color:green;'>require 成功！</span><br>";
} catch (Throwable $e) {
    echo "<span style='color:red;'>require 失敗：</span> " . $e->getMessage();
    exit;
}

echo "<h3>=== DB接続テスト ===</h3>";

try {
    $pdo = connect(); // ← db-connect.php の関数を呼び出す
    echo "<span style='color:green;'>DB接続成功！</span><br>";
} catch(Throwable $e) {
    echo "<span style='color:red;'>DB接続エラー：</span>" . $e->getMessage();
    exit;
}

echo "<h3>=== ここまで来たらログイン処理へ進めます ===</h3>";
exit("OK：白画面の原因は require または DB接続ではありませんでした。");
