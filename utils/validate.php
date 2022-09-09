<?php
    function fixSqlInjection($str) {
        $str = str_replace("\\", "\\\\", $str);
        $str = str_replace("'", "\'", $str);
        return $str;
    }
    function getGET($key) {
        $value = null;
        if (!empty($_GET[$key])) {
            $value = $_GET[$key];
        }
        $value = fixSqlInjection($value);
    
        return $value;
    }
    function getPOST($key) {
        $value = null;
        if (!empty($_POST[$key])) {
            $value = $_POST[$key];
        }
        $value = fixSqlInjection($value);
        return $value;
    }
    
