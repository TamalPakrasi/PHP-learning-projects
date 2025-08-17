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
      <?php while ($data = mysqli_fetch_assoc($resTask)) : ?>

        <tr>
          <th>
            <label>
              <input type="checkbox" class="checkbox" <?php echo $data["isComplete"] === "1" ? "checked" : ""  ?> />
            </label>
          </th>
          <td>
            <?php echo $data["task"]; ?>
          </td>
          <td><?php echo $data["priority"]; ?></td>
          <td>
            <?php echo $data["worker"]; ?>
          </td>
          <th>
            <button class="btn btn-ghost btn-sm">Edit</button>
            <button class="btn btn-ghost btn-sm">Delete</button>
          </th>
        </tr>
      <?php endwhile; ?>
      <!-- row 1 -->

      <!-- row 2 -->
      <!-- <tr>
        <th>
          <label>
            <input type="checkbox" class="checkbox" />
          </label>
        </th>
        <td>
          Alice
        </td>
        <td>
          Carroll Group
          <br />
          <span class="badge badge-ghost badge-sm">Tax Accountant</span>
        </td>
        <td>Red</td>
        <th>
          <button class="btn btn-ghost btn-xs">details</button>
        </th>
      </tr> -->
    </tbody>
  </table>
</div>