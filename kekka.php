<?php
    header("Content-type: text/html; charset=utf-8");
 
    if(empty($_POST)) {
        header("Location: kensaku.html");
        exit();
    }else{
        //名前入力判定
        if (!isset($_POST['namae'])  || $_POST['namae'] === "" ){
            $errors['name'] = "名前が入力されていません。";
        }
    }
     
    if(count($errors) === 0){
        
        $dsn = 'mysql:host=localhost;dbname=sample01;charset=utf8';
        $user = 'root';
        $password = '';
     
        try{
            $dbh = new PDO($dsn, $user, $password);
            $statement = $dbh->prepare("SELECT * FROM 学生表 WHERE 名前 LIKE '%" . $_POST["namae"] . "%' ");
        
            if($statement){
                $yourname = $_POST['yourname'];
                $like_yourname = "%".$yourname."%";
                //プレースホルダへ実際の値を設定する
                $statement->bindValue(':name', $like_yourname, PDO::PARAM_STR);
                
                if($statement->execute()){
                    //レコード件数取得
                    $row_count = $statement->rowCount();
                    
                    while($row = $statement->fetch()){
                        $rows[] = $row;
                    }
                    
                }else{
                    $errors['error'] = "検索失敗しました。";
                }
                
                //データベース接続切断
                $dbh = null;	
            }
        
        }catch (PDOException $e){
            print('Error:'.$e->getMessage());
            $errors['error'] = "データベース接続失敗しました。";
        }
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

            <th>学籍番号</th>
            <th>名前</th>
            <th>かな</th>
            <th>性別</th>
            <th>進路</th>
            <th>課題</th>

            <?php if (count($errors) === 0): ?>
            
            <?php 
                foreach($rows as $row){
            ?> 
            <tr> 
	            <td><?=$row['学籍番号']?></td> 
	            <td><?=htmlspecialchars($row['名前'],ENT_QUOTES,'UTF-8')?></td>
                <td><?=htmlspecialchars($row['かな'],ENT_QUOTES,'UTF-8')?></td>
            </tr> 
            <?php 
                } 
            ?>
 
            <?php elseif(count($errors) > 0): ?>
            <?php
                foreach($errors as $value){
	            echo "<p>".$value."</p>";
                }
            ?>
            <?php endif; ?>

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
