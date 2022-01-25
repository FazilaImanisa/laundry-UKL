<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid_paketth=device-wid_paketth, initial-scale=1.0">
    <title>Form Paket</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Form Paket Laundry
                </h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_paket"])){
                    include "connection.php";
                    $id_paket = $_GET["id_paket"];
                    $sql = "select * from paket where id_paket='$id_paket'";
                    $hasil = mysqli_query($connect, $sql);
                    $paket = mysqli_fetch_array($hasil);
                    ?>

                    <form action="process-paket.php" method="post"
                    onsubmit="return confirm('Are you sure?')">

                    ID Paket
                    <input type="text" name="id_paket" 
                    class="form-control mb-2" required
                    value="<?=$paket["id_paket"];?>" readonly />

                    Jenis Paket
                        <select name="jenis" class="form-control mb-2" required>
                                <option value="<?=$paket["jenis"];?>" selected><?=$paket["jenis"];?></option>
                                <option value="Kiloan">Kiloan</option>
                                <option value="Selimut">Selimut</option>
                                <option value="Bed Cover">Bed Cover</option>
                                <option value="Kaos">Kaos</option>
                        </select>

                    Harga 
                    <input type="text" name="harga" 
                    class="form-control mb-2" required
                    value="<?=$paket["harga"];?>" />

                    <button type="submit" class="btn btn-dark btn-block"
                    name="edit_paket">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form paket digunakan untuk insert
                    ?>
                    <form action="process-paket.php" method="post">

                    Jenis Paket
                    <select name="jenis" class="form-control mb-2" required>
                             <option value="Kiloan">Kiloan</option>
                             <option value="Selimut">Selimut</option>
                             <option value="Bed Cover">Bed Cover</option>
                             <option value="Kaos">Kaos</option>
                    </select>

                    Harga
                    <input type="number" name="harga" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-dark btn-block"
                    name="simpan_paket">
                        Simpan
                    </button>
                </form>
            <?php
            }
            ?>
                
        </div>
    </div>
</div>
</body>
</html>