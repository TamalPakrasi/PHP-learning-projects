<?php
$title = "Upload";

require_once __DIR__ . "/partials/head.php";
?>

<body>
  <div id="root" class="d-flex flex-column position-relative">
    <?php require_once __DIR__ . "/partials/nav.php"; ?>

    <main class="flex-grow-1 d-flex justify-content-center align-items-center">
      <form action="back.php" method="post" enctype="multipart/form-data" class="border p-5 rounded-3 bg-body-tertiary">
        <div class="mb-3">
          <label for="formFile" class="form-label fw-bold">Choose your image :</label>
          <input class="form-control" name="file" type="file" id="formFile" required>
          <div class="pt-3">
            <label for="formTags" class="form-label fw-bold">Tags :</label>
            <input type="text" class="form-control" name="tags" placeholder="e.g: tag1, tag2, tag3" id="formTags" required>
          </div>
          <input type="submit" value="Upload" class="btn btn-primary mt-3 w-100">
        </div>
      </form>
    </main>
  </div>
</body>

</html>