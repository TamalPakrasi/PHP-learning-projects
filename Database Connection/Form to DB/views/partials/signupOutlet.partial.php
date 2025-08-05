<form action="" method="post" enctype="multipart/form-data" class="flex flex-col gap-2">
  <h1 class="text-center font-bold text-2xl">Sign Up</h1>
  <p class="text-lg font-semibold border-b py-2">Please fill in this form to create an account.</p>

  <?php
  foreach ($inputs as $label => $input) {
    ["type" => $type , "placeholder" => $placeholder, "name" => $name] = $input;
    include __DIR__ . "/input.partial.php";
  }
  ?>

  <label>
    <input type="file" name="file" id="file" class="choose-file my-2" required>
  </label>

  <p>By creating an account you agree to our <span style="color:dodgerblue">Terms & Privacy</span>.</p>

  <div>
    <button type="submit" class="btn btn-blue-500 hover:btn-blue-600">Sign Up</button>
  </div>
</form>