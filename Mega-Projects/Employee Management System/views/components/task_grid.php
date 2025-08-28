<form action="/assignTask" method="post" class="form-grid lg:grid-cols-[1fr_1fr_1fr_100px]">
  <div>
    <label for="employee" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Employee</label>

    <select name="employee" id="employee" class="block w-full form-field font-semibold p-2">
      <option selected disabled>-- Choose One --</option>
      <?php
      $hasEmployees = false;
      foreach ($employees as $emp) :
        $hasEmployees = true
      ?>
        <option value="<?php echo $emp['employee_name']; ?>">
          <?php echo "{$emp['employee_name']} ({$emp['job_role']})"; ?>
        </option>
      <?php endforeach; ?>

      <?php if (!$hasEmployees) : ?>
        <option disabled>No Employee</option>
      <?php endif; ?>
    </select>
  </div>

  <div>
    <label for="priority" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Priority</label>

    <select name="priority" id="priority" class="block w-full form-field font-semibold p-2">
      <option selected disabled>-- Choose One --</option>
      <option value="low">Low</option>
      <option value="medium">Medium</option>
      <option value="high">High</option>
    </select>
  </div>

  <div>
    <label for="due_date" class="block text-gray-400 mb-2 text-[12px] md:text-sm">
      Due Date
    </label>

    <input type="date" name="due_date" id="due_date"
      class="block w-full form-field p-2 border border-gray-700"
      min="<?php echo date("Y-m-d"); ?>">
  </div>

  <div class="md:col-span-full lg:row-start-2 lg:col-span-4">
    <label for="task_title" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Task Title</label>
    <input type="text" name="task_title" id="task_title" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., Design landing page" required>
  </div>

  <div class="md:col-span-full lg:row-start-3 lg:col-span-4">
    <label for="task_desc" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Description (optional)</label>
    <textarea name="task_desc" id="task_desc" class="block w-full form-field p-3 border border-gray-700 resize-none" rows="3" placeholder="short note about the task"></textarea>
  </div>

  <?php if ($hasEmployees) : ?>
    <input type="submit" value="Add Task" class="btn py-2 lg:row-start-1 lg:col-start-4 lg:self-end">
  <?php endif; ?>
</form>