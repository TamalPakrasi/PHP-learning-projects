<?php
$dropdowns = ["employee", "priority", "due date"];
?>
<form action="" method="post" class="form-grid">
  <?php
  foreach ($dropdowns as $dropdown) {
    include __DIR__ . "/dropdown.php";
  }
  ?>

  <div class="md:col-span-full lg:row-start-2 lg:col-span-full">
    <label for="task_title" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Task Title</label>
    <input type="text" name="task_title" id="task_title" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., Design landing page">
  </div>

  <div class="md:col-span-full lg:row-start-3 lg:col-span-full">
    <label for="task_desc" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Description (optional)</label>
    <textarea name="task_desc" id="task_desc" class="block w-full form-field p-3 border border-gray-700 resize-none" rows="3" placeholder="short note about the task"></textarea>
  </div>

  <input type="submit" value="Add Task" class="btn lg:row-start-1 lg:col-start-4 lg:self-end">
</form>