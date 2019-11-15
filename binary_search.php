<?php
/**
 * Created by PhpStorm.
 * User: SergeyK
 * Date: 14.11.2019
 * Time: 16:15
 */

    include_once('functions.php');

    //имя файла
    $fileName = "test.txt";
    //имя директории для файла
    $fileDir = "files";

    $fileName = $fileDir."/".$fileName;
    $targetValue = '';

    if(!file_exists($fileName)){

        createFile($fileName,2000000, $fileDir);
    }

    if(isset($_POST['number']) && !empty($_POST['number'])){

        $targetValue =  "ключ".clean($_POST['number']);
        $time = getTime();
        $result = binarySearch($fileName, $targetValue);
        $time = getTime($time);
        $view = "</br> Поиск ключа - ".$result. "</br>" ."Времени затрачено - ".$time." секунд  ";

    }else{

        $view = " </br> Введите число в поле для ввода ";

    }

?>

<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>Бинарный поиск</title>
</head>
<body>

    <h3><a name="top"></a>Бинарный поиск</h3>
    <div class="container">

    <form action="" method="post">

        <fieldset >

            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="number">Напишите число</label>
                    <input type="text" class="form-control" name="number">


                </div>
            </div>

        </fieldset>
        <div class="input-group text-center d-md-inline-block">
            <button type="submit" name="submit" class="btn btn-success btn-lg sendToServer" >Найти</button>
            <a href="#top"><button type="reset" name="reset" class="btn btn-warning btn-lg resetInfo" >Сбросить</button></a>
        </div>

    </form>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <?=$view?>
        </div>
        <div class="col-lg-3"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>