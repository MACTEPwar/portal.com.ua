<?php

class Model
{
	
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/
    private $host = 'localhost'; // адрес сервера
    private $database = 'site_chat'; // имя базы данных
    private $user = 'root'; // имя пользователя
    private $password = ''; // пароль
    public $link;

   // public $link = mysqli_connect($this->$host,$this->$user,$this->$password,$this->$database,'123','asd');
    //private $link = mysqli_connect('localhost','root','','site_chat','','');
	// метод выборки данных
    public function __construct()
    {

    }

    public function get_data()
	{
		// todo
	}
}