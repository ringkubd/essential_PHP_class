<?php

/* 
 * Author: MD. ANWAR JAHID.
 * Email: ajr.jahid@gmail.com
 * FB: www.fb.com/ringkud
 */
class session{
    public static function init(){
        session_start();
    }
    public static function set($key,$val){
        $_SESSION[$key] = $val;
    }
    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        } else {
            return FALSE;
        }
    }
    public static function checkSession(){
        self::init();
        if(self::get($_SESSION['login']==FALSE)){
            self::distroy();
        }
    } 

    public static function distroy(){
        session_destroy();
        header("Location: login.php");
    }
            
}
