<?php $mainPath = "/PHP-Mini%20Projects/Basic%20Routing%20Trial"; ?>

<div class="navbar bg-base-100 shadow-sm sticky top-0 left-0 z-99">
  <div class="navbar-start">
    <a class="btn btn-ghost text-xl">daisyUI</a>
  </div>
  <div class="navbar-center ">
    <ul class="menu menu-horizontal px-1">
      <li>
        <a href="<?= $mainPath ?>/home" class="<?= isURl("{$mainPath}/home"); ?>">
          Home
        </a>
      </li>
      <li>
        <a href="<?= $mainPath ?>/about" class="<?= isURl("{$mainPath}/about"); ?>">
          About
        </a>
      </li>
      <li>
        <a href="<?= $mainPath ?>/contact" class="<?= isURl("{$mainPath}/contact"); ?>">Contact
        </a>
      </li>
    </ul>
  </div>
  <div class="navbar-end">
    <a class="btn cursor-not-allowed">I have no Function</a>
  </div>
</div>