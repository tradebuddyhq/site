<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trade Buddy</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,500,700|Fira+Sans:600" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <script src="https://unpkg.com/animejs@2.2.0/anime.min.js"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="header-shape header-shape-1">
                <svg width="337" height="222" viewBox="0 0 337 222" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient x1="50%" y1="55.434%" x2="50%" y2="0%" id="header-shape-1">
                            <stop stop-color="#E0E1FE" stop-opacity="0" offset="0%"/>
                            <stop stop-color="#E0E1FE" offset="100%"/>
                        </linearGradient>
                    </defs>
                    <path d="M1103.21 0H1440v400h-400c145.927-118.557 166.997-251.89 63.21-400z" transform="translate(-1103)" fill="url(#header-shape-1)" fill-rule="evenodd"/>
                </svg>
            </div>
            <div class="header-shape header-shape-2">
                <svg width="128" height="128" viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                    <defs>
                        <linearGradient x1="93.05%" y1="19.767%" x2="15.034%" y2="85.765%" id="header-shape-2">
                            <stop stop-color="#FF3058" offset="0%"/>
                            <stop stop-color="#FF6381" offset="100%"/>
                        </linearGradient>
                    </defs>
                    <circle class="anime-element fadeup-animation" cx="64" cy="64" r="64" fill="url(#header-shape-2)" fill-rule="evenodd"/>
                </svg>
            </div>
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                                <!-- <img src="tb.png" height="75px" width="75px" alt="TB"> -->
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
                        <div class="hero-copy">
                            <h1 class="hero-title mt-0">Trade Buddy</h1> 
                            <p class="hero-paragraph">A trusted marketplace for parents to exchange school essentials - safely, sustainably, and within your school community</p>
                                <a class="button button-primary button-shadow embim" href="login.html">Get started</a>
                                <a class="button button-primary button-shadow embim" href="login.html">Login</a>
                        </div>
                        <div class="hero-illustration">
                            <div class="hero-shape hero-shape-1">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                                    <circle class="anime-element fadeup-animation" cx="20" cy="20" r="20" fill="#FFD8CD" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="hero-shape hero-shape-2">
                                <svg width="88" height="88" xmlns="http://www.w3.org/2000/svg" style="overflow:visible">
                                    <circle class="anime-element fadeup-animation" cx="44" cy="44" r="44" fill="#FFD2DA" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <img src="images/tb.png" height="400px" width="500px">
                        </div>
                    </div>
                </div>
            </section>

            <section class="features section" id="Aboutus">
                <div class="container">
                    <div class="features-inner section-inner">
                        <div class="features-header text-center">
                            
                        </div>
                        <div class="features-wrap" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <h4 class="feature-title h3-mobile mb-8">Why Trade Buddy for Parents?</h4>
                                    <p class="text-sm">We help parents save money, reduce waste, and build a stronger school community by making it easier to exchange, donate, and find school essentials all in one place.</p>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <h4 class="feature-title h3-mobile mb-8">Benefits for Parents</h4>
                                    <ul class="text-sm" style="list-style-position: inside; text-align: left; display: inline-block;">
                                        <li>Save money by reusing and exchanging school essentials</li>
                                        <li>Reduce waste and support sustainability at within your school community</li>
                                        <li>Simplify buying, selling, and donating in one place</li>
                                        <li>Find lost or needed items quickly through dedicated "Wanted" and "Lost & Found" sections</li>
                                        <li>Build community by helping other families and supporting school charity drives</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="feature text-center is-revealing">
                                <div class="feature-inner">
                                    <h4 class="feature-title h3-mobile mb-8">How It Works</h4>
                                    <ul class="text-sm" style="list-style-position: inside; text-align: left; display: inline-block;">
                                        <li>Parents list unwanted school items like uniforms, books, or sports equipment</li>
                                        <li>They can trade, donate, or request items within a trusted parent-only community</li>
                                        <li>Everything happens securely, with simple listings and direct parent-to-parent connections</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="dist/js/main.min.js"></script>

        

</body>
</html><?php include 'footer.php'; ?>

<!-- ...existing code from index.html, with all .html links changed to .php... -->
<!-- The rest of the HTML content will be migrated and updated in the next step. -->
