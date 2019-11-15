<?php
/**
 * Created by PhpStorm.
 * User: SergeyK
 * Date: 15.11.2019
 * Time: 14:04
 */

    // функция для создания файла
    function createFile( $fileName , $count, $fileDir ){

        if (!is_dir($fileDir)) {

            mkdir($fileDir, 0777);

        }

        $file = fopen($fileName,"w");

        for ($i=0;$i<$count;$i++){

            fwrite($file,"ключ".$i."\t"."значение".$i."\x0A");

        }
    }

    // функция для очистки данных от HTML и PHP тегов
    function clean($value = "")
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = strip_tags($value);
        $value = htmlspecialchars($value);

        return $value;
    }

    // функция установки и получения времени выполнения бинарного поиска
    function getTime($time = false)
    {
        if ($time === false){

            return  microtime(true);

        }else{

            return round(microtime(true) - $time, 4);

        }
    }


    // функция бинарного поиска
    function binarySearch($fileName, $targetValue)
    {
        // создаём объект файла
        $file = new SplFileObject($fileName);

        // назначили левую граница
        $left = 0;
        //вычисление правой границы, конца файла
        $right = count(file($fileName)) - 1;

        while ($left <= $right) {

            $position = floor(($left + $right) / 2);

            $file->seek($position);

            // выделение из строки массива
            $elem = explode("\t", $file->current());

            // сравнение текущего значения с искомым
            $strnatcmp = strnatcmp($elem[0], $targetValue);

            if ($strnatcmp > 0){

                $right = $position - 1;

            }elseif($strnatcmp < 0){

                $left = $position + 1;

            }else{

                return $elem[1];
            }
        }
        // значение не найденно
        return 'undef';
    }
