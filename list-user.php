<?php
session_start();
# jika saat load halaman ini, pastikan telah login 
if (!isset($_SESSION["user"])) {
    header("location:login2.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid_userth=device-wid_userth, initial-scale=1.0">
    <title>List User</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
</head>
<body>
<?php include("navbar.html");?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Data User
                </h4>
                <a href="form-user.php">
                    <button class="btn btn-white form-control">
                        Tambah User
                    </button>
                </a>
            </div>

            <div class="card-body">
                <form action="list-user.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Search" required>
                </form>

                <ul class="list-group">
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $search = $_GET["search"];

                    $sql = "select * from user where id_user like'%$search%'
                    or nama_user like '%$search%'
                    or username like '%$search%'
                    or role like '%$search'";
                }else{
                    $sql = "select * from user";
                }

                //eksekusi perintah SQL
                $query = mysqli_query($connect, $sql);
                while ($user = mysqli_fetch_array($query)) {
                ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-9 col-md-10">
                                <h4><b><?php echo $user["nama_user"];?></b></h4>
                                <h6>ID User : <?php echo $user["id_user"];?></h6>
                                <h6>Username : <?php echo $user["username"];?></h6>
                                <h6>Role : <?php echo $user["role"];?></h6>
                            </div>

                            <div class="col-lg-3 col-md-2">
                                <a href="form-user.php?id_user=<?php echo $user["id_user"];?>">
                                    <button class="btn btn-block btn-primary mb-2">
                                        Edit
                                    </button>
                                </a>

                                <a href="delete-user.php?id_user=<?=$user["id_user"];?>"
                                    onclick="return confirm('Hapus Data Ini?')">
                                    <button class="btn btn-block btn-danger">
                                        Hapus
                                    </button>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
            
        </div>
    </div>
</body>
</html>