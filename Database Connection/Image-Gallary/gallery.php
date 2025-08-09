<?php
$title = "Gallery";

require_once __DIR__ . "/partials/head.php";
?>

<body>
  <div id="root" class="d-flex flex-column position-relative">
    <?php require_once __DIR__ . "/partials/nav.php"; ?>

    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center py-5">
      <h2>Gallery</h2>
      <section class="row row-gap-5 w-50 mt-5">
        <div class="col-12 rounded-3 p-3" style="box-shadow: 0px 0px 20px 0px black;">
          <div class="overflow-hidden rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1AKF7LelsXtbK8YAYYdiPrDMZdFd74ZTgkQ&s" alt="" class="w-100 ratio-16x9 object-fit-cover">
          </div>
          <div class="mt-3 d-flex gap-3 align-items-center">
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
          </div>
        </div>
        <div class="col-12 rounded-3 p-3" style="box-shadow: 0px 0px 20px 0px black;">
          <div class="overflow-hidden rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1AKF7LelsXtbK8YAYYdiPrDMZdFd74ZTgkQ&s" alt="" class="w-100 ratio-16x9 object-fit-cover">
          </div>
          <div class="mt-3 d-flex gap-3 align-items-center">
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
          </div>
        </div>
        <div class="col-12 rounded-3 p-3" style="box-shadow: 0px 0px 20px 0px black;">
          <div class="overflow-hidden rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1AKF7LelsXtbK8YAYYdiPrDMZdFd74ZTgkQ&s" alt="" class="w-100 ratio-16x9 object-fit-cover">
          </div>
          <div class="mt-3 d-flex gap-3 align-items-center">
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
          </div>
        </div>
        <div class="col-12 rounded-3 p-3" style="box-shadow: 0px 0px 20px 0px black;">
          <div class="overflow-hidden rounded-3">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1AKF7LelsXtbK8YAYYdiPrDMZdFd74ZTgkQ&s" alt="" class="w-100 ratio-16x9 object-fit-cover">
          </div>
          <div class="mt-3 d-flex gap-3 align-items-center">
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
            <span class="badge text-bg-primary p-2">New</span>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>