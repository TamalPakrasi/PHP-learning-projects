<?php
$fieldName = "Add New Task";
$name = "addtask";
$placeholder = "add new task...";
?>

<form action="back.php?operation=addtask" method="post">
  <?php require_once __DIR__ . "/textInput.php"; ?>

  <div class="mt-5 grid gap-5 bg-base-200 border border-base-300 rounded-box min-w-100 p-5">

    <select class="select w-full" name="worker">
      <option disabled selected>Choose worker</option>
      <?php while ($data = mysqli_fetch_assoc($resUser)) : ?>
        <option value=<?php echo $data["username"]; ?>><?php echo $data["username"]; ?></option>
      <?php endwhile; ?>
    </select>

    <select class="select w-full" name="priority">
      <option disabled selected>Choose Priority</option>
      <?php foreach (["low", "medium", "high"] as $prio) : ?>
        <option value="<?php echo $prio; ?>"><?php echo ucwords($prio); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</form>

<!-- task list -->
<div class="bg-base-200 border border-base-300 rounded-box p-5">
  <h2 class="text-stone-600 font-semibold text-2xl ms-2">Task List:</h2>

  <?php require_once __DIR__ . "/taksList.php"; ?>
</div>