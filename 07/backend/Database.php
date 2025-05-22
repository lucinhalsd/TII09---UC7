<?php
class Database   //essa classe é responsavel por fazer a conexão com o banco de dados
{
    public static function getInstance()
    {
        return new PDO("mysql:host=localhost;dbname=venda", "root", "");
    }
}


?>