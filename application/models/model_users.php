<?php

class Model_Users extends Model
{
    public function get_data()
    {
        $link = mysqli_connect('localhost','root','','site_chat')or Die("Ошибка подключения к БД");
        //var_dump($link);
        $query ="SELECT * FROM users";
        $result = mysqli_query($link,$query) or die("Ошибка ");
        while ($row = mysqli_fetch_array($result)) {
            foreach ($row as $item) {
                echo $item.";";
            }
            echo "<br>";
        }
        return "sad";
        //var_dump($result);
    }

//    public function getUserByLogin($login)
//    {
//        $query ="SELECT id FROM users WHERE login LIKE ".$login;
//        $result = mysqli_query($this->link, $query) or die("Ошибка " . mysqli_error($this->link));
////        while ($row = mysqli_fetch_row($result)) {
////
////        }
//        var_dump($result);
//    }
}