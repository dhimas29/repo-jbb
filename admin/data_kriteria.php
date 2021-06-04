<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "includes/head.php"; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include "includes/header.php"; ?>
        <?php include "includes/sidebar.php"; ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Data Kriteria</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Data Kriteria</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Data Kriteria</h3>
                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <?php
                                include "../database/connect.php";
                                $query = "SELECT * FROM tb_jenis_produk";
                                $result = mysqli_query($mysqli, $query);

                                ?>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kriteria</th>
                                                <th colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $row['nama_jenis'] ?></td>
                                                    <td><a href="" class="btn btn-warning btn-sm">Edit</a> |
                                                        <a href="" class="btn btn-danger btn-sm">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                        } ?>
                                            </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>



        <?php include "includes/footer.php"; ?>
        <?php include "includes/js.php"; ?>
    </div>
</body>

</html>