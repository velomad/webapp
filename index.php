<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>


    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/23412c6a8d.js"></script>

    <!-- Custom Style-->


     <link rel="stylesheet" href="./css/style.css">  

    
    <link rel="stylesheet" href="./css/IndexStyle.css">
</head>

<body>

    <div class="container">
        <div class="panel">
            <div class="row">
                <div class="col liquid">
                    <h4><i class="fas fa-drafting-compass"></i>Peaks & Arrow</h4>

                    <!-- Owl-Carousel -->

                    <div class="owl-carousel owl-theme">
                        <img src="./assets/undraw_authentication_fsn5.svg" alt="" class="login_img">
                        <img src="./assets/undraw_personal_data_29co.svg" alt="" class="login_img">
                        <img src="./assets/undraw_fingerprint_swrc.svg" alt="" class="login_img">
                    </div>

                    <!-- /Owl-Carousel -->

                    
                </div>
                <div class="col login">

                   
                    <form  accept-charset="UTF-8"  role="form" class="form-signin" method="POST" action="logincheck.php">
                        <div class="titles">
                            
                            <h3>Admin Login</h3>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Usename" name="user" class="form-input" autocomplete="off" required>
                            <div class="input-icon">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="pass" class="form-input" autocomplete="off" required> 
                            <div class="input-icon">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>

                        <button type="submit" name="submit" value="login" class="btn btn-login">Login</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                items: 1
            });
        });
    </script>
</body>

</html>