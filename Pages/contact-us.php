<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/Css/contact-us.css">
</head>

<body>
    <!-- Header Section -->
    <?php include "../Partials/main-header.php" ?>
    <!-- SOLUTION SECTION -->
    <section class="banner-section d-flex justify-content-center align-items-center text-center" style="background-color: #212529;">
        <div class="container">
            <h1 class="display-5 fw-bold contact-heading">Contact Us</h1>
            <p class="lead banner-para">We're here to assist you with any questions or support you may need.</p>
        </div>
    </section>


    <!-- CONTACT FORM -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="row">
                <!-- Contact Info Column -->
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-2">Get in Touch</h2>
                    <p class="text-muted mb-4">We're here to assist you with any inquiries or support you may need.</p>

                    <!-- Contact Details -->
                    <div class="contact-details">
                        <!-- Email -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Email</h6>
                                <a class="text-dark text-decoration-none" href="mailto:hello@future.st" class="text-decoration-none">hello@future.st</a>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Phone</h6>
                                <a class="text-dark text-decoration-none" ; href="tel:+61434785668" class="text-decoration-none">+61 434 785 668</a>
                            </div>
                        </div>

                        <!-- Office -->
                        <div class="d-flex align-items-center">
                            <div class="icon-wrapper me-3">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Office</h6>
                                <p class="mb-0 text-dark">123 Sample St, Sydney NSW 2000 AU</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map Column -->
                <div class="col-lg-6">
                    <div class="map-wrapper mt-4 mt-lg-0">
                        <iframe class="img-fluid w-100 h-100 object-fit-cover" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.5340499916692!2d67.06268877414553!3d24.981962940387245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e584b891c3%3A0x29b2cbc198ba2dbd!2sAptech%20Computer%20Education%20North%20Karachi%20Center!5e0!3m2!1sen!2s!4v1737897803691!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="bg-dark text-white border-bottom">
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-lg-6">
                    <div class="contact-header">
                        <h1>Let Us Know Your Feedback</h1>
                        <p>We’re here to help with your inquiries and feedback.</p>
                    </div>
                    <div class="contact-details">
                        <p>
                            <i class="bi bi-envelope-fill"></i>
                            <strong>Email</strong>: <a href="mailto:info-nk@aptechnorth.edu.pk" class="text-white">info-nk@aptechnorth.edu.pk</a>
                        </p>
                        <p>
                            <i class="bi bi-telephone-fill"></i>
                            <strong>Phone</strong>: <a href="tel:+123456789" class="text-white">+92 (021) 36930102</a>
                        </p>
                        <p>
                            <i class="bi bi-geo-alt-fill"></i>
                            <strong>Office</strong>: <a href="#" class="text-white">A 563, Main Shahrah-e-Usman, Sector 11-A Sector 11 A North Karachi Twp, Karachi, Karachi City, Sindh 75850</a>
                        </p>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-6 ">
                    <form>

                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" rows="5" name="email" placeholder="Share your thoughts..."></textarea>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="terms">
                            <label class="form-check-label" for="terms">I agree to terms & Condition</label>
                        </div>
                        <button type="submit" class="btn">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <?php include "../Partials/main-footer.php" ?>

    <script src="https://kit.fontawesome.com/0a02fbb60a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>