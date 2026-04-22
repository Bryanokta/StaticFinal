<?php
class Matematika
{
    public static function kali($a, $b)
    {
        return $a * $b;
    }

    public static function bagi($a, $b)
    {
        if ($b == 0) return "Error (Bagi 0)";
        return $a / $b;
    }

    public static function tambah($a, $b)
    {
        return $a + $b;
    }

    public static function kurang($a, $b)
    {
        return $a - $b;
    }

    public static function luasPersegi($sisi)
    {
        return $sisi * $sisi;
    }
}

$hasil = "";
$angka1 = "";
$angka2 = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $angka1 = isset($_POST['angka1']) && $_POST['angka1'] !== "" ? (float)$_POST['angka1'] : 0;
    $angka2 = isset($_POST['angka2']) && $_POST['angka2'] !== "" ? (float)$_POST['angka2'] : 0;
    $operasi = $_POST['operasi'];

    switch ($operasi) {
        case 'tambah':
            $hasil = Matematika::tambah($angka1, $angka2);
            break;
        case 'kurang':
            $hasil = Matematika::kurang($angka1, $angka2);
            break;
        case 'kali':
            $hasil = Matematika::kali($angka1, $angka2);
            break;
        case 'bagi':
            $hasil = Matematika::bagi($angka1, $angka2);
            break;
        case 'luas_persegi':
            $hasil = Matematika::luasPersegi($angka1);
            $angka2 = "";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #e0e5ec;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .kalkulator {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
            font-size: 18px;
            letter-spacing: 1px;
        }

        .layar {
            background-color: #f1f3f4;
            color: #202124;
            font-size: 32px;
            font-weight: bold;
            text-align: right;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            min-height: 40px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: 0.3s border-color;
        }

        .input-group input:focus {
            border-color: #1a73e8;
        }

        .tombol-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 15px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.2s, transform 0.1s;
        }

        button:active {
            transform: scale(0.95);
        }

        .btn-operasi {
            background-color: #e8f0fe;
            color: #1a73e8;
        }

        .btn-operasi:hover {
            background-color: #d2e3fc;
        }

        .btn-luas {
            grid-column: span 4;
            background-color: #34a853;
            color: white;
            font-size: 16px;
        }

        .btn-luas:hover {
            background-color: #2b8c45;
        }

        .petunjuk {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>

<body>

    <div class="kalkulator">
        <h2>KALKULATOR</h2>

        <div class="layar">
            <?php echo $hasil !== "" ? $hasil : "0"; ?>
        </div>

        <form method="post">
            <div class="input-group">
                <input type="number" step="any" name="angka1" value="<?php echo $angka1; ?>" placeholder="Angka 1 / Sisi Persegi" required>
            </div>
            <div class="input-group">
                <input type="number" step="any" name="angka2" value="<?php echo $angka2; ?>" placeholder="Angka 2 (Kosongkan jika Luas)">
            </div>

            <div class="tombol-grid">
                <button type="submit" name="operasi" value="tambah" class="btn-operasi">+</button>
                <button type="submit" name="operasi" value="kurang" class="btn-operasi">-</button>
                <button type="submit" name="operasi" value="kali" class="btn-operasi">&times;</button>
                <button type="submit" name="operasi" value="bagi" class="btn-operasi">&divide;</button>

                <button type="submit" name="operasi" value="luas_persegi" class="btn-luas">Hitung Luas Persegi</button>
            </div>
        </form>

        <div class="petunjuk">
            Untuk luas persegi, isi angka 1 saja sebagai sisi.
        </div>
    </div>

</body>

</html>