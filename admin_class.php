<?php
session_start();
ini_set('display_errors', 1);

Class Action{
    private $db;

    public function __construct(){
        ob_start();
        require_once("include/initialize.php");
        include("DatabaseV2/config.php");

        $this->$db = $con;
    }

    function __destruct(){
        $this->db->close();
        ob_end_flush();
    }

    function lto_report(){
        extract($_POST);
        $data = " Report_ID = '{$_SESSION['login_id']}' ";
        $data = ",Violation = '$Vehicle_Violation'";
        $data .= ",Vehicle_Type ='$Vehicle_Type' ";
        
        $save = $this->db->query("INSERT INTO lto_userlist set $data");
        if($save){
            return 1;
        }
    }
}

?>