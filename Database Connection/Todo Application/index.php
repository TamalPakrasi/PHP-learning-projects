<?php

require_once __DIR__ . "/connect.php";

$sql = "SELECT * FROM todo";

$res = mysqli_query($conn, $sql);

if (!$res) {
  die("Something went wrong!");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Todo App</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 550px;
      margin: 40px auto;
      background: #ffffff;
      padding: 20px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
      border-radius: 8px;
    }

    h1 {
      text-align: center;
      margin-bottom: 25px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-bottom: 35px;
    }

    input[type="text"],
    select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
    }

    button {
      padding: 8px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 13px;
    }

    button.add {
      background: #007bff;
      color: #fff;
      width: 120px;
      align-self: flex-end;
    }

    button.add:hover {
      background: #0056b3;
    }

    .todo-item {
      background: #fafafa;
      border: 1px solid #ddd;
      padding: 12px;
      border-radius: 5px;
      margin-bottom: 15px;
    }

    .todo-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .title {
      font-weight: bold;
    }

    .priority-low {
      color: #28a745;
    }

    .priority-medium {
      color: #ffc107;
    }

    .priority-high {
      color: #dc3545;
    }

    .timestamps {
      font-size: 12px;
      color: #666;
      margin-top: 4px;
    }

    .actions {
      margin-top: 8px;
      display: flex;
      gap: 6px;
    }

    .actions button {
      padding: 5px 8px;
      font-size: 12px;
    }

    .complete {
      text-decoration: line-through;
    }

    .edit {
      background: #17a2b8;
      color: #fff;
    }

    .delete {
      background: #dc3545;
      color: #fff;
    }

    .complete:hover {
      opacity: 0.9;
    }

    .edit:hover {
      opacity: 0.9;
    }

    .delete:hover {
      opacity: 0.9;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Todo App</h1>
    <form action="back.php" method="post">
      <input type="text" placeholder="Add new todo..." name="todo" required>
      <select name="priority">
        <option value="low">Low</option>
        <option value="medium" selected>Medium</option>
        <option value="high">High</option>
      </select>
      <button class="add" type="submit">Add Todo</button>
    </form>

    <?php
    while ($data = mysqli_fetch_assoc($res)) {
    ?>
      <div class="todo-item">
        <div class="<?php echo $data["isComplete"] ? "complete" : ""; ?>">
          <div class="todo-header">
            <span class="title priority-<?php echo $data["priority"]; ?>"><?php echo $data["todo"]; ?></span>
            <span><?php echo $data["priority"]; ?></span>
          </div>
          <div class="timestamps">
            Created at: <?php echo $data["created_at"]; ?><br>
            Updated at: <?php echo $data["update_at"]; ?>
          </div>
        </div>
        <div class="actions">
          <button class="<?php echo $data["isComplete"] ? "complete" : ""; ?>">Mark Complete</button>
          <button class="edit">Edit</button>
          <button class="delete">Delete</button>
        </div>
      </div>
    <?php } ?>

    <!-- <div class="todo-item">
      <div class="todo-header">
        <span class="title priority-low">Buy groceries</span>
        <span>Low</span>
      </div>
      <div class="timestamps">
        Created at: 2024-08-03 15:12:00<br>
        Updated at: 2024-08-03 15:12:00
      </div>
      <div class="actions">
        <button class="complete">Mark Complete</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </div>
    </div>

    <div class="todo-item">
      <div class="todo-header">
        <span class="title priority-high">Prepare presentation</span>
        <span>High</span>
      </div>
      <div class="timestamps">
        Created at: 2024-08-01 11:00:00<br>
        Updated at: 2024-08-04 09:30:00
      </div>
      <div class="actions">
        <button class="complete">Mark Complete</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </div>
    </div> -->
  </div>
</body>

</html>