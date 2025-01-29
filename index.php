<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Web Page</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./Assets/Css/style.css">
</head>

<body>
    <!-- Navbar -->
    <?php include "./Partials/main-header.php" ?>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4">Streamline Your Electrical Testing Processes Today</h1>
                    <p class="lead">Welcome to the future of electrical product testing with our innovative software application. Experience enhanced accuracy, efficiency, and transparency in your testing workflows.</p>
                    <button class="btn btn-outline-light">Learn More</button>
                </div>
                <div class="col-lg-6">



                    <spline-viewer url="https://prod.spline.design/x9twOAr27LbCF3qW/scene.splinecode"></spline-viewer>

                </div>
            </div>
        </div>
    </section>

    <!-- Testing Section -->
    <section class="testing bg-light text-dark py-5">
        <div class="container text-center">
            <h1 class="mb-4 fs-30">Streamline Your Testing Process</h1>
            <p class="mb-4 fs-20">Stay informed with real-time updates on the number of products tested and their current statuses. Easily track pending workflows to ensure nothing falls through the cracks.</p>
            <img class="w-100 rounded" src="https://images.squarespace-cdn.com/content/v1/5b7d9ea73917ee404ce300de/1541798440530-L3LT0RUI9DZZLYRXJAA8/GettyImages-2694352.jpg?format=1500w" alt="Testing Process">
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container text-center">
            <h1 class="mb-4">Explore Our Key Application Modules</h1>
            <p class="mb-5">Our application offers streamlined access to essential modules. Quickly manage testing records, oversee product details, and track workflows with ease.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card bg-dark text-white feature-card">
                        <img class="card-img-top" src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg" alt="Feature">
                        <div class="card-body">
                            <h5 class="card-title">Testing Records</h5>
                            <p class="card-text">Easily log and review all testing results.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white feature-card">
                        <img class="card-img-top" src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg" alt="Feature">
                        <div class="card-body">
                            <h5 class="card-title">Product Management</h5>
                            <p class="card-text">Organize and manage your products effortlessly.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-dark text-white feature-card">
                        <img class="card-img-top" src="https://img.freepik.com/free-vector/white-product-podium-with-green-tropical-palm-leaves-golden-round-arch-green-wall_87521-3023.jpg" alt="Feature">
                        <div class="card-body">
                            <h5 class="card-title">Workflow Tracking</h5>
                            <p class="card-text">Stay updated on your testing workflows in real-time.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Insights Section -->
    <section class="insights bg-light text-dark py-5">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-6 text-lg-start mb-4 mb-lg-0">
                    <h5 class="text-uppercase">Insights</h5>
                    <h1 class="fw-bold">Stay Updated on Testing Progress</h1>
                    <p>Get real-time updates on the status of your testing workflows. Monitor the number of products tested and track submissions to the Central Power Research Institute (CPRI). Stay informed and enhance your operational efficiency.</p>
                    <button class="btn btn-outline-light">Learn More</button>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-4">
                            <h1 class="fw-bold">75%</h1>
                            <p>Testing Completion Rate</p>
                        </div>
                        <div class="col-4">
                            <h1 class="fw-bold">50%</h1>
                            <p>Pending Submissions</p>
                        </div>
                        <div class="col-4">
                            <h1 class="fw-bold">20%</h1>
                            <p>Failed Tests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include "./Partials/main-footer.php" ?>


    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>