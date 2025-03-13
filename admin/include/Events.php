<?php

class Events extends DB_Object
{
    protected static $db_table = "Addons";
    protected static $db_table_fields = array(
        'id',       
        'title'        
    );

    public $id;   
    public $title;
    
 
    public static function getLiquidation_by_id($id) {
        global $db;
        $sql = "SELECT * FROM tbl_liquidation INNER JOIN Addons ON Addons.id = tbl_liquidation.title WHERE tbl_liquidation.booking_id = $id";
        $result_set = $db->query($sql);

        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }
        return $the_object_array;
    }

    public static function find_by_event_by_all($id) {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id ORDER BY id DESC");
    }




}

?>


