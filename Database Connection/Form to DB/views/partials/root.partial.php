<?php require_once __DIR__ . "/../../utils/functions/outlet.php" ?>

<div id="root">
  <?php include __DIR__ . "/nav.partial.php"; ?>
  <main class="flex-center w-full flex-grow-1 py-6">
    <?php include __DIR__ . outlet($page); ?>
  </main>
</div>