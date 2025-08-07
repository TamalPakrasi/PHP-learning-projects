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

    .pointer-event-not-allowed {
      pointer-events: none !important;
    }

    #alert {
      background-color: green;
      color: white;
      border-radius: 10px;
      width: fit-content;
      padding: 6px;
      position: relative;
      top: 20px;
      margin-inline: auto;
      animation: showAlert 5000ms linear 0.2s 1 forwards;
      opacity: 0;
      transform: translateY(-100px);
    }

    @keyframes showAlert {

      0%,
      100% {
        opacity: 0;
        transform: translateY(-100px);
      }

      10%,
      90% {
        opacity: 100%;
        transform: translateY(0px);
      }
    }
  </style>
</head>

<body>

  <?php if (isset($_GET["msg"])) { ?>

    <div id="alert">
      <span><?php echo $_GET["msg"]; ?></span> <span style="cursor: pointer">&cross;</span>
    </div>

  <?php } ?>

  <div class="container" style="margin-top: 3.5rem">
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
            <span class="priority-<?php echo $data["priority"]; ?>"><?php echo $data["priority"]; ?></span>
          </div>
          <div class="timestamps">
            Created at: <?php echo $data["created_at"]; ?><br>
            Updated at: <?php echo $data["update_at"]; ?>
          </div>
        </div>
        <div class="actions">
          <button class="<?php echo $data["isComplete"] ? "complete pointer-event-not-allowed" : "incomplete"; ?>" data-id="c-<?php echo $data['id']; ?>">Mark Complete</button>
          <button class="edit" data-id="e-<?php echo $data['id']; ?>">Edit</button>
          <button class="delete" data-id="d-<?php echo $data['id']; ?>">Delete</button>
        </div>
      </div>
    <?php } ?>
  </div>

  <script>
    const incomplete = document.querySelectorAll(".incomplete");
    const editBtns = document.querySelectorAll(".edit");
    const deleteBtns = document.querySelectorAll(".delete");

    if (incomplete) {
      incomplete.forEach((btn) => {
        btn.addEventListener("click", (e) => {
          const id = e.currentTarget.dataset.id.slice(2);
          location.href = `updatedelete.php?operation=markcomplete&id=${id}`;
        });
      })
    }

    // if (editBtns) {
    //   edit.forEach(btn => {
    //     btn.addEventListener("click", (e) => {

    //     })
    //   })
    // }

    if (deleteBtns) {
      deleteBtns.forEach((btn) => {
        btn.addEventListener("click", (e) => {
          const id = e.currentTarget.dataset.id.slice(2);
          location.href = `updatedelete.php?operation=markdelete&id=${id}`;
        });
      })
    }
  </script>
</body>

</html>