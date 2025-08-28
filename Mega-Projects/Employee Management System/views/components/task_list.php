<?php require_once __DIR__ . "/../../utils/handlers/getPriorityTheme.php"; ?>

<?php
$hasTasks = false;
foreach ($tasks as $task) :
  $hasTasks = true;
?>
  <li class="card-cover">
    <div class="px-2 grid grid-cols-[fit-content(20px)_1fr] sm:grid-cols-[fit-content(20px)_1fr_1fr] 
  gap-x-2 md:gap-x-4 gap-y-3 sm:gap-y-1 md:gap-y-3">
      <div>
        <input type="checkbox" class="size-4 md:size-5 lg:size-5.5 accent-blue-400 
      focus:outline-0 cursor-pointer"
          <?php echo $task["is_complete"] === "1" ? "checked" : "" ?>>
      </div>

      <h2 class="text-white font-bold text-sm md:text-base lg:text-lg whitespace-nowrap">
        <?php echo htmlspecialchars($task["task_title"]); ?>
      </h2>

      <h2 class="text-white font-semibold text-sm col-start-2">
        Assigned to: <?php echo "{$task["employee_name"]} ({$task["job_role"]})" ?>
      </h2>

      <p class="text-gray-400 text-[12px] text-justify col-start-2">
        <?php echo htmlspecialchars($task["task_desc"]); ?>
      </p>

      <div class="col-span-full flex gap-2 items-center 
    justify-end sm:col-start-2 sm:col-auto sm:justify-start sm:mt-1.5">
        <span class="text-[12px] font-semibold border-1 
        <?php echo getPriorityTheme($task["priority"]); ?> rounded-xl px-2.5
         py-0.75 uppercase">
          <?php echo $task["priority"]; ?>
        </span>
        <span class="text-[12px] font-semibold text-white border-1 border-gray-500 rounded-xl px-2.5 
        py-0.75 uppercase">Due:
          <?php
            $date = new DateTime($task["deadline"]);
            echo $date->format("d-m-Y");
          ?>
        </span>
      </div>

      <div class="col-span-full flex gap-2 items-center justify-end sm:col-auto sm:row-start-1 sm:col-start-3 
      py-1">
        <button class="btn" data-id="<?php echo $task["task_id"] ?>">Edit</button>
        <button class="btn" data-id="<?php echo $task["task_id"] ?>">Delete</button>
      </div>
    </div>
  </li>
<?php endforeach; ?>

<?php if (!$hasTasks) : ?>
  <li class="card-cover text-white font-bold">No Tasks</li>
<?php endif; ?>