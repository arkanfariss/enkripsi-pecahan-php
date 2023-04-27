<!-- 
    keterangan :
    $p = plaintext
    $c = chipertext
    $k1 = kunci pembilang
    $k2 = kunci penyebut
-->
<!DOCTYPE html>
<html>
    <head>
        <title>ENKRIPSI PECAHAN</title>
        <style>
            div {
                padding-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <?php
        // DEKLARASI
        $p = isset($_POST['text']) ? $_POST['text'] : '';
        $k1 = isset($_POST['k1']) ? $_POST['k1'] : '';
        $k2 = isset($_POST['k2']) ? $_POST['k2'] : '';
        $strarray_p = str_split($p);
        $total_p = strlen($p);
        ?>
        <h2>ALGORITMA FUNGSI PECAHAN</h2>
        <form method="post">
            <div>Input text yang akan di enkripsi</div>
            <div>
                <textarea name="text" rows="5" cols="60" placeholder="text bebas"></textarea>
            </div>
            <div>Input kunci enkripsi</div>
            <div>
                <input type="text" name="k1" placeholder="kunci 1"></input>
                <input type="text" name="k2" placeholder="kunci 2"></input></div>
            <div>
                <button>Tampilkan Hasil</button>
            </div>
        </form>
        <?php
        // ENKRIPSI
        // konversi
        for ($i = 0; $i < $total_p; $i++){
            $ram1[$i] = ord($strarray_p[$i]);
        }
        $ram2 = ord($k1);
        $ram3 = ord($k2);
        // rumus
        for ($i = 0; $i < $total_p; $i++) {
            $c1[$i] = ($ram1[$i] + $ram2) % 255;
            $c2[$i] = ($ram1[$i] + $ram3) % 255;
            $c1new[$i] = chr($c1[$i]);
            $c2new[$i] = chr($c2[$i]);
        }
        // DEKRIPSI
        // konversi
        for ($i = 0; $i < $total_p; $i++){
            $ram4[$i] = ord($c1new[$i]);
            $ram5[$i] = ord($c2new[$i]);
        }
        // rumus
        for ($i = 0; $i < $total_p; $i++) {
            $P[$i] = round(($ram2 - $ram3 * $ram4[$i] / $ram5[$i]) / ($ram4[$i] / $ram5[$i] - 1)) % 255;
            $Pnew[$i] = chr($P[$i]);
        }
        // menampilkan enkripsi
        echo "Hasil Enkripsi : ";
        for ($i = 0; $i < $total_p; $i++) {
            echo $c1new[$i] . $c2new[$i];
        }
        echo "<br>";
        // menampilkan dekripsi
        echo "Hasil Dekripsi : ";
        for ($i = 0; $i < $total_p; $i++) {
            echo $Pnew[$i];
        }
        ?>
    </body>
</html>