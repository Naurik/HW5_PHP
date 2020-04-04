<?php
function CreateFilename(){
    $filename = 'filename.txt';
    $person = "Johnny Depp\n";
    if (is_writable($filename)) {


        if (!$handle = fopen($filename, 'a')) {
            echo "Не могу открыть файл ($filename)";
            exit;
        }

        if (fwrite($handle, $person) === FALSE) {
            echo "Не могу произвести запись в файл ($filename)";
            exit;
        }
        echo 'OK';

        file_put_contents($filename, $person, FILE_APPEND | LOCK_EX);


    }


    else {
        echo "Файл $filename недоступен для записи";
    }


}


function ArrayFile(){
    $books = array(
        array(
            array(
                'author' => 'Gore Verbinski',
                'title' => 'The Curse of the Black Pearl',
                'year' => 2003
            ),
            array(
                'author' => 'Gore Verbinski',
                'title' => 'Dead Mans Chest',
                'year' => 2006
            )
        ),
        array(
            array(
                'author' => 'Gore Verbinski',
                'title' => 'At Worlds End',
                'year' => 2007
            ),
            array(
                'author' => 'Rob Marshal',
                'title' => 'On Stranger Tides',
                'year' => 2011
            )
        )
    );



    

    $filename = 'array.txt';
    $data = serialize($books);
//$data = json_encode($books);
    file_put_contents($filename,$data, FILE_APPEND | LOCK_EX);


    $data = file_get_contents($filename);
//$books = json_decode($data, TRUE);
    $books = unserialize($data);

}
