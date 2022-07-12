<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.php"><img class="me-3 mt-2" src="../assets/img/logor.png" alt="" style="width:245px; height:95px;" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto pt-2 pt-lg-0  font-base">

                <li class="nav-item px-8" data-anchor="data-anchor">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li><a class="nav-link <?php if ($_GET["p"] == "") {
                                            echo 'fw-medium active';
                                        } ?> " aria-current="page" href="index.php">Beranda</a></li>
                <li><a class="nav-link <?php if ($_GET["p"] == "K3pYcERXRDRTNTZPNWk2SW5jeTFSUT09") {
                                            echo 'fw-medium active';
                                        } ?>" href="index.php?p=<?php echo acakacak("encode", "evaluasi") ?>">evaluasi</a></li>
                <!-- <li><a class="nav-link <?php if ($_GET["p"] == "K3pYcERXRDRTNTZPNWk2SW5jeTFSUT09") {
                                                echo 'fw-medium active';
                                            } ?>" href="index.php?p=<?php echo acakacak("encode", "kwhmeter") ?>">kWh Meter</a></li>
          <li><a class="nav-link <?php if ($_GET["p"] == "d0ZsS05UaEVrQlFpREd3Rzd1UVN1dz09") {
                                        echo 'fw-medium active';
                                    } ?>" href="index.php?p=<?php echo acakacak("encode", "segel") ?>">Segel</a></li>
          <li><a class="nav-link <?php if ($_GET["p"] == "cjhWcUlZckE3cExzQzdmZUY1R0FJdz09") {
                                        echo 'fw-medium active';
                                    } ?>" href="index.php?p=<?php echo acakacak("encode", "metergas") ?>">Meter Gas</a></li>
          <li><a class="nav-link <?php if ($_GET["p"] == "eXVNMGpFN3NTSHg0NTM3YTFuNzNVUT09") {
                                        echo 'fw-medium active';
                                    } ?>" href="index.php?p=<?php echo acakacak("encode", "kwhsegel") ?>">kWh Meter & Segel</a></li> -->






            </ul>
            <form class="ps-lg-5">
                <!-- <a class="btn btn-outline-primary order-0" href="signin.php">Masuk</a> -->

            </form>
        </div>
    </div>
</nav>