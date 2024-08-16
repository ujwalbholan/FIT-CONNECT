<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task Details</title>
    <link rel="stylesheet" href="task.css" />
  </head>
  <body>
    <div class="task" style="display: flex" ;>
      <div class="sidebar">
        <div class="brand">
          <h2>FIT CONNECT</h2>
        </div>
        <nav>
          <ul>
            <li><a href="../../includes/profile/Userprofile.php">Profile</a></li>
           <li>
              <a
                href="http://localhost/FIT-CONNECT/view/page/userDashboard/userDashboard.php"
                >Dashboard</a
              >
            </li>
            <li>
              <a href="http://localhost/FIT-CONNECT/view/includes/task/taskUser.php" class="active">Tasks</a>
            </li>
            <li><a href="http://localhost/FIT-CONNECT/view/includes/setting/settingsUser.php">Settings</a></li>
          </ul>
        </nav>
      </div>
      <div class="container">
        <h1>Daily Fitness Tasks</h1>
     </div>

    </div>

    <script>
      document
        .getElementById("add-task-btn")
        .addEventListener("click", function () {
          const taskName = document.getElementById("task-name").value;
          const taskDesc = document.getElementById("task-desc").value;

          if (taskName && taskDesc) {
            const todoList = document.getElementById("todo-list");

            const todoItem = document.createElement("div");
            todoItem.classList.add("todo-item");

            const todoText = document.createElement("div");
            todoText.classList.add("todo-text");
            todoText.textContent = taskName;

            const todoDescription = document.createElement("div");
            todoDescription.classList.add("todo-description");
            todoDescription.textContent = taskDesc;

            const todoActions = document.createElement("div");
            todoActions.classList.add("todo-actions");

            const completeBtn = document.createElement("button");
            completeBtn.classList.add("complete-btn");
            completeBtn.textContent = "Mark as Completed";
            completeBtn.addEventListener("click", () => {
              todoText.style.textDecoration = "line-through";
            });

            const editBtn = document.createElement("button");
            editBtn.classList.add("edit-btn");
            editBtn.textContent = "Edit";
            editBtn.addEventListener("click", () => {
              const newTaskName = prompt("Edit task name", taskName);
              const newTaskDesc = prompt("Edit task description", taskDesc);
              if (newTaskName) todoText.textContent = newTaskName;
              if (newTaskDesc) todoDescription.textContent = newTaskDesc;
            });

            const deleteBtn = document.createElement("button");
            deleteBtn.classList.add("delete-btn");
            deleteBtn.textContent = "Delete";
            deleteBtn.addEventListener("click", () => {
              todoList.removeChild(todoItem);
            });

            todoActions.appendChild(completeBtn);
            todoActions.appendChild(editBtn);
            todoActions.appendChild(deleteBtn);

            todoItem.appendChild(todoText);
            todoItem.appendChild(todoDescription);
            todoItem.appendChild(todoActions);

            todoList.appendChild(todoItem);

            document.getElementById("task-name").value = "";
            document.getElementById("task-desc").value = "";
          }
        });
    </script>
  </body>
</html>
