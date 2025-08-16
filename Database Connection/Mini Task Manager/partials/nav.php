<?php
switch ($title) {
  case 'Users':
    $link = "Tasks";
    $to = "task.php";
    break;
  case 'Tasks':
    $link = "Users";
    $to = "index.php";
    break;
}
?>

<nav class="navbar bg-transparent backdrop-blur-[10px] sticky top-0 left-0 z-8888 shadow-sm">
  <div class="flex-1 ps-2">
    <span class="font-semibold text-ghost text-xl">PHP</span>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="<?php echo $to; ?>"><?php echo $link; ?></a></li>
    </ul>
  </div>
</nav>