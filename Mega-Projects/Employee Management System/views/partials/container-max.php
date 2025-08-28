<div class="container-max mx-auto relative">
  <?php
  include_once __DIR__ . "/../components/navbar.php";
  ?>

  <div class="overflow-hidden">
    <?php include_once __DIR__ . "/../components/header.php"; ?>

    <div class="card-cover mt-8.5">
      <?php
      if ($active_page === "tasks") {
        include_once __DIR__ . "/../components/task_grid.php";
      } else {
        include_once __DIR__ . "/../components/emp_grid.php";
      }
      ?>
    </div>

    <ul class="mt-8.5 flex flex-col gap-4 max-h-150 overflow-y-scroll border-y-1 border-gray-700 py-3">
      <?php
      if ($active_page === "tasks") {
        include_once __DIR__ . "/../components/task_list.php";
      } else {
        include_once __DIR__ . "/../components/emp_list.php";
      }
      ?>
    </ul>
  </div>
</div>