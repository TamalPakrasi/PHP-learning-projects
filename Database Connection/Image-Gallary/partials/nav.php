<?php

declare(strict_types=1);
function getNav(): array
{
  global $title;
  $allowedPages = ["Upload", "Gallery"];
  if (in_array($title, $allowedPages)) {
    return $title === "Upload" ? ["target" => "gallery.php", "name" => "gallery"] : ["target" => "upload.php", "name" => "Upload"];
  } else {
    echo "Invalid page!";
    die();
  }
}
?>


<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body position-sticky z-3" data-bs-theme="dark" style="top: 0; left: 0">
  <div class="container-fluid">
    <img src="<?php echo "/favicon.ico"; ?>" alt="logo" height="25" width="25">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php
        $info = getNav();
        echo "<a class='nav-link active' href='{$info["target"]}'>{$info["name"]}</a>";
        ?>
      </div>
    </div>
  </div>
</nav>