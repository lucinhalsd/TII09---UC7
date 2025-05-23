<?php

class Conexao{
    public static function getInstance(){
        return new PDO ("mysql:host=localhost;dbname=pizza", "root","");
    }
}