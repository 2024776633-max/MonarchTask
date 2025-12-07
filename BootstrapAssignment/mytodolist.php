<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TaskFlow</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body { 
            background-color: var(--bs-body-bg); 
        }
        
        .card-shadow { box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
        
        .big-box { 
            /* FIX: Replaced hardcoded colors with theme variables */
            background-color: var(--bs-body-bg); 
            border-radius: 0.5rem; 
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1); 
            padding: 1rem; 
            margin: auto;
            max-width: 1100px;
        }
        @media (min-width: 768px) { .big-box { padding: 2rem; } }

        /* Dark Mode Toggle Styles (Correctly uses theme variables) */
        .dark-mode-toggle{
            cursor:pointer;
            border:none;
            background: none;
            color:var(--bs-body-color); 
        }
        .dark-mode-toggle:hover{
            opacity: 0.7;
        }
        .chart-container { 
            width: 100%; 
            max-width: 120px; 
            height: 120px;
            margin: auto;
        }
        .section-title { font-weight: bold; font-size: 1.2rem; margin-bottom: 1rem; }
        
        /* Task card styles (made theme-aware by avoiding hardcoded white background) */
        .task-card {
            border-radius: 12px;
            background: var(--bs-body-bg);
            padding: 1rem;
            transition: transform 0.2s ease;
        }
        .task-card:hover {
            transform: translateY(-4px);
        }
        .task-date { font-size: 0.85rem; color: var(--bs-secondary-color); }
        .task-title { font-weight: 600; font-size: 1.1rem; }
        .team-member { display: flex; align-items: center; margin-bottom: 0.75rem; }
        .team-member img { width: 32px; height: 32px; border-radius: 50%; margin-right: 0.75rem; }
        .team-member span { font-size: 0.9rem; }
        .btn-see-all { background-color: #6f42c1; color: #fff; font-size: 0.85rem; padding: 0.4rem 0.8rem; border-radius: 6px; }
        @media (max-width: 576px) {
             .task-title { font-size: 1rem; }
             .badge { display: block; margin-bottom: 0.3rem; }
             .progress { height: 5px; }
             .section-title { font-size: 1rem; }
        }
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
<main class="flex-shrink-0">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="big-box">

                <h4 class="mt-4 mb-2">Task Status</h4>
                <div class="p-2 bg-body rounded card-shadow text-center">
                    <h5 class="card-title mb-2">Task Status Overview</h5>
                    <div class="row g-3">
                        <div class="col-4 text-center">
                            <div class="chart-container">
                                <canvas id="completedChart"></canvas>
                            </div>
                            <small class="text-muted d-block mt-1">Completed</small>
                        </div>

                        <div class="col-4 text-center">
                            <div class="chart-container">
                                <canvas id="progressChart"></canvas>
                            </div>
                            <small class="text-muted d-block mt-1">In Progress</small>
                        </div>

                        <div class="col-4 text-center">
                            <div class="chart-container">
                                <canvas id="notStartedChart"></canvas>
                            </div>
                            <small class="text-muted d-block mt-1">Not Started</small>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                
                <h4 class="mb-3 d-flex justify-content-between align-items-center">
                    <span>My To-Do List</span>
                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModal">+ New Task</button>
                </h4>
                <div id="todoList"></div>
                <br>
                <hr>
                
                <h4 class="mt-4 mb-3">Completed Tasks</h4>
                <div id="completedList"></div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content card-shadow">
            <div class="modal-header">
                <h5 class="modal-title">Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="taskForm">
                    <input type="hidden" id="editIndex">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" id="taskTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="taskDesc" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" id="taskImg" class="form-control" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <select id="taskPriority" class="form-select">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select id="taskStatus" class="form-select">
                            <option>Not Started</option>
                            <option>In Progress</option>
                            <option>Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Due Date</label>
                        <input type="date" id="taskDue" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="saveTaskBtn" class="btn btn-primary">Save Task</button>
            </div>
        </div>
    </div>
</div>
</main>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    let tasks = [
        { title:"Review Team’s Weekly Progress", desc:"Check project updates, deadlines, and give feedback. Identify blockers early and adjust priorities if needed.", img:"code img9.png", priority:"Medium", status:"In Progress", due:"2025-12-08" },
        { title:"Conduct Design Critique Session", desc:"Host a review meeting to refine ongoing work. Encourage constructive feedback and highlight improvements for quality.", img:"code img12.jpg", priority:"High", status:"In Progress", due:"2026-01-10" },
        { title:"Mentor Junior Designers", desc:"Guide team members with tips and career advice. Share best practices and help them grow professionally.", img:"code img3.png", priority:"Medium", status:"In Progress", due:"2025-12-25" },
        { title:"Update Progress Board", desc:"Record task status (Not Started, In Progress, Completed) and percentage completion so the team has a clear overview.", img:"code img10.png", priority:"Medium", status:"In Progress", due:"2025-12-19" },
        { title:"Assign New Tasks", desc:"Distribute upcoming design work to team members based on their strengths and current workload to keep productivity balanced.", img:"code img5.jfif", priority:"Low", status:"Not Started", due:"2025-12-29" },
        { title:"Plan Upcoming Work", desc:"Outline priorities for the next day or week, set deadlines, and prepare briefs so the team knows what’s coming.", img:"code img11.jpg", priority:"Low", status:"Not Started", due:"2026-01-05" },
        { title:"Client/Stakeholder Presentation", desc:"Present design concepts clearly and persuasively. Gather feedback and adjust designs to meet expectations.", img:"code img8.jpg", priority:"Medium", status:"Completed", due:"2025-12-12" },
        { title:"Handle Urgent Design Requests", desc:"Respond quickly to last-minute needs. Deliver solutions without disrupting long-term project flow", img:"code img6.jfif", priority:"Medium", status:"Completed", due:"2025-12-02" },
        { title:"Approve Final Designs", desc:"Inspect completed work for quality, consistency, and brand alignment before giving the green light for delivery or publishing.", img:"code img4.jpg", priority:"High", status:"Completed", due:"2025-11-15" },
        { title:"Presentation on Final Product", desc:"An overview of the final product, highlighting key features, outcomes, and value delivered.", img:"code img7.jpg", priority:"Medium", status:"Completed", due:"2025-11-20" }
    ];

    
    const centerTextPlugin = {
        id: 'centerText',
        beforeDraw: (chart) => {
            const { width, height, ctx } = chart;
            ctx.save();
            const fontSize = Math.min(width, height) / 5.5;
            ctx.font = fontSize.toFixed(0) + "px Arial";
            ctx.textBaseline = "middle";
            ctx.textAlign = "center";
            
            
            if (document.documentElement.getAttribute('data-bs-theme') === 'dark') {
                 ctx.fillStyle = "#f8f9fa"; 
            } else {
                 ctx.fillStyle = "#212529";
            }
            
            const value = chart.config.data.datasets[0].data[0] + "%";
            ctx.fillText(value, width / 2, height / 2);
            ctx.restore();
        }
    };

    let completedChart, progressChart, notStartedChart;

    function createChart(id, percent, color) {
        return new Chart(document.getElementById(id), {
            type: 'doughnut',
            data: { datasets: [{ data: [percent, 100 - percent], backgroundColor: [color, 'var(--bs-light)'], borderWidth: 0 }] },
            options: { responsive: true, maintainAspectRatio: false, cutout: '70%', plugins: { tooltip: { enabled: false }, legend: { display: false } } },
            plugins: [centerTextPlugin]
        });
    }

    function updateCharts() {
        const total = tasks.length || 1;
        const completed = tasks.filter(t => t.status === "Completed").length;
        const inProgress = tasks.filter(t => t.status === "In Progress").length;
        const notStarted = tasks.filter(t => t.status === "Not Started").length;

        const completedPercent = Math.round((completed / total) * 100);
        const progressPercent = Math.round((inProgress / total) * 100);
        const notStartedPercent = Math.round((notStarted / total) * 100);

        if (completedChart) completedChart.destroy();
        if (progressChart) progressChart.destroy();
        if (notStartedChart) notStartedChart.destroy();

        completedChart = createChart('completedChart', completedPercent, '#198754');
        progressChart = createChart('progressChart', progressPercent, '#0d6efd');
        notStartedChart = createChart('notStartedChart', notStartedPercent, '#dc3545');
    }

    // --- TASK RENDERING LOGIC ---
    function renderTasks() {
        const todoList = document.getElementById("todoList");
        const completedList = document.getElementById("completedList");
        todoList.innerHTML = "";
        completedList.innerHTML = "";

        tasks.forEach((task, index) => {
            const card = document.createElement("div");
            // FIX: card background is now theme-aware
            card.className = "task-card card mb-3 card-shadow bg-body"; 
            card.innerHTML = `
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="flex-grow-1 pe-3">
                        <h5 class="card-title task-title">${task.title}</h5>
                        <p class="card-text text-muted">${task.desc}</p>
                        <span class="badge ${task.priority === 'High' ? 'bg-danger' : task.priority === 'Medium' ? 'bg-warning text-dark' : 'bg-secondary'}">Priority: ${task.priority}</span>
                        <span class="badge ${task.status === 'Completed' ? 'bg-success' : (task.status === 'In Progress' ? 'bg-info text-dark' : 'bg-secondary')}">Status: ${task.status}</span>
                        <span class="badge bg-light text-dark">Due: ${task.due}</span>
                        <div class="mt-2">
                            <a href="#" class="btn btn-sm btn-primary me-1" onclick="editTask(${index})">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="deleteTask(${index})">Delete</a>
                        </div>
                    </div>
                    <img src="${task.img}" class="rounded" alt="Task Image" style="width:80px; height:80px; object-fit:cover;">
                </div>
            `;

            if (task.status === "Completed") {
                completedList.appendChild(card);
            } else {
                todoList.appendChild(card);
            }
        });
        updateCharts();
    }

    
    document.getElementById("saveTaskBtn").addEventListener("click", function() {
        const title = document.getElementById("taskTitle").value.trim();
        const desc = document.getElementById("taskDesc").value.trim();
        const priority = document.getElementById("taskPriority").value;
        const status = document.getElementById("taskStatus").value;
        const due = document.getElementById("taskDue").value;
        const editIndex = document.getElementById("editIndex").value;
        const fileInput = document.getElementById("taskImg");

        const currentImg = editIndex !== "" ? tasks[editIndex]?.img : null;

        if (!title || !desc || !due) {
            alert("Please fill in Title, Description, and Due Date.");
            return;
        }

        const finalizeSave = (finalImg) => {
            const newTask = { title, desc, img: finalImg, priority, status, due };
            if (editIndex !== "") {
                tasks[editIndex] = newTask;
            } else {
                tasks.push(newTask);
            }
            renderTasks();
            document.getElementById("taskForm").reset();
            document.getElementById("editIndex").value = "";
            const modal = bootstrap.Modal.getInstance(document.getElementById("addTaskModal"));
            modal.hide();
        };

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();
            reader.onload = e => finalizeSave(e.target.result);
            reader.readAsDataURL(fileInput.files[0]);
        } else {
            finalizeSave(currentImg || "https://share.google/images/xvRNef7y9mAGQFch7");
        }
    });

    function editTask(index) {
        const task = tasks[index];
        document.getElementById("taskTitle").value = task.title;
        document.getElementById("taskDesc").value = task.desc;
        document.getElementById("taskPriority").value = task.priority;
        document.getElementById("taskStatus").value = task.status;
        document.getElementById("taskDue").value = task.due;
        document.getElementById("editIndex").value = index;
        const modal = new bootstrap.Modal(document.getElementById("addTaskModal"));
        modal.show();
    }

    function deleteTask(index) {
        if (confirm("Delete this task?")) {
            tasks.splice(index, 1);
            renderTasks();
        }
    }
    
    document.addEventListener("DOMContentLoaded", () => {
        renderTasks(); 
    });
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