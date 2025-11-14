<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calçar</title>
    <link rel="stylesheet" href="index.style.css">
</head>
<body>

  <?php require 'navigation.php'; ?>
  

  <main>
    <!-- 左サイズ選択 -->
    <aside class="sidebar">
      <h2>サイズ</h2>
      <div class="size-buttons">
        <a href="shoze_22.5size.php"><button>22.5cm</button></a>
        <a href="shoze_23size.php"><button>23.0cm</button></a>
        <a href="shoze_23.5size.php"><button>23.5cm</button></a>
        <a href="shoze_24size.php"><button>24.0cm</button></a>
        <a href="shoze_24.5size.php"><button>24.5cm</button></a>
        <a href="shoze_25size.php"><button>25.0cm</button></a>
        <a href="shoze_25.5size.php"><button>25.5cm</button></a>
        <a href="shoze_26size.php"><button>26.0cm</button></a>
        <a href="shoze_26.5size.php"><button>26.5cm</button></a>
        <a href="shoze_27size.php"><button>27.0cm</button></a>
        <a href="shoze_27.5size.php"><button>27.5cm</button></a>
        <a href="shoze_28size.php"><button>28.0cm</button></a>
        <a href="shoze_28.5size.php"><button>28.5cm</button></a>
        <a href="shoze_29size.php"><button>29.0cm</button></a>
        <a href="shoze_29.5size.php"><button>29.5cm</button></a>
        <a href="shoze_30size.php"><button>30.0cm</button></a>
      </div>
    </aside>

    <!-- 右：おすすめ商品 -->
    <section class="products">
      <h2>オススメ</h2>
      <div class="product-grid">
        <img src="https://via.placeholder.com/250x150?text=Shoes1" alt="shoes">
        <img src="https://via.placeholder.com/250x150?text=Shoes2" alt="shoes">
        <img src="https://via.placeholder.com/250x150?text=Shoes3" alt="shoes">
        <img src="https://via.placeholder.com/250x150?text=Shoes4" alt="shoes">
        <img src="https://via.placeholder.com/250x150?text=Shoes5" alt="shoes">
        <img src="https://via.placeholder.com/250x150?text=Shoes6" alt="shoes">
      </div>
    </section>
  </main>

  <!-- 下部テーマ部分 -->
  <section class="recommend-section">
    <div class="recommend-title">おすすめのテーマ</div>
 
    <div class="recommend-slider">
      <div class="recommend-card">
        <img src="img/cafe (2).png" alt="カフェにおすすめ">
        <div class="text">カフェにおすすめ</div>
      </div>
      <div class="recommend-card">
        <img src="img/flower.jpg" alt="雨におすすめ">
        <div class="text">雨におすすめ</div>
      </div>
      <div class="recommend-card">
        <img src="img/fuyu.png" alt="冬におすすめ">
        <div class="text">冬におすすめ</div>
      </div>
      <div class="recommend-card">
        <img src="img/autodoa.jpg" alt="アウトドアにおすすめ">
        <div class="text">アウトドアにおすすめ</div>
      </div>
      <div class="recommend-card">
        <img src="img/supotu.png" alt="スポーツにおすすめ">
        <div class="text">スポーツにおすすめ</div>
      </div>
    </div>
  </section>

  <footer></footer>
</body>
</html>
