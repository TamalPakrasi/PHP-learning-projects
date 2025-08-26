<div
  id="root"
  class="bg-root min-h-[100dvh] py-15 px-5 flex flex-col relative">
  <div class="container-max mx-auto overflow-hidden">
    <?php
    include_once __DIR__ . "/../components/navbar.php";
    include_once __DIR__ . "/../components/header.php";
    ?>
    <div class="card-cover mt-8.5">
      <?php
      if ($active_page === "tasks") {
        include_once __DIR__ . "/../components/task_grid.php";
      } else {
      }
      ?>
    </div>
  </div>
</div>