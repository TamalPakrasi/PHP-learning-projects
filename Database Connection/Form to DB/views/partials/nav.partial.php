<?php

$buttons = array("Sign up", "Sign in");

?>

<nav class="py-3 px-6 border-b sticky-navbar flex-between">
  <div class="navbar-start">
    <a href="/">
      <img src="/assets/images/php.png" alt="php" width="64" height="64">
    </a>
  </div>
  <div class="navbar-end gap-2">
    <?php foreach ($buttons as $btn) : ?>
      <button class="signing-btns btn btn-blue-500 hover:btn-blue-600"><?php echo $btn; ?></button>
    <?php endforeach; ?>
  </div>
</nav>