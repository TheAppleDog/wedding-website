<?php

class Liquidation extends DB_Object
{
    protected static $db_table = "tbl_liquidation";
    protected static $db_table_fields = array(
        'id',
        'title',
        'booking_id',
        'user_name',
        'payment',
        'cash',
        'credit',
        'date_modified',
        'date_issue'
    );

    public $id;
    public $booking_id;
    public $user_name;
    public $payment;
    public $cash;
    public $credit;
    public $date_issue;
    public $date_modified;
    public $title;

    public static function find_by_liquadate_all($id) {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE booking_id = $id ORDER BY booking_id DESC");
    }

 public static function find_by_username_all($user_name) {
    global $db;
    $user_name = $db->escape_string($user_name);
    // Adjusted SQL query to join with the Addons table and select the event title.

    $sql = "SELECT * FROM tbl_liquidation INNER JOIN Addons ON Addons.title = tbl_liquidation.title WHERE tbl_liquidation.user_name = '{$user_name}';
";
    return static::find_by_query($sql);
}
    public static function getTotalAmount($id) {
        global $db;
        $sql = "SELECT SUM(payment) FROM " .static::$db_table." WHERE booking_id = $id";
        $result_count = $db->query($sql);
        $row = mysqli_fetch_array($result_count);
        return array_shift($row);
    }
    public static function getTotalAmountCash($id) {
        global $db;
        $sql = "SELECT SUM(cash) FROM " .static::$db_table." WHERE booking_id = $id";
        $result_count = $db->query($sql);
        $row = mysqli_fetch_array($result_count);
        return array_shift($row);
    }
    public static function getTotalAmountCredit($id) {
        global $db;
        $sql = "SELECT SUM(credit) FROM " .static::$db_table." WHERE booking_id = $id";
        $result_count = $db->query($sql);
        $row = mysqli_fetch_array($result_count);
        return array_shift($row);
    }
}

?>


