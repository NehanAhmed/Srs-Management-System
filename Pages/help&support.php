<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & Support - Letsers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/Css/faqs.css">
</head>

<body>
    <?php include "../Partials/main-header.php" ?>
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <h1 class="display-4">Need Help? We're Here!</h1>
                    <p class="lead">Explore our resources to navigate the application and resolve any issues you may encounter.</p>
                    <a href=""><button class="btn btn-outline-light">Learn More</button></a>
                    <a href=""><button class="btn btn-outline-light">Contact Us</button></a>
                </div>
            </div>
        </div>
    </section>

    <section class="faq-section py-5 bg-light text-dark mt-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">FAQs</h2>
            <p class="text-muted">Find answers to your questions about navigating and troubleshooting our application.</p>
        </div>

        <div class="container mt-4">
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <!-- FAQ Item Template -->
                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion1">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How to reset password?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">
                                    To reset your password, go to the login page and click on "Forgot Password?" Follow the instructions sent to your registered email to create a new password. Make sure to check your spam folder if you don’t see the email.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion2">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How to submit feedback?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion2">
                                <div class="accordion-body">
                                    You can submit feedback through the "Contact Us" form available in the Help section. Please provide detailed information about your experience to help us improve. We value your input and strive to enhance our application.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion3">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Where to find guides?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion3">
                                <div class="accordion-body">
                                    User guides are available in the Help section of the application. You can access them anytime for step-by-step instructions on various features. These guides are designed to assist you in maximizing your experience.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion4">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What to do if stuck?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion4">
                                <div class="accordion-body">
                                    If you find yourself stuck, refer to the FAQ section for common issues and solutions. Additionally, you can reach out to our support team via the contact form for personalized assistance. We're here to help you navigate any challenges.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion5">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How to update profile?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion5">
                                <div class="accordion-body">
                                    To update your profile, log in and navigate to the 'Profile' section. Here, you can edit your personal information and save changes. Ensure your details are current to receive important notifications.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion6">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How to report issues?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion6">
                                <div class="accordion-body">
                                    If you encounter any issues, please use the 'Report an Issue' feature in the application. Provide a detailed description of the problem to facilitate a quick resolution. Our technical support team will address your concerns promptly.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion7">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    How to access support?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion7">
                                <div class="accordion-body">
                                    You can access support by visiting the Help section and filling out the contact form. Our support team is available to assist you with any questions or concerns. Expect a response within 24 hours.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion8">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    How to change language?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion8">
                                <div class="accordion-body">
                                    To change the application language, go to the settings menu and select your preferred language from the options. The application will refresh to display content in your chosen language. This feature enhances accessibility for all users.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion9">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                    How to log out?
                                </button>
                            </h2>
                            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion9">
                                <div class="accordion-body">
                                    To log out, click on your profile icon located at the top right corner. Select 'Log Out' from the dropdown menu. This ensures your account remains secure when you're finished using the application.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="accordion bg-custom" id="faqAccordion10">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    How to view history?
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion10">
                                <div class="accordion-body">
                                    You can view your activity history by navigating to the 'History' section in your profile. This section provides a comprehensive log of your actions within the application. It's useful for tracking your progress and reviewing past interactions.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="support-section text-center py-5">
            <div class="container">
                <h2 class="fw-bold mb-3">Still have questions?</h2>
                <p class="text-muted mb-4">Reach out to our support team for assistance.</p>
                <a href=""><button class="btn btn-outline-dark support-contact-btn">Contact</button></a>
            </div>
        </section>
    </section>

    <?php include "../Partials/main-footer.php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>