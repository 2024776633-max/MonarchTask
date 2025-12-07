<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TaskFlow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <style>
        .card-shadow { box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
        .big-box { 
            background-color: body { background-color: #f8f9fa; }
            border-radius: 0.5rem; 
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1); 
            padding: 1rem; 
        }
        @media (min-width: 768px) { .big-box { padding: 2rem; } }

        /* Dark Mode  */
        .dark-mode-toggle{
            cursor:pointer;
            border:none;
            background: none;
            color:var(--bs-body-color); 
        }
        .dark-mode-toggle:hover{
            opacity: 0.7;
        }
        .chart-container { width: 100%; max-width: 120px; height: auto; margin: auto;}
        .section-title { font-weight: bold; font-size: 1.2rem; margin-bottom: 1rem; }
    </style>
</head>

<body class="d-flex flex-column h-100 p-2 p-md-4 bg-body">

<nav class="navbar navbar-expand-lg navbar-light bg-body shadow-sm mb-4">
    <div class="container-fluid">

       <nav class="navbar navbar-expand-lg">
            <a href="/" class="navbar-brand">
                <img src="logo.png" alt="TaskFlow" class="logo">
            </a>
        </nav>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="mytodolist.php"><i class="bi bi-list-task"></i> My To Do List</a></li>
                <li class="nav-item"><a class="nav-link" href="taskcategory.php"><i class="bi bi-card-checklist"></i> Company Task Category</a></li>
                <li class="nav-item"><a class="nav-link" href="calendar.php"><i class="bi bi-calendar-event"></i> Calendar</a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php"><i class="bi bi-person-circle"></i> Profile</a></li>
            </ul>
            
            <div class="d-flex">
                <button class="dark-mode-toggle" id="darkModeToggle" title="Toggle Dark Mode"> 
                    <i class="bi bi-moon-stars-fill" id="darkModeIcon" style="font-size: 1.5rem;"></i>
                </button>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="#" onclick="logout()"><i class="bi bi-box-arrow-right"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container my-4">
  <div class="shadow p-3 mb-5 bg-body rounded">

    <!-- Title + Add Category -->
    <h3 class="mb-2 d-flex justify-content-between align-items-center">
      Company To-Do List
      <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">+ Add Category</button>
    </h3>

    <!-- ===== STATUS PRIORITY TABLE (ABOVE) ===== -->
    <div class="container p-4 my-4 border">
      <h4 class="mb-3 d-flex justify-content-between align-items-center">
        Task Priority
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addPriorityModal">+ Add New Status</button>
      </h4>
      <div class="table-responsive">
        <table class="table table-sm align-middle" id="priorityTable">
          <thead class="table-light">
            <tr>
              <th></th>
              <th>Label</th>
              <th>Task Name</th>
              <th>Department</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td><td>Not Started</td><td>Assign New Tasks</td>
              <td>
                <img src="code img13.jfif" alt="Sales" width="30" class="me-2"> Product Designer
              </td>
              <td>
                <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
              </td>
            </tr>
            <tr>
              <td>2</td><td>In Progress</td><td>Conduct Design Critique Session</td>
              <td>
                <img src="code img14.jpg" alt="Marketing" width="30" class="me-2"> Marketing Department
              </td>
              <td>
                <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
              </td>
            </tr>
            <tr>
              <td>3</td><td>In Progress</td><td>Review Team's Weekly Progress</td>
              <td>
                <img src="code img15.jfif" alt="Marketing" width="30" class="me-2"> Sales Department
                <img src="code img14.jpg" alt="Marketing" width="30" class="me-2"> Marketing Department
                <img src="code img13.jfif" alt="Marketing" width="30" class="me-2"> Product Design
</div>

              </td>
              <td>
                <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
              </td>
            </tr>
            <tr>
              <td>4</td><td>Completed</td><td>Presentation on Final Product</td>
              <td>
                <img src="code img16.jpg" alt="Product" width="30" class="me-2"> Board of Directors
              </td>
              <td>
                <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- ===== TASK STATUS TABLE (BELOW) ===== -->
    <div class="container p-4 my-4 border">
      <h4 class="mb-3 d-flex justify-content-between align-items-center">
        Task Status
        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModal">+ Add New Task</button>
      </h4>
      <div class="table-responsive">
        <table class="table table-sm align-middle" id="tasksTable">
  <thead class="table-light">
    <tr>
      <th></th>
      <th>Status</th>
      <th>Work Progress (%)</th>
      <th>Number of Tasks</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td><td>Not Started</td><td>0%</td><td>2</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="editTask(this)">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
      </td>
    </tr>
    <tr>
      <td>2</td><td>In Progress</td><td>60%</td><td>4</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="editTask(this)">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
      </td>
    </tr>

    <tr>
      <td>3</td><td>Completed</td><td>100%</td><td>4</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="editTask(this)">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
      </td>
    </tr>
  </tbody>
</table>

      </div>
    </div>

    <div id="categoriesContainer"></div>

  </div>
</div>

<div class="modal fade" id="addPriorityModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addPriorityForm">
          <!-- Status dropdown -->
          <div class="mb-3">
            <label class="form-label">Priority</label>
            <select id="newStatus" class="form-select">
            <option>Low</option>
              <option>Medium</option>
              <option>High</option>
            </select>
          </div>

          <!-- Task Name -->
          <div class="mb-3">
            <label class="form-label">Task Name</label>
            <input type="text" id="newTaskName" class="form-control">
          </div>

          <!-- Department -->
          <div class="mb-3">
            <label class="form-label">Department</label>
            <select id="newDepartment" class="form-select">
              <option>Sales Department</option>
              <option>Marketing Department</option>
              <option>Product Designer</option>
              <option>Board of Directors</option>
              <option>Finance Department</option>
              <option>Logistic Department</option>
            </select>
          </div>

          <!-- Upload Department Picture -->
          <div class="mb-3">
            <label class="form-label">Upload Department Picture</label>
            <input type="file" id="newDeptPic" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="addPriority()">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Task Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add New Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addTaskForm">
          
          <div class="mb-3"><label class="form-label">Status</label>
            <select id="newTaskStatus" class="form-select">
              <option>Not Started</option>
              <option>In Progress</option>
              <option>Completed</option>
            </select>
          </div>
          <div class="mb-3"><label class="form-label">Work Progress (%)</label><input type="number" id="newWorkProgress" class="form-control" min="0" max="100"></div>
          <div class="mb-3"><label class="form-label">Number of Tasks</label><input type="number" id="newNumTasks" class="form-control" min="1"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="addTask()">Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form id="addCategoryForm">
          <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" id="newCategory" class="form-control" placeholder="Enter category name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-success" onclick="addCategory()">Add</button>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  let currentRow = null;


  function deleteTask(button) {
    if (confirm("Are you sure you want to delete this item?")) {
      const row = button.closest('tr');
      row.remove();
    }
  }

  function editTask(button) {
    currentRow = button.closest('tr');
    // Table columns: #, Status, Work Progress, Number of Tasks, Action
    document.getElementById('newTaskStatus').value = currentRow.children[1].textContent.trim();
    document.getElementById('newWorkProgress').value = parseInt(currentRow.children[2].textContent);
    document.getElementById('newNumTasks').value = currentRow.children[3].textContent.trim();

    new bootstrap.Modal(document.getElementById('addTaskModal')).show();
  }

  function addTask() {
    const status = document.getElementById('newTaskStatus').value;
    const workProgress = document.getElementById('newWorkProgress').value.trim();
    const numTasks = document.getElementById('newNumTasks').value.trim();

    if (!status || !workProgress || !numTasks) {
      alert("Please fill all fields.");
      return;
    }

    const table = document.getElementById('tasksTable').querySelector('tbody');
    const newRow = table.insertRow();
    newRow.innerHTML = `
      <td>${table.rows.length}</td>
      <td>${status}</td>
      <td>${workProgress}%</td>
      <td>${numTasks}</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="editTask(this)">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
      </td>
    `;

    document.getElementById('addTaskForm').reset();
    const modalEl = document.getElementById('addTaskModal');
    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modal.hide();
  }

  function editPriority(button) {
    currentRow = button.closest('tr');
    // Table columns: #, Status, Task Name, Department, Action
    document.getElementById('newStatus').value = currentRow.children[1].textContent.trim();
    document.getElementById('newTaskName').value = currentRow.children[2].textContent.trim();
    document.getElementById('newDepartment').value = currentRow.children[3].innerText.trim();

    new bootstrap.Modal(document.getElementById('addPriorityModal')).show();
  }

  function addPriority() {
    const statusName = document.getElementById('newStatus').value;
    const taskName = document.getElementById('newTaskName').value.trim();
    const department = document.getElementById('newDepartment').value;
    const deptPicFile = document.getElementById('newDeptPic').files[0];

    if (!statusName || !taskName) {
      alert("Please fill in both Status and Task Name.");
      return;
    }

    const table = document.getElementById('priorityTable').querySelector('tbody');
    const newRow = table.insertRow();

    // Build department cell with optional picture
    let deptCellContent = department;
    if (deptPicFile) {
      const picURL = URL.createObjectURL(deptPicFile);
      deptCellContent = <img src="${picURL}" alt="${department}" width="30" class="me-2"> ${department};
    }

    newRow.innerHTML = `
      <td>${table.rows.length}</td>
      <td>${statusName}</td>
      <td>${taskName}</td>
      <td>${deptCellContent}</td>
      <td>
        <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
        <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
      </td>
    `;

    document.getElementById('addPriorityForm').reset();
    const modalEl = document.getElementById('addPriorityModal');
    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modal.hide();
  }


  function addCategory() {
    const categoryName = document.getElementById('newCategory').value.trim();
    if (!categoryName) {
      alert("Please enter a category name.");
      return;
    }

    const container = document.getElementById('categoriesContainer');
    const section = document.createElement('div');
    section.classList.add('mt-4');

    section.innerHTML = `
      <h4 class="mb-3 d-flex justify-content-between align-items-center">
        ${categoryName}
        <button class="btn btn-success btn-sm" onclick="addRowToCategory(this)">+ Add New</button>
      </h4>
      <div class="table-responsive">
        <table class="table table-sm align-middle">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Item</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    `;

    container.appendChild(section);

    document.getElementById('addCategoryForm').reset();
    const modalEl = document.getElementById('addCategoryModal');
    const modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
    modal.hide();
  }


  function addRowToCategory(button) {
    const table = button.parentElement.nextElementSibling.querySelector('tbody');
    const newName = prompt("Enter new item name:");
    if (newName && newName.trim() !== "") {
      const newRow = table.insertRow();
      newRow.innerHTML = `
        <td>${table.rows.length}</td>
        <td>${newName}</td>
        <td>
          <button class="btn btn-sm btn-primary me-1" onclick="editPriority(this)">Edit</button>
          <button class="btn btn-sm btn-danger" onclick="deleteTask(this)">Delete</button>
        </td>
      `;
    }
  }
</script>
<footer class="footer mt-auto text-lg-start border-top bg-body"> 
    <section>
        <div class="container text-center text-md-start pt-4 pb-4">
            <div class="row">
                
                <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-4 text-center"> 
                    
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <a href="/" class="navbar-brand p-0">
                            <img src="logo.png" alt="TaskFlow" class="logo me-2" style="height: 40px; width: auto;">
                            </a>
                    </div>
                    
                    <h6 class="text-uppercase fw-bold mb-3 text-primary">TaskFlow</h6>
                    
                    <p class="text-muted text-center">
                        A smart task and schedule management system designed to help you stay organized and productive every day.
                    </p>
                </div>
                
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-3">Quick Links</h6>
                    <p><a href="dashboard.php" class="text-decoration-none text-muted">Dashboard</a></p>
                    <p><a href="taskcategory.php" class="text-decoration-none text-muted">Task Categories</a></p>
                    <p><a href="calendar.php" class="text-decoration-none text-muted">Calendar</a></p>
                    <p><a href="profile.php" class="text-decoration-none text-muted">Profile</a></p>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-3">Contact Us</h6>
                    <p class="text-muted mb-1"><i class="bi bi-geo-alt-fill me-2 text-primary"></i> Kuala Lumpur, Malaysia</p>
                    <p class="text-muted mb-1">
                        <i class="bi bi-envelope me-2 text-primary"></i>
                        support@taskflow.com
                    </p>
                    <p class="text-muted mb-1"><i class="bi bi-phone-fill me-2 text-primary"></i> +6012-3456789</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-3 bg-primary text-white"> 
        © 2025 TaskFlow — All Rights Reserved
    </div>
</footer>
</script>

<script> 
function logout() {
        localStorage.removeItem("authUser");
        window.location.href = "login.php";
    }
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const htmlElement = document.documentElement;

    const currentTheme = localStorage.getItem('theme') || 'light';
    htmlElement.setAttribute('data-bs-theme', currentTheme);
    updateIcon(currentTheme);

    darkModeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';

        htmlElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);

        if (typeof updateCharts === 'function') {
            updateCharts(); 
        }
    });

    function updateIcon(theme){
        if(theme === 'dark'){
            darkModeIcon.className = 'bi bi-sun-fill';
        } else {
            darkModeIcon.className = 'bi bi-moon-stars-fill';
        }
    }
</script>

</body>
</html>