<?php

if (! function_exists('arrayHas')) {
    function arrayHas($id, $datas, $prop = 'id') {
        foreach ($datas as $data) {
            if ($data[$prop] == $id) {
                return true;
            }
        }
        return false;
    }
}

if (! function_exists('getFromArray')) {
    function getFromArray($id, $datas, $prop = 'id', $returned = 'name') {
        foreach ($datas as $data) {
            if ($data[$prop] == $id) {
                return $data[$returned]; 
            }
        }
        return null; 
    }
}
