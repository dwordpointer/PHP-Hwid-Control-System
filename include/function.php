<?php
class variable
{
    private $servername = "localhost";
    private $database = "otomasyon";
    private $username = "root";
    private $password = "";

    public $id;
    public $hwid;
    public $durum;
    public $sure;
    public $ad_soyad;
    public $tel_no;

    function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    function get()
    {
        $data = [];
        $sql = "SELECT * FROM kullanici";
        $result = $this->conn->query($sql);
        while ($row = $result->fetch_object()) {
            $data[] = $row;
        }
        return $data;
    }

    function set($hwid, $kalangun, $ad_soyad, $telefon)
    {
        $bugun = date("Y-m-d");
        $tarih = strtotime("+$kalangun day", strtotime($bugun));
        $yenitarih = date('d/m/Y', $tarih);
        $sql = "INSERT INTO kullanici SET hwid='$hwid', durum=1,kalan='$yenitarih',musteri_ad_soyad='$ad_soyad',musteri_telefon='$telefon'";
        $result = $this->conn->query($sql);
    }
    function delete($id)
    {
        $sql = "DELETE FROM kullanici WHERE id='$id'";
        $result = $this->conn->query($sql);
        header("Location: index.php");
    }

}
