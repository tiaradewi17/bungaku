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
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="customers.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Customer</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="customers.php">Data Customer</a></li>
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
                        <a class="nav-link dropdown-toggle active fw-bold" id="navbarDropdown" href="orders.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">Orders</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="orders.php">Data Order</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item active" href="form-orders.php">Tambah Order</a></li>
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
                <h1 class="display-4 fw-bolder">Tambah Order</h1>
                <p class="lead fw-normal text-white-50 mb-0">Orderan Lengkap</p>
            </div>
        </div>
    </header>

    <!-- Section-->
    <section class="py-5">
        <div class="main-1">
            <form name="form" class="container" method="POST" action="proses-orders.php">
                <input type="hidden" name="aksi" value="tambah" />
                <div class="mb-3">
                    <label class="form-label">ID Order</label>
                    <input type="text" class="form-control" name="order_id" id="formGroupExampleInput" placeholder="Silahkan isi ID Order">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">ID Customer</label>
                    <input type="text" class="form-control" name="customer_id" id="formGroupExampleInput2" placeholder="Silahkan isi ID Customer">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Order Date</label>
                    <input type="text" class="form-control" name="order_date" id="formGroupExampleInput2" placeholder="Silahkan isi Order Date">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Total Amount</label>
                    <input type="text" class="form-control" name="total_amount" id="formGroupExampleInput2" placeholder="Silahkan isi Total Amount">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Shipping Address</label>
                    <input type="text" class="form-control" name="shipping_address" id="formGroupExampleInput2" placeholder="Silahkan isi Shipping Address">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">ID Product</label>
                    <input type="text" class="form-control" name="product_id" id="formGroupExampleInput2" placeholder="Silahkan isi ID Product">
                </div>
                <div class="col-auto">
                    <button type="submit" name="simpan" class="btn btn-primary">Tambah Order</button>
                </div>
            </form>
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