<?php
class Produk{
  public $namaBarang, 
         $merk;
  protected $diskon;
  private $harga;

  public function getCetak(){
    return "$this->merk, (Rp $this->harga)";
  }
  public function __construct($namaBarang="nama barang", $merk="merk", $harga=0){
    $this->namaBarang = $namaBarang;
    $this->merk=$merk;
    $this->harga=$harga;
  }

    public function cetakInfo(){
        $str="{$this->namaBarang}, {$this->getCetak()}";
        return $str;
    }
    public function getHarga(){
      return $this->harga - ($this->harga * $this->diskon / 100);
    }
}

class laptop extends Produk{
  public $ukuranLayar;
  public function __construct($namaBarang="nama barang", $merk="merk", $harga=0, $ukuranLayar = "ukuran layar"){
    parent::__construct($namaBarang, $merk, $harga); 
    $this->ukuranLayar=$ukuranLayar;
  }
    public function cetakInfo(){
        $str="Laptop: " . parent:: getCetak() . "| Ukuran Layar: {$this->ukuranLayar}";
        return $str;
    }
    public function setDiskon($diskon){
      $this->diskon = $diskon;
    }
}

class flashdisk extends Produk{
  public $kapasitas;
  public function __construct($namaBarang="nama barang", $merk="merk", $harga=0,$kapasitas = "kapasitas"){
    parent::__construct($namaBarang, $merk, $harga);
    $this->kapasitas=$kapasitas;
  }
    public function cetakInfo(){
        $str="Aksesoris: " . parent::getCetak() . "| Kapasitas: {$this->kapasitas}";
        return $str;
    }
}

$produk1 = new laptop("Idepad 310","Lenovo",7000000,"14 inci");
$produk2 = new flashdisk("Flasdisk","Sandisk",100000,"8 Gb");


echo $produk1->cetakInfo();
echo "<br>";
echo $produk2->cetakInfo();
echo "<br>";
echo "<hr>";
$produk1->setDiskon(50);
echo $produk1->getHarga();