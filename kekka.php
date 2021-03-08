<?php
    $link = mysqli_connect("localhost", "jikkyo", "pass", "jikkyo_pension");
    if ($link == null) {
        die("接続に失敗しました:" . mysqli_connect_error());
  }
    mysqli_set_charset($link, "utf8");
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>学生情報</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <nav id="global_navi">

                <ul>
<<<<<<< HEAD
                    <li class="current"><a href="kensaku.html">検索フォーム</a></li>
                    <li><a href="kekka.html">検索結果</a></li>
=======
                    <li class="current"><a href="kensaku.php">検索フォーム</a></li>
                    <li><a href="kekka.php">検索結果</a></li>
                    <li><a href="touroku.html">登録</a></li>
                    <li><a href="sakujo.html">削除</a></li>
>>>>>>> 1c2e74008ad2f6cbc4d18de8f548dc5b285c74c5
                </ul>

            </nav>
        </header>

        <section>

            <?php
                $number = $_POST['number'];
                echo "{$number}";

                $name = $_POST['name'];
                echo "{$name}";

                $sinro = $_POST['sinro'];
                echo "{$sinro}";
            ?>

        </section>

        <footer>
            Copyright
        </footer>

        <?php
            mysqli_free_result($result);
            mysqli_close($link)
        ?>

    </body>
</html>
