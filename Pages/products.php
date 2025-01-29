<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Letsers</title>
    <link rel="stylesheet" href="../Assets/Css/products.css">
    <!-- <link rel="stylesheet" href="../Assets/Css/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <?php include '../partials/main-header.php'; ?>
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="quality-badge">Quality</div>
                    <h1 class="display-4 fw-bold mb-4">Electrical Components Store</h1>
                </div>
                <div class="col-md-6">
                    <p class="mb-4">
                        Explore our extensive range of electrical item parts designed for efficiency and reliability. At SRS Electrical Appliances, we ensure that every product meets the highest standards of quality.
                    </p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-outline-dark">Shop</button>
                        <button class="btn btn-outline-dark">Learn More</button>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <?php include "../Partials/product-grid.php" ?>
    <?php include "../Partials/main-footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>