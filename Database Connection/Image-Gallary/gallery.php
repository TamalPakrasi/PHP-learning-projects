<?php

require_once __DIR__ . "/connect.php";
require_once __DIR__ . "/dumpDie.php";

$sql = "SELECT * FROM `gallery`";

if (isset($_GET["filter"])) {
  $tagnames = (string) $_GET["filter"];
  if (strlen($tagnames) > 0) {
    $tagsArr = (array) explode(',', $tagnames);
    $sql .= "WHERE FIND_IN_SET('{$tagsArr[0]}', REPLACE(tags, ' ', ''))";
    if (count($tagsArr) > 1) {
      foreach ($tagsArr as $index => $tagname) {
        if ($index === 0) continue;
        else $sql .= "AND FIND_IN_SET('$tagname', REPLACE(tags, ' ', ''))";
      }
    }
  }
}

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

      <?php if (isset($_GET["filter"])) : ?>
        <div class="my-3">
          <h5 class="text-decoration-underline mb-3 text-center">Filter By</h5>
          <div class="d-flex align-items-center gap-2" style="width: 400px;">
            <?php foreach ($tagsArr as $tagname) : ?>
              <div class="badge text-bg-primary p-2">
                <span><?php echo $tagname; ?></span>
                <span class="ms-2 close-filter" data-id="<?php echo $tagname; ?>" style="cursor: pointer;">&cross;</span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>


      <section class="row row-gap-5 w-50 mt-5">
        <?php
        $loopRunning = false;
        while ($data = mysqli_fetch_assoc($res)) :
          $loopRunning = true;
        ?>
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

        <?php if (!$loopRunning) : ?>
          <h3 class="text-center">No Image</h3>
        <?php endif; ?>
      </section>
    </main>
  </div>

  <script>
    const alert = document.getElementById("alert");
    const closeAlert = document.getElementById("close-alert");
    const tags = document.querySelectorAll(".tag");
    const closeFilter = document.querySelectorAll(".close-filter");

    if (closeAlert) {
      closeAlert.addEventListener("click", () => {
        alert.style.animation = "none";
      })
    }

    if (tags) {
      tags.forEach(tag => {
        tag.addEventListener("click", (e) => {
          const url = new URLSearchParams(location.search);
          let filter = url.get("filter") ?? "";
          const tagname = e.currentTarget.innerText.toLowerCase();
          const regex = new RegExp(`^${tagname}$`, "i");
          if (filter.search(regex) === -1) {
            filter += (filter.length > 0 ? "," : "") + tagname;
            location.href = `gallery.php?filter=${filter}`;
          }
        })
      })
    }

    if (closeFilter) {
      closeFilter.forEach(btn => {
        btn.addEventListener("click", (e) => {
          const url = new URLSearchParams(location.search);
          const filter = url.get("filter").toString().split(",");
          const tagname = e.currentTarget.dataset.id;
          if (filter.includes(tagname)) {
            const newFilter = filter.filter(tag => tag !== tagname).join(',');
            location.href = newFilter.length > 0 ? `gallery.php?filter=${newFilter}` : "gallery.php";
          }
        })
      })
    }
  </script>
</body>

</html>