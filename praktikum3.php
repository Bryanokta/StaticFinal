<?php
class Produk
{
    public static $jumlahProduk = 0;
    public $namaProduk;
    public $harga;

    public function __construct($namaProduk, $harga)
    {
        $this->namaProduk = $namaProduk;
        $this->harga = $harga;
        $this->tambahProduk();
    }

    public function tambahProduk()
    {
        self::$jumlahProduk++;
    }
}

class Transaksi
{
    final public function prosesTransaksi($totalBayar)
    {
        echo "<hr>";
        echo "<b>Status:</b> Transaksi diproses.<br>";
        echo "<b>Total Pembayaran:</b> Rp " . number_format($totalBayar, 0, ',', '.') . "<br>";
    }
}

$p1 = new Produk("Kemeja Flanel", 150000);
$p2 = new Produk("Celana Chino", 200000);
$p3 = new Produk("Sepatu Kanvas", 250000);

echo "<h3>Data Barang</h3>";
echo "1. " . $p1->namaProduk . " - Rp " . number_format($p1->harga, 0, ',', '.') . "<br>";
echo "2. " . $p2->namaProduk . " - Rp " . number_format($p2->harga, 0, ',', '.') . "<br>";
echo "3. " . $p3->namaProduk . " - Rp " . number_format($p3->harga, 0, ',', '.') . "<br><br>";

echo "<b>Total Produk Terdaftar: " . Produk::$jumlahProduk . " item</b><br>";

$totalBelanja = $p1->harga + $p2->harga + $p3->harga;

$transaksiBaru = new Transaksi();
$transaksiBaru->prosesTransaksi($totalBelanja);
