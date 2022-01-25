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
    <meta name="viewport" content="wid_memberth=device-wid_memberth, initial-scale=1.0">
    <title>Member Laundry</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php include("navbar.html");?>
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h4 class="text-white text-center">
                    Data Member Laundry
                </h4>
                <a href="form-member.php">
                    <button class="btn btn-white form-control">
                        Tambah Member
                    </button>
                </a>
            </div>

            <div class="card-body">
                <form action="list-member.php" method="get">
                    <input type="text" name="search" class="form-control mb-2"
                    placeholder="Search">
                </form>

                <ul class="list-group">
                <?php
                include("connection.php");
                if (isset($_GET["search"])) {
                    $search = $_GET["search"];

                    $sql = "select * from member where id_member like '%$search%'
                    or nama_member like '%$search%'
                    or alamat like '%$search%'
                    or jenis_kelamin like '%$search%'
                    or telepon like '%$search%'";
                }else {
                    $sql = "select * from member";
                }

                $query = mysqli_query($connect, $sql);
                while ($member = mysqli_fetch_array($query)) {
                    ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-9 col-md-10">
                                <h4><b><?php echo $member["nama_member"];?></b></h4>
                                <h6>ID Member : <?php echo $member["id_member"];?></h6>
                                <h6>Alamat : <?php echo $member["alamat"];?></h6>
                                <h6>Jenis Kelamin : <?php echo $member["jenis_kelamin"];?></h6>
                                <h6>Telepon : <?php echo $member["telepon"];?></h6>
                            </div>

                            <div class="col-lg-3 col-md-2">
                                <a href="form-member.php?id_member=<?php echo $member["id_member"];?>">
                                    <button class="btn btn-block btn-primary mb-2">
                                        Edit
                                    </button>
                                </a>

                                <a href="delete-member.php?id_member=<?=$member["id_member"];?>"
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