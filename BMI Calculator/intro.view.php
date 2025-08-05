<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <style>
    .h-full {
      height: 100dvh !important;
    }

    .mx-auto {
      margin-inline: auto !important;
    }

    .w-fit {
      width: fit-content !important;
    }
  </style>
  <title>BMI Calculator</title>
</head>

<body>
  <div id="root" class="w-100 h-full d-flex flex-column justify-content-center align-items-center text-bg-dark gap-3">
    <h2 class="text-uppercase">bmi calculator</h2>
    <form action="./intro.php" method="post" class="w-25">
      <div class="mb-3">
        <label for="wt" class="form-label">Weight in Kilograms</label>
        <input type="number" class="form-control" name="weight" id="wt" min=1 step="0.01" required>
      </div>
      <div class="mb-3">
        <label for="height" class="form-label">Height in meters</label>
        <input type="number" class="form-control" id="height" name="height" min=1 step="0.01" required>
      </div>
      <button type="submit" class="d-inline-block btn btn-primary">Calculate</button>
    </form>

    <?php if (!empty($response)) : ?>
      <h2>Metric Results:</h2>
      <?php foreach ($response as $key => $value) : ?>
        <div class="w-25 p-2 rounded-2 bg-white text-black text-center fw-bold" style="user-select: none;">
          <?php echo "$key: $value" ?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <script>
    const url = new URL(location);
    if (url.searchParams.has("msg")) {
      url.searchParams.delete("msg");
      window.history.replaceState({}, document.title, url.pathname);
    }
  </script>

</body>

</html>