<?php
$dropdowns = ["gender", "job role"];
$date = "join_date";
?>
<form action="" method="post" class="form-grid">

  <?php
  foreach ($dropdowns as $dropdown) {
    include __DIR__ . "/dropdown.php";
  }
  ?>

  <?php include_once __DIR__ . "/dateInput.php"; ?>

  <div class="row-start-1 md:row-start-2">
    <label for="emp_name" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Employee Name</label>
    <input type="text" name="emp_name" id="emp_name" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., John Doe">
  </div>

  <div class="row-start-2 md:row-start-2 md:col-span-1.5">
    <label for="email" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Email</label>
    <input type="email" name="email" id="email" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., sam@example.com">
  </div>

  <input type="submit" value="Add Employee" class="btn py-2 self-end md:translate-y-[-5px]">
</form>