<?php
ini_set('display_errors', 1);
error_reporting(-1);
// kelas Koneksi DATABASE
class database {
    //properti yang dibuthkan
    private $dbhost;
    private $dbuser;
    private $dbpass;
    private $dbname;
    //construc
    function __construct($a, $b, $c, $d){ //construct biar langsung jalan di objek
      $this->dbhost = $a;
      $this->dbuser = $b;
      $this->dbpass = $c;
      $this->dbname = $d;
    }
    //method koneksi mysql db
    function conn_mysql(){
      $konek_db = mysqli_connect($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
      return  $konek_db;
    }
}

//objek db konek
      // Parameter Data MYSQL
      $host = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'backend';
      // Instantitasi dan setting obyek
      $db = new database($host,$user,$pass,$db);
      $koneksi = $db->conn_mysql();
      
?>