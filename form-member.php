<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid_memberth=device-wid_memberth, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Form Member Laundry
                </h4>
            </div>

            <div class="card-body">
                <?php
                if(isset($_GET["id_member"])){
                    include "connection.php";
                    $id_member = $_GET["id_member"];
                    $sql = "select * from member where id_member='$id_member'";
                    $hasil = mysqli_query($connect, $sql);
                    $member = mysqli_fetch_array($hasil);
                    ?>

                    <form action="process-member.php" method="post"
                    onsubmit="return confirm('Are you sure?')">

                    ID Member
                    <input type="text" name="id_member" 
                    class="form-control mb-2" required
                    value="<?=$member["id_member"];?>" readonly />

                    Nama 
                    <input type="text" name="nama_member" 
                    class="form-control mb-2" required
                    value="<?=$member["nama_member"];?>" />

                    Alamat 
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required
                    value="<?=$member["alamat"];?>" />

                    Jenis Kelamin
                        <select name="jenis_kelamin" class="form-control mb-2" required>
                                <option value="<?=$member["jenis_kelamin"];?>" selected><?=$member["jenis_kelamin"];?></option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                        </select>

                    Telepon 
                    <input type="text" name="telepon" 
                    class="form-control mb-2" required
                    value="<?=$member["telepon"];?>" />

                    <button type="submit" class="btn btn-dark btn-block"
                    name="edit_member">
                        Simpan
                    </button>
                    </form>
                    <?php
                }else{
                    // jika false, maka form member digunakan untuk insert
                    ?>
                    <form action="process-member.php" method="post">

                    Nama 
                    <input type="text" name="nama_member" 
                    class="form-control mb-2" required />

                    Alamat 
                    <input type="text" name="alamat" 
                    class="form-control mb-2" required />

                    Jenis Kelamin
                    <select name="jenis_kelamin" class="form-control mb-2" required>
                             <option value="Perempuan">Perempuan</option>
                             <option value="Laki-Laki">Laki-Laki</option>
                    </select>

                    Telepon
                    <input type="text" name="telepon" 
                    class="form-control mb-2" required />

                    <button type="submit" class="btn btn-dark btn-block"
                    name="simpan_member">
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