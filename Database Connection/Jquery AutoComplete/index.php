<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./assets/bootstrap-5.3.5-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/jquery-3.7.1.js"></script>
</head>

<body>
  <div id="root" class="text-bg-dark d-flex align-items-center">
    <div class="container-max mx-auto">
      <h2 class="fs-3 fw-bold text-center mb-4">Autocomplete</h2>
      <form class="d-flex w-100 mb-3" id="searchForm">
        <input type="search" name="search" id="search" class="form-control me-2" placeholder="Search..." aria-label="Search" autocomplete="off">
      </form>
      <ul class="list-group w-100" id="autocomplete-list"></ul>
    </div>
  </div>

  <script src="./assets/JS/main.js"></script>
</body>

</html>