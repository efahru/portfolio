<?php
    header("Cache-Control: no-store");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>今日のミッションメーカー</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">

        <h1 class="d-flex align-items-center justify-content-center" style="height:15vh;">
            今日のミッションメーカー
        </h1>

        <h2 class="d-flex align-items-center justify-content-center" style="height:40vh;">

            <?php
                $result[0] = null;
                $result[0] = '今日のミッション';

                if(isset($_GET['add'])){

                    try {
                        $dbh = new PDO('mysql:host=;dbname=' , 'ユーザー名', 'パスワード');
                        $stmt = $dbh->query('SELECT mission FROM `データベース名`');
                        $rows = $stmt->fetchAll(PDO::FETCH_NUM);
                        $dbh = null;
                    } catch (PDOException $e) {
                        print "エラー!: " . $e->getMessage() . "<br/>";
                        die();
                    }
                
                    $rand = array_rand($rows,1);
                    $result = $rows[$rand];
                    
                }
                echo $result[0];
            ?>

        </h2>

        <div class="d-flex align-items-center justify-content-center">

            <form method = "get">
                <button type="submit"  name="add" id="id" class="btn btn-primary">
                    作成する
                </button>
            </form>

        </div>

        <script>

            if(location.search == "?add="){
                re();
            }

            function re(){
                var button = document.getElementById('id');
                button.innerHTML = 'もう一度作成する';
            }
            
        </script>

    </div>

</body>
</html>
