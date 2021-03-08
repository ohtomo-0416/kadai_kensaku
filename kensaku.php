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
                    <li class="current"><a href="kensaku.php">検索フォーム</a></li>
                    <li><a href="kekka.php">検索結果</a></li>
                </ul>

            </nav>
        </header>

        <section>
            <h1>検索フォーム</h1>

            <form id="kensaku" action="kekka.php">
                <dl>
                    <dt>学籍番号</dt>
                    <dd><input type="text" name="number" id="number"></dd>

                    <dt>名前</dt>
                    <dd><input type="text" name="name" id="name"></dd>

                    <dt>進路</dt>
                    <dd>

                        <select name="sinro" id="sinro">

                            <option value="進学">進学</option>
                            <option value="就職">就職</option>

                        </select>

                    </dd>

                    <input type="submit" value="検索">
                    <input type="reset">


                </dl>

            </form>
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