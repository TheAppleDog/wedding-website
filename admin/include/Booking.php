<?php

class Booking extends DB_Object
{
    protected static $db_table = "tblweddingcustomers";
    protected static $db_table_fields = array(
        'booking_id',
        'user_name',
        'bride',
        'groom',
        'wedding_type',
        'email',
        'phone',
        'wedding_date',
        'Events',
        'status',
        'wedding_venue',
        'est_guest',
        'organizer_id',
        'cash_advance'
    );

    public $booking_id;
    public $user_name;
    public $bride;
    public $groom;
    public $wedding_date;
    public $email;
    public $Events;
    public $organizer_id;
    public $wedding_type;
    public $wedding_venue;
    public $est_guest;
    public $status;
    public $cash_advance;
    public $phone;

     public function check_wedding_date($date) {
        global $db;
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE wedding_date = '{$date}'";
        $result = $db->query($sql);

        if(mysqli_num_rows($result) == 1) {
            return true;
        } else {
            return false;
        }
    }


    public static function getBooking() {
        global $db;
        $sql = "SELECT * FROM tblweddingcustomers  WHERE status = 'pending' ORDER BY booking_id ASC";
        $result_set = $db->query($sql);

        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }
        return $the_object_array;
    }
     public static function ConfirmedBooking() {
        global $db;
        $sql = "SELECT * FROM tblweddingcustomers WHERE status = 'Confirm' ORDER BY booking_id ASC";
        $result_set = $db->query($sql);

        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;
    }
    public static function count_booking() {
        global $db;
        $sql = "SELECT count(booking_id) FROM ". self::$db_table. " WHERE status='confirm'";
        $result_count = $db->query($sql);
        $row = mysqli_fetch_array($result_count);
        return array_shift($row);
    }
public static function count_pending() {
        global $db;
        $sql = "SELECT count(booking_id) FROM ". self::$db_table. " WHERE status='pending'";
        $result_count = $db->query($sql);
        $row = mysqli_fetch_array($result_count);
        return array_shift($row);
    }
}

?>


