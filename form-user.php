<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid_userth=device-wid_userth, initial-scale=1.0">
    <title>Form User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Form User Laundry
                </h4>
            </div>

            <div class="card-body">
            <?php
                if (isset($_GET["id_user"])) {
                    include("connection.php");
                    $id_user = $_GET["id_user"];
                    $sql = "select * from user where id_user='$id_user'";

                    //eksekusi perintah sql
                    $ubah = mysqli_query($connect, $sql);

                    // konversi hasil query ke bentuk array
                    $user = mysqli_fetch_array($ubah);
                    ?>

                    <form action="process-user.php" method="post"
                    onsubmit="return confirm('Are you sure?')">
                    
                        ID User
                        <input type="text" name="id_user"
                        class="form-control mb-2" required
                        value="<?=$user["id_user"];?>" readonly>

                        Nama User
                        <input type="text" name="nama_user"
                        class="form-control mb-2" required
                        value="<?=$user["nama_user"];?>">

                        Username
                        <input type="text" name="username"
                        class="form-control mb-2" required
                        value="<?=$user["username"];?>">

                        Password
                        <input type="password" name="password"
                        class="form-control mb-2"
                        value="<?=$user["password"];?>">

                        Role
                        <select name="role" class="form-control mb-2" required>
                                <option value="<?=$user["role"];?>" selected><?=$user["role"];?></option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                        </select>

                        <button type="submit" class="btn btn-dark btn-block"
                        name="edit">
                            Simpan
                        </button>
                    </form>
                <?php
                }else{
                    //jika false, menggunakan ini untuk insert
                ?>
                    <form action="process-user.php" method="post">

                        Nama User
                        <input type="text" name="nama_user"
                        class="form-control mb-2" required>

                        Username
                        <input type="text" name="username"
                        class="form-control mb-2" required>
                        
                        Password
                        <input type="password" name="password"
                        class="form-control mb-2" required>

                        Role
                        <select name="role" class="form-control mb-2" required>
                             <option value="Admin">Admin</option>
                             <option value="Kasir">Kasir</option>
                        </select>

                        <button type="submit" class="btn btn-dark btn-block"
                        name="simpan_user">
                            Save
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