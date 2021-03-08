<?php
    header("Content-type: text/html; charset=utf-8");
 
    if(empty($_POST)) {
        header("Location: kensaku.html");
        exit();
    }else{

        if (!isset($_POST['namae'])  || $_POST['namae'] === "" ){
            $errors['name'] = "名前が入力されていません。";
        }
    }
     
        
        $dsn = 'mysql:host=localhost;dbname=gakusei;charset=utf8';
        $user = 'root';
        $password = '';
     
        $dbh = new PDO($dsn, $user, $password);
            if(@$_POST["namae"] != ""){
                $stmt = $pdo->query("SELECT * FROM 学生表 WHERE 名前 LIKE '%" . $_POST["namae"] . "%' ");
            }
        
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

            <tr>
                <th>学籍番号</th>
                <th>名前</th>
                <th>かな</th>
                <th>性別</th>
                <th>進路</th>
                <th>課題</th>
            </tr>
            
            <tr> 
            <?php foreach ($stmt as $row): ?>
                <tr>

                    <td><?php echo $row[0]?></td>
                    <td><?php echo $row[1]?></td>
                    <td><?php echo $row[2]?></td>
                    <td><?php echo $row[3]?></td>
                    <td><?php echo $row[4]?></td>

                </tr>
            
            </tr> 
            
            <?php endforeach; ?>

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
