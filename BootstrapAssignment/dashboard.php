<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard MonarchTask</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #0965b6ff !important;
        }

        html[data-bs-theme="dark"] body {
            background-color: #0d1117 !important;
        }

        html[data-bs-theme="dark"] .navbar {
            background-color: #161b22 !important;
        }

        html[data-bs-theme="dark"] .task-card,
        html[data-bs-theme="dark"] .section-box {
            background-color: #1e242c !important;
            color: #e6e6e6 !important;
        }
        html[data-bs-theme="dark"] footer.footer,
        html[data-bs-theme="dark"] .bg-body {
            background-color: #161b22 !important;
        }
        html[data-bs-theme="dark"] p,
        html[data-bs-theme="dark"] span,
        html[data-bs-theme="dark"] h1,
        html[data-bs-theme="dark"] h5,
        html[data-bs-theme="dark"] small {
            color: #e6e6e6 !important;
        }

        html[data-bs-theme="dark"] .text-muted {
            color: #bbbbbb !important;
        }

        .card-shadow { box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); }
        .big-box { 
            border-radius: 0.5rem; 
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1); 
            padding: 1rem; 
        }
    
        footer.footer { margin-top: auto; }

        .task-card {
            border-radius: 12px;
            background: var(--bs-body-bg); 
            padding: 1rem;
            transition: transform 0.2s ease;
        }
        .task-card-blue { background-color: #e3f2fd; }
        .task-card:hover { transform: translateY(-4px); }

        .task-date { font-size: 0.85rem; color: var(--bs-secondary-color); }
        .task-title { font-weight: 600; font-size: 1.1rem; }

        .progress { background-color: var(--bs-secondary-bg); border-radius: 4px; overflow: hidden; }
        .progress-bar { transition: width 0.6s ease; }
      
        .section-box {
            background: var(--bs-body-bg);
            border-radius: 12px;
            padding: 1rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        .section-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .team-member {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .team-member img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 0.75rem;
        }

        .team-member span { font-size: 0.9rem; }

        .dark-mode-toggle {
            cursor: pointer;
            border: none;
            background: none;
            color: var(--bs-body-color); 
        }


        .dark-mode-toggle:hover { opacity: 0.7; }
        
        @media (max-width: 576px) {
            .task-title { font-size: 1rem; }
            .badge { display: block; margin-bottom: 0.3rem; }
            .progress { height: 5px; }
            .section-title { font-size: 1rem; }
            .task-card { margin-inline: auto; max-width: 95%; }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100 p-2 p-md-4 bg-body">

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

<div class="container p-4 my-3 border">

    <div class="row mb-3">
    <div class="task-card shadow-sm h-100 task-card-blue">
            <div class="col-12">
                <h1 class="mb-3 text-center">Welcome To Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="row">
                            <span style='font-size:20px;'>&#128204; Due: 2026-01-10</span>
                        </div>
                        <span class="badge bg-danger ">Priority: High</span>
                    </div>
                    <h5 class="task-title">Conduct Design Crituque Session</h5>
                    <span class="badge bg-info text-dark">Status: In Progress</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 80%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 80%</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="row">
                    <span style='font-size:20px;'>&#128204; Due: 2025-12-08</span></div>
                    
                        <span class="badge bg-warning text-dark">Priority: Medium</span>
                    </div>
                    <h5 class="task-title">Review Team's Weekly Report Progress</h5>
                    <span class="badge bg-info text-dark">Status: In Progress</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 60%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 60%</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="row">
                    <span style='font-size:20px;'>&#128204; Due: 2025-12-25</span></div>
                        
                        <span class="badge bg-warning text-dark">Priority: Medium</span>
                    </div>
                    <h5 class="task-title">Mentor Junior Designers</h5>
                    
                    <span class="badge bg-info text-dark">Status: In Progress</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 60%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 60%</small>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="row">
                    <span style='font-size:20px;'>&#128204; Due: 2025-12-19</span></div>
                    
                        <span class="badge bg-warning text-dark">Priority: Medium</span>
                    </div>
                    <h5 class="task-title">Update Progress Board</h5>
                    
                    <span class="badge bg-info text-dark">Status: In Progress</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 60%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 60%</small>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="row">
                    <span style='font-size:20px;'>&#128204; Due: 2025-12-29</span></div>
                        
                        <span class="badge bg-secondary">Priority: Low</span>
                    </div>
                    <h5 class="task-title">Assign New Task</h5>
                    
                    <span class="badge bg-secondary ">Status: Not Started</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 0%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 0%</small>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-lg-4">
            <div class="task-card shadow-sm h-90">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="row">
                    <span style='font-size:20px;'>&#128204; Due: 2026-01-05</span></div>
                    
                        <span class="badge bg-secondary">Priority: Low</span>
                    </div>
                    <h5 class="task-title">Plan Upcoming Work</h5>
                    
                    <span class="badge bg-secondary ">Status: Not Started</span>
                    <div class="mt-3">
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: 0%;"></div>
                        </div>
                        <small class="text-muted">Estimated progress: 0%</small>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <div class="row justify-content-center mt-2 g-2">
        <div class="col-md-6">
            <div class="section-box">
                <div class="section-title">Tasks Completed</div>
                <canvas id="tasksChart" height="215"></canvas>
            </div>
        </div>

        <div class="col-md-5">
            <div class="section-box mb-4">
                <div class="section-title">Main Team Members</div>
                <div class="team-member">
                    <img src="team member1.jpeg" alt="Ali Ahmad">
                    <span>Normisha Safiah Binti Omar – Product Design Coordinator</span>
                </div>
                <hr>
                <div class="team-member">
                    <img src="team member2.jpeg" alt="Maria Memon">
                    <span>NurFatihah Asyira Binti Abu Kahar – Sales Supervisor</span>
                </div>
                <hr>
                <div class="team-member">
                    <img src="team member 3.jpg" alt="Maria Memon">
                    <span>Wan Arif Bin Wan Amin – Content Marketing Specialist</span>
                </div>
            </div>

            <div class="section-box">
                <div class="section-title">&#128204; Highlight December’s important date</div>
                <div class="team-member">
                    <span>1. Cristmas Day - (December/25/2025) </span>
                </div>
                <hr>
                <div class="team-member">
                    <span>2. Vacation Leave - (December/26/2025 - December/28/2025)</span>
                </div>
                <hr>
                <div class="team-member">
                    <span>3. Birthday of His Majesty, Sultan of Selangor - (December/11/2025)</span>
                </div>
            </div>
        </div>
    </div>
</div> <footer class="footer mt-auto border-top bg-body"> 
    <section>
        <div class="container text-center text-md-start pt-4 pb-4">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-4 text-center"> 
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <a href="/" class="navbar-brand p-0">
                            <img src="logo.png" alt="TaskFlow" class="logo me-2" style="height: 40px; width: auto;">
                        </a>
                    </div>
                    <h6 class="text-uppercase fw-bold mb-3 text-primary"></h6>
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
                    <p class="text-muted mb-1"><i class="bi bi-envelope me-2 text-primary"></i> support@taskflow.com</p>
                    <p class="text-muted mb-1"><i class="bi bi-phone-fill me-2 text-primary"></i> +6012-3456789</p>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center p-3 bg-primary text-white"> 
        © 2025 MonarchTask — All Rights Reserved
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    function logout() {
        localStorage.removeItem("authUser");
        window.location.href = "login.php";
    }

    document.addEventListener("DOMContentLoaded", function () {

        /* Animate progress bars */
        document.querySelectorAll(".progress-bar").forEach(bar => {
            const width = bar.style.width;
            bar.style.width = "0%";
            setTimeout(() => bar.style.width = width, 200);
        });

        /* Chart setup */
        const ctx = document.getElementById('tasksChart').getContext('2d');
        const tasksChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                datasets: [{
                    label: 'Tasks Completed',
                    data: [1, 2, 4, 2, 3, 4],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false }},
                scales: { y: { beginAtZero: true, ticks: { stepSize: 1 }}}
            }
        });

        /* Dark mode  */
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const htmlElement = document.documentElement;

        function updateIcon(theme) {
            if (theme === 'dark') {
                darkModeIcon.classList.replace('bi-moon-stars-fill', 'bi-sun-fill');
            } else {
                darkModeIcon.classList.replace('bi-sun-fill', 'bi-moon-stars-fill');
            }
        }

        const initialTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', initialTheme);
        updateIcon(initialTheme);

        darkModeToggle.addEventListener('click', () => {
            const current = htmlElement.getAttribute('data-bs-theme');
            const newTheme = current === 'light' ? 'dark' : 'light';

            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);

            tasksChart.update();
        });
    });
</script>

</body>
</html>
