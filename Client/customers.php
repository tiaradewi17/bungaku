<?php
include "client-customers.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Florists</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light" id="navigasi">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Florists</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active fw-bold" id="navbarDropdown" href="customers.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Customers</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item active" href="customers.php">Data Customer</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-customers.php">Tambah Customer</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="products.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="products.php">Data Product</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-products.php">Tambah Product</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="orders.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Orders</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="orders.php">Data Order</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="form-orders.php">Tambah Order</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header-->
    <header class="bg-dark py-2">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Customers</h1>
                <p class="lead fw-normal text-white-50 mb-0">Data Customer</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="main-1">
            <div class="container">
                <div class="table-responsive-lg">
                    <table class="table caption-top">
                        <caption class="text-center">Daftar Customer</caption>
                        <thead class="table-dark text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Customer</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">ID Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border text-center align-middle text-wrap">
                            <?php $no = 1;
                            $data_array = $abc->tampil_semua_customers();
                            foreach ($data_array as $r) {
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $r->customer_id ?></td>
                                    <td><?= $r->first_name ?></td>
                                    <td><?= $r->last_name ?></td>
                                    <td><?= $r->email ?></td>
                                    <td><?= $r->phone_number ?></td>
                                    <td><?= $r->level_id ?></td>
                                    <td>
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <a class="btn btn-outline-primary btn-sm" type="button" a href="ubah-customers.php?customer_id=<?= $r->customer_id ?>">Ubah</a>
                                            <a class="btn btn-outline-danger btn-sm" type="button" a href="proses-customers.php?aksi=hapus&customer_id=<?= $r->customer_id ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini?')">Hapus</a>
                                        </div>
                                    </td>

                                </tr>
                            <?php $no++;
                            }
                            unset($data_array, $r, $no);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Intan Tiara Dewi - Iqlima Rahmafitri Karinda 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>