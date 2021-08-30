<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>4eachblog 掲示板</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php

  mb_internal_encoding("utf8");
  $pdo = new PDO("mysql:dbname=lesson01;host:localhost;","root","root");
  $stmt = $pdo->query("select * from 4each_keijiban");

?>

  <img src="4eachblog_logo.jpg">
<header>
  <ul>
    <li>トップ</li>
    <li>プロフィール</li>
    <li>4eachについて</li>
    <li>登録フォーム</li>
    <li>問い合わせ</li>
    <li>その他</li>
  </ul>
</header>
<main>
  <div class="main-container">
    <div class="left">
      <h1>プログラミングに役立つ掲示板</h1>
      <form method="post" action="insert.php">
        <div>
          <label>ハンドルネーム</label>
          <br>
          <input type="text" class="text" size="60" name="handlename">
        </div>

        <div>
          <label>タイトル</label>
          <br>
          <input type="text" class="text" size="60" name="title">
        </div>

        <div>
          <label>コメント</label>
          <br>
          <textarea cols="60" rows="10" name="comments"></textarea>
        </div>

        <div>
          <input type="submit" class="submit" value="投稿する">
        </div>

      </form>

      <?php

        while($row = $stmt->fetch()){

          echo "<div class='article1'>";
          echo "<h2>".$row['title']."</h2>";
          echo "<p1>".$row['comments']."<p1>";
          echo "<div class='handlename'>posted by".$row['handlename']."</div>";
          echo "</div>";      
        } 

        while($row = $stmt->fetch()){

          echo "<div class='article2'>";
          echo "<h3>".$row['title']."</h3>";
          echo "<p2>".$row['comments']."<p2>";
          echo "<div class='handlename'>posted by".$row['handlename']."</div>";
          echo "</div>";
        }
          
      ?>  

    </div>   

    <div class="right">
      <div class="menu">
        <div class="article">
          <p>人気の記事</p>
          <ul>
            <li>PHPオススメ本</li>
            <li>PHP/MyAdminの使い方</li>
            <li>今人気のエディタ Top5</li>
            <li>HTMLの基礎</li>
          </ul>
        </div>
        <div class="link">
          <p>オススメリンク</p>
          <ul>
            <li>インターノウス株式会社</li>
            <li>XAMPPのダウンロード</li>
            <li>Eclipseのダウンロード</li>
            <li>Bracketsのダウンロード</li>
          </ul>
        </div>
        <div class="category">
          <p>カテゴリ</p>
          <ul>
            <li>HTML</li>
            <li>PHP</li>
            <li>MySQL</li>
            <li>JavaScript</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <p>copyright ©︎ internous | 4each blog the which provides A to Z about programming.</p>
  </footer>
</main>
</body>
</html>