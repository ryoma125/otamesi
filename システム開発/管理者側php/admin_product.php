<?php session_start();
require "db-connect.php";
$pdo = new PDO($connect, USER, PASS);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $shipping_fee = $_POST["shipping_fee"];
    $stock = $_POST["stock"];
    $code = $_POST["code"];
    $brand = $_POST["brand"];
    $size = $_POST["size"];

    $image_url = "";
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $file_name = uniqid() . "_" . basename($_FILES["image"]["name"]);
        $target_path = $upload_dir . $file_name;
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {
            $image_url = $target_path;
        }
    }

    try {
        if (!empty($name) && !empty($price) && !empty($shipping_fee) && !empty($stock) && !empty($code)) {
            $stmt = $pdo->prepare("
                INSERT INTO Product
                (product_name, product_code, brand, size, image_url, price, stock, shipping_fee)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$name, $code, $brand, $size, $image_url, $price, $stock, $shipping_fee]);
            $message = "商品を登録しました！";
        } else {
            $message = "未入力の項目があります。";
        }
    } catch (PDOException $e) {
        $message = "エラー: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品登録 - Calçar</title>
  <link rel="stylesheet" href="admin_product.css">
</head>
<body>
  <header class="header">
    <div class="logo">Calçar</div>
    <nav class="nav">
      <a href="admin_product.php">商品登録</a>
      <a href="admin_product_edit.php">商品管理</a>
      <a href="admin_user.php">ユーザー削除</a>
      <a href="admin_sales.php">売上管理</a>
    </nav>
    <div class="welcome">ようこそ！管理者さん！</div>
  </header>

  <main class="main">
    <?php if ($message): ?>
      <div class="message"><?= htmlspecialchars($message, ENT_QUOTES) ?></div>
    <?php endif; ?>

    <form class="product-form" method="POST" enctype="multipart/form-data">
      <div class="form-row">
        <div class="form-group">
          <label>商品名</label>
          <input type="text" name="name" required>
        </div>
        <div class="form-group">
          <label>価格</label>
          <input type="number" name="price" required>
        </div>
        <div class="form-group">
          <label>送料</label>
          <input type="number" name="shipping_fee" required>
        </div>
        <div class="form-group">
          <label>在庫数</label>
          <input type="number" name="stock" required>
        </div>
      </div>

      <div class="form-row">
        <div class="upload-box">
          <input type="file" name="image" accept="image/*" required>
          <p>アップロード</p>
        </div>

        <div class="form-group">
          <label>商品コード</label>
          <input type="text" name="code" required>
        </div>
        <div class="form-group">
          <label>ブランド</label>
          <input type="text" name="brand">
        </div>
        <div class="form-group">
          <label>サイズ</label>
          <input type="text" name="size">
        </div>
      </div>

      <div class="btn-wrap">
        <button type="submit">登録</button>
      </div>
      <div class="info-section">
      <h3>商品コード定義</h3>
      <div class="code-info">
        <div class="left">
          <p>カテゴリー カラー サイズ 素材</p>
          <p><strong>例）SUM-BLA-26A-LEA</strong></p>
          <p>夏　黒　26.5　レザー</p>
        </div>
        <div class="right">
          <p>サイズの.5のサイズは〇〇Aと表記</p>
          <p>カテゴリ、カラー、素材は<br>頭文字3文字を大文字表記</p>
        </div>
      </div>
    </div>
    </form>
  </main>
</body>
</html>
