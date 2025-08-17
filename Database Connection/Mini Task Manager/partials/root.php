<div id="root" class="min-h-[100dvh] relative flex flex-col">
  <?php include __DIR__ . "/nav.php" ?>
  <main class="flex-grow-1 flex flex-col gap-5 py-10 justify-center items-center">
    <?php
    if ($title === "Users") {
      require_once __DIR__ . "/user.php";
    } elseif ($title === "Tasks") {
      require_once __DIR__ . "/viewTask.php";
    }
    ?>
  </main>
</div>