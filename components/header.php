<div class="w-100 position-sticky top-0 gradiant" style="z-index: 20;">
    <header class="py-3">
        <div class="container-lg">
            <div class="row align-items-center justify-content-around">
                <div class="col d-flex ps-3 align-items-center">
                    <img src="./img/home_made_logo.png" height="18%" width="18%" class="logo-size">
                    <a href="index.php" class="nav-link text-start d-flex align-items-start flex-column ps-3 justify-content-between">
                        <h3 class="m-0 fw-bolder">لِباسِتون</h3>
                        <h6 class="m-0">آموزشگاه انلاین خیاطی</h6>
                    </a>
                </div>

                <div class="col d-none d-xl-block">
                    <nav class="navbar d-flex">
                        <li class="nav-item"><a href="index.php" class="nav-link">خانه</a></li>
                        <li class="nav-item"><a href="prodoucts.php" class="nav-link">دوره ها</a></li>
                        <li class="nav-item"><a href="contact_us.php" class="nav-link">تماس با ما</a></li>
                        <li class="nav-item"><a href="about_us.php" class="nav-link">درباره ما</a></li>
                    </nav>
                </div>

                <div class="col d-flex p-0 m-0 ms-lg-auto justify-content-end pe-3">
                    <a href="cart.php" class="position-relative btn-cart p-1 d-flex align-items-center justify-content-center p-2 rounded-3 text-decoration-none logo-size">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cart w-100 h-100" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <?php
                        if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) {
                            $user_id = $_SESSION["user_id"];
                            $DB_user_cart = mysqli_fetch_all(mysqli_query($connection, "SELECT `cart` FROM `users` WHERE id = '$user_id'"), MYSQLI_ASSOC);
                            $user_cart = json_decode($DB_user_cart[0]["cart"]);
                            $count = $user_cart ? 0 : count($user_cart);?>
                            <span class="cart-counter"><?=$count?></span>
                        <?php } else { ?>
                            <span class="cart-counter">0</span>
                        <?php }
                        ?>
                    </a>
                    <?php
                    if (isset($_SESSION["is_user_logedin"]) || isset($_COOKIE["is_user_logedin"])) { ?>
                        <a href="./profile_main.php" class="btn-login ms-1 p-2 border d-flex align-items-center rounded-3 logo-size">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle w-100 h-100" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </a>
                    <?php } else {?>
                        <a href="./login.php" class="btn-login ms-1 border d-flex align-items-center p-2 rounded-3 logo-size">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-circle w-100 h-100" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </a>
                    <?php } ?>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn-search p-1 ms-1 d-flex logo-size align-items-center justify-content-center p-2 rounded-3 text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-search w-100 h-100" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </a>
                    <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" class="btn-menu p-1 logo-size ms-1 d-flex align-items-center justify-content-center p-2 rounded-3 text-decoration-none d-block d-xl-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-list w-100 h-100" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bolder">جست و جو</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="input-group input-group-lg" method="get" action="./search.php">
                    <input placeholder="جست و جو متن مورد نظر :" class="form-control" name="search_value">
                    <button class="btn btn-warning" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">منو</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <nav class="navbar d-flex flex-column">
            <li class="nav-item"><a href="index.php" class="nav-link">خانه</a></li>
            <br />
            <li class="nav-item"><a href="prodoucts.php" class="nav-link">دوره ها</a></li>
            <br />
            <li class="nav-item"><a href="contact_us.php" class="nav-link">تماس با ما</a></li>
            <br />
            <li class="nav-item"><a href="about_us.php" class="nav-link">درباره ما</a></li>
        </nav>
    </div>
</div>