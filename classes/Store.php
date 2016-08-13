<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Store {
    
    public function storeExists($storeName){
        $store_name = sanitize($storeName);
        
        $query = mysql_query("SELECT count(id) FROM store_info WHERE store_name='$store_name'");
        
        if(mysql_result($query, 0) == 1 ){
            return true;
        }  else {
            return false;
        }
        
    }
    
}