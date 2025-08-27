<?php
$currentDate = date('Y-m-d');

$date = new DateTime($currentDate);
$date->sub(new DateInterval("P1M"));

$minDate = $date->format("Y-m-d");
?>

<form action="/addEmployees" method="post" class="form-grid">
  <div>
    <label for="gender" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Gender</label>

    <select name="gender" id="gender" class="block w-full form-field font-semibold p-2">
      <option selected disabled>-- Choose One --</option>
      <option value="female">Female</option>
      <option value="male">Male</option>
      <option value="other">Other</option>
    </select>
  </div>

  <div>
    <label for="job_role" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Job Role</label>

    <select name="job_role" id="job_role" class="block w-full form-field font-semibold p-2">
      <option selected disabled>-- Choose One --</option>
      <?php while ($data = $job_roles->fetch_assoc()) : ?>
        <option value=<?php echo $data["job_role"]; ?>>
          <?php echo ucwords($data["job_role"]); ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div>
    <label for="join_date" class="block text-gray-400 mb-2 text-[12px] md:text-sm">
      Join Date
    </label>

    <input type="date" name="join_date" id="join_date" class="block w-full form-field p-2 border border-gray-700" min="<?php echo $minDate; ?>" max="<?php echo $currentDate; ?>">
  </div>

  <div class="row-start-1 md:row-start-2">
    <label for="emp_name" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Employee Name</label>
    <input type="text" name="emp_name" id="emp_name" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., John Doe" required>
  </div>

  <div class="row-start-2 md:row-start-2 md:col-span-1.5">
    <label for="email" class="block text-gray-400 mb-2 text-[12px] md:text-sm">Email</label>
    <input type="email" name="email" id="email" class="block w-full form-field p-3 border border-gray-700" placeholder="e.g., sam@example.com" required>
  </div>

  <input type="submit" value="Add Employee" class="btn py-2 self-end md:translate-y-[-5px]">
</form>