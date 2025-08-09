<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/dumpDie.php";

$sql = "SELECT * FROM `gallery`";

$res = mysqli_query($conn, $sql);

if (!$res) {
  dumpDie("Something went wrong");
}

?>


<?php
$title = "Gallery";

require_once __DIR__ . "/partials/head.php";
?>

<body>
  <div id="root" class="d-flex flex-column position-relative">
    <?php require_once __DIR__ . "/partials/nav.php"; ?>

    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center py-5 position-relative">

      <?php if (isset($_GET["msg"])) : ?>
        <div id="alert">
          <span><?php echo $_GET["msg"]; ?></span> <span id="close-alert" style="cursor: pointer">&cross;</span>
        </div>
      <?php endif; ?>

      <h2 class="mt-1">Gallery</h2>
      <section class="row row-gap-5 w-50 mt-5">
        <?php while ($data = mysqli_fetch_assoc($res)) : ?>
          <div class="col-12 rounded-3 p-3" style="box-shadow: 0px 0px 20px 0px black;">
            <div class="overflow-hidden rounded-3 border border-black">
              <img src="<?php echo "uploads/" . $data["name"] ?>" alt="" class="w-100 ratio-16x9 object-fit-cover">
            </div>
            <div class="mt-3 d-flex gap-3 align-items-center flex-wrap">
              <?php
              $tagArr = explode(",", $data["tags"]);
              foreach ($tagArr as $tag) : ?>
                <span class="tag badge text-bg-primary p-2" style="cursor: pointer;"><?php echo $tag; ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endwhile; ?>
      </section>
    </main>
  </div>

  <script>
    const alert = document.getElementById("alert");
    const closeAlert = document.getElementById("close-alert");

    closeAlert.addEventListener("click", () => {
      alert.style.animation = "none";
    })
  </script>
</body>

</html>