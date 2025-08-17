<div class="overflow-x-auto mt-5">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Task</th>
        <th>Priority</th>
        <th>Worker Name</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $hasData = false;
      while ($data = mysqli_fetch_assoc($resTask)) : $hasData = true; ?>
        <tr>
          <th>
            <label>
              <input type="checkbox" class="checkbox" name="check" data-id="<?php echo $data["id"] ?>" <?php echo $data["isComplete"] === "1" ? "checked" : ""  ?> />
            </label>
          </th>
          <td class="<?php echo $data["isComplete"] ? "line-through" : "" ?>">
            <?php echo $data["task"]; ?>
          </td>
          <td class="<?php echo $data["isComplete"] ? "line-through" : "" ?>">
            <?php echo $data["priority"]; ?>
          </td>
          <td class="<?php echo $data["isComplete"] ? "line-through" : "" ?>">
            <?php echo $data["worker"]; ?>
          </td>
          <th>
            <button class="btn btn-ghost btn-sm edit" data-id="<?php echo $data["id"]; ?>">Edit</button>
            <button class="btn btn-ghost btn-sm delete" data-id="<?php echo $data["id"]; ?>" data-complete="<?php echo $data["isComplete"] ?>">Delete</button>
          </th>
        </tr>
      <?php endwhile; ?>

      <?php if (!$hasData) : ?>
        <tr>No Tasks</tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>