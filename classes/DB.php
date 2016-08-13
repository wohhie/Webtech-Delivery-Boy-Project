<?php
/**
 * Description of DB
 *
 * @author wohhie
 */
class DB {
    
    public static $instance;
    private $connection;
    private $query;
    private $result;
    
    public function __construct() {
        
        try{
            $this->connection = mysql_connect(Config::get('mysql/host'),Config::get('mysql/username'),Config::get('mysql/password'));
            if(!$this->connection){
                echo 'Connection Problem.';
                die();
            }
            
            mysql_select_db(Config::get('mysql/dbname'), $this->connection );
            
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
            
        }  
    }
    
    public static function getInstance(){
        
        if(!isset(self::$instance)){
            self::$instance = new DB();
        }
        
        return self::$instance;
        
    }
    
    
   
    public function query($table, $fields = array()){
        
        
        if(count($fields) == 1){
            $values = "";  
            
            foreach($fields as $key=>$value){
                $values .= (!is_numeric($value)) ? $key . "=" ."'". $value  ."'" : $key . "=" . $value;
                
            }
            
            $demo = "SELECT * FROM {$table} WHERE {$values}";
                
            $result = mysql_query("SELECT * FROM {$table} WHERE {$values}");
            
//            echo $demo;
            echo '<br>';
            
            
            return $result;  
            
        }elseif(count($fields) > 1){
            
            $values = "";  
            
            foreach($fields as $key=>$value){
                $values .= (!is_numeric($value)) ? $key . "=" ."'". $value  ."'" : $key . "=" . $value . ' and ';
                
            }
            
            $demo = "SELECT * FROM {$table} WHERE {$values}";
                
            $result = mysql_query("SELECT * FROM {$table} WHERE {$values}");
            
//            echo $demo;
            echo '<br>';
//          
//          
            
            return $result;            
            
        }else{
            
            
            $query = "SELECT * FROM {$table} ";
            $result = mysql_query($query);

            return $result;
        }
        
        
        
        
    }
    
    /**
     *  QUERY ONLY ID
     * @param type $table
     * @param type $fields
     * @return type
     */
    public function queryID($table, $fields = array()){
        
        if(count($fields) > 0){
            
            $values = "";  
            
            foreach($fields as $key=>$value){
                $values .= (!is_numeric($value)) ? $key . "=" ."'". $value  ."'" : $key . "=" . $value;
                
            }
            
            $demo = "SELECT id FROM {$table} WHERE {$values}";
                
            $query = mysql_query("SELECT id FROM {$table} WHERE {$values}");
//            echo $demo;
//            echo '<br>';
            $result = mysql_result($query, 0);
//          $result = mysql_result($query, 0);
            
            return $result;            
            
        }
        
    }
    
    
    public function action($action, $table, $fields ){
        $values = "";
        
        foreach($fields as $value){
            $values .=  $value;
            if(count($fields) > 1){
                $values .= " and ";
            }
        }
        
        $content = rtrim($values, ' and ');
        $sql = "{$action} FROM {$table} WHERE {$content}";
//        echo $sql;
        
        
        
        $query = mysql_query($sql);
//        $result = mysql_result($query, 0);
        $row = mysql_fetch_assoc($query);
        
        return ($row['countvalue'] == 1) ? $row['id'] : false;
        
    }
    
    
    
    
    
    /**
     * INSERT -> DATABASE
     * @param type $table
     * @param type $fields
     */
    public function insert($table, $fields = array() ){
//        echo $table;
//        print_r($fields);
        
        $key = array_keys($fields);
        $values = "";
        $x = 1;
        
        foreach($fields as $field){
            
            $values .= (!is_numeric($field)) ? "'". $field  ."'" : $field;
            
            if( count($fields) > $x){
                $values .= ',';
            }
            
            $x++;
        }
        
        $query = "INSERT INTO $table (". implode(", ", $key)  .") VALUES({$values})";
//        echo $query;
        
        $result = mysql_query($query);
        
        return $result;
        //not done yet;
    }
    
    
    
    public function update($table, $where = array(), $fields = array() ){
//        echo $table;
//        print_r($fields);
        
        $key = array_keys($fields);
        
        
        $fieldElement = "";
        $whereClause = "";
                
        foreach ($where as $key => $value){
            $value = ( !is_numeric($fields)) ? $value : "'". $value  ."'";
            
            $whereClause .= $key . '=' . $value;
        }
        
        
        foreach ($fields as $key=>$value){
            $value = (!is_numeric($fields)) ? "'". $value  ."'" : $value ;
            $fieldElement .= $key . '=' . $value;
            
            if(count($fields) > 0){
                $fieldElement .= ",";
            }
        }
        
        $fieldElement = rtrim($fieldElement, ",");
        
        
        
//          UPDATE table_name
//          SET column1=value, column2=value2,...
//          WHERE some_column=some_value
                
          
        
        $query = "UPDATE $table SET {$fieldElement} WHERE {$whereClause} ";
//        echo $query;
        
        $result = mysql_query($query);
        
        return $result;
        //not done yet;
    }
    
    
    /**
     * GETTING INFORMATION
     * ------------------------
     * @return string 
     */
    
    public function get($table, $fields){
        return $this->action("SELECT count(*) as countvalue ,id", $table, $fields);
    }
    
    
    
    
    
    
    public function join($table1, $table2, $condition = array()){
        
        if(count($condition) > 0){
//            print_r($condition);
            $key = array_keys($condition);
            $values = "";
            
            foreach($condition as $value){
                
                $values .= (!is_numeric($value)) ? "'". $value  ."'" :  $value;
            }
            
//          $q = "SELECT * FROM {$table1} wr, {$table2} wi WHERE wr.id = wi.userid and ". implode(", ", $key) ."={$values}";
//          echo $q;
            $sql = "SELECT * FROM {$table1} t1, {$table2} t2 WHERE t1.id = t2.userid and ". implode(", ", $key) ."={$values}";
//            echo $sql;
            $result = mysql_query($sql);
            
            
            
            
            return $result;
            
            
            
        }else{
            $result = mysql_query("SELECT * FROM {$table1} t1, {$table2} t2 WHERE t1.id = t2.p_id");
            
            $sql = "SELECT * FROM {$table1} t1, {$table2} t2 WHERE t1.id = t2.p_id";
//            echo $sql;

            return $result;
        }
        
        
    }
    
    
}
