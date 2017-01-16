<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * Developer: riyad
 */
include_once 'config.php';
class connection{
    public  $dbhost=DB_HOST;
    public  $dbuser=DB_USER;
    public  $dbpassword=DB_PASSWORD;
    public  $dbname=DB;
    public  $link;
    public $error;
    public function __construct() {
        $this->connectDb();
    }
    private function connectDb(){
        $this->link=new mysqli($this->dbhost,$this->dbuser,$this->dbpassword, $this->dbname);
        if(!$this->link){
            $this->error="Connection Error".$this->link->connect_error."";
            return FALSE;
        }
    }
    public function query($query){
        $insert_row=$this->link->query($query)or 
        die($this->link->error.__LINE__);
        if($insert_row){
            echo 'Success';
        } else {
            echo 'Wrong';
        }
    }
    public function select($query){
        $result=$this->link->query($query)or 
        die($this->link->error.__LINE__);
        if($result->num_rows > 0){
        return $result;
      } else {
        return false;
      }
    }
}
