<?php
    $link = mysqli_connect("localhost", "root", "", "gakusei");
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
                    <li class="current"><a href="kensaku.html">検索フォーム</a></li>
                    <li><a href="kekka.php">検索結果</a></li>
                </ul>

            </nav>
        </header>

        <section>
            <h2>検索結果</h2>
            <table>

            <th>学籍番号</th>
            <th>名前</th>
            <th>かな</th>
            <th>性別</th>
            <th>進路</th>
            <th>課題</th>

            <?php
                
                $sql = "SELECT 学籍番号, 名前, かな, 性別, 進路, 詳細　
                FROM 学生表, 課題表, 課題詳細表　
                WHERE 学生表.学籍番号 = 課題表.学籍番号
                AND 課題表.課題番号 = 課題詳細表.課題番号
                OR 学籍番号 = '".$POST['number']."'
                OR 名前 LIKE '%".$_POST['name']."%'";

                $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>{$row['学籍番号']}</td>";
                        echo "<td>{$row['名前']}</td>";
                        echo "<td>{$row['かな']}</td>";
                        echo "<td>{$row['性別']}</td>";
                        echo "<td>{$row['進路']}</td>";
                        echo "<td>{$row['詳細']}</td>";
                        echo "</tr>";
                    }
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
