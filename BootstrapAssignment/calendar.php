<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - TaskFlow</title>
    <link rel="stylesheet" href="calendar.css">
     <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="evo-calendar.min.css">
    <link rel="stylesheet" href="evo-calendar.royal-navy.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:,wght@300,700&display=swap" rel="stylesheet">
    <style>
       
        body { 
            background-color: var(--bs-body-bg); 
        }
        .card-shadow { 
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15); 
        }
        .big-box { 
           
            background-color: var(--bs-body-bg); 
            border-radius: 0.5rem; 
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1); 
            padding: 1rem; 
        }
        @media (min-width: 768px) { .big-box { padding: 2rem; } }

    
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
<main class="flex-shrink-0">
    <div class="container mt-3 mt-md-5">
        <div class="container mt-4 mb-5 text-center">
            <h2 class="text-primary">My Schedule</h2>
        </div>
        <div id="calendar"></div>
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

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="evo-calendar.min.js"></script>

<script>
    (function() {
        const storedTheme = localStorage.getItem('theme') || 'light';
        document.documentElement.setAttribute('data-bs-theme', storedTheme);
    })();
    
    function logout() {
        localStorage.removeItem("authUser");
        window.location.href = "login.php";
    }

    $(document).ready(function() {
        $('#calendar').evoCalendar({
            theme: 'Royal Navy', 
            todayHighlight: true,
            calendarEvents: [
                { id: 'event1', name: "Christmas Day", date: "December/25/2025", badge: "Dec 25", description: "Christmas Day celebration", type: "holiday", everyYear: true },
                { id: 'event2', name: "Vacation Leave", date: ["December/26/2025", "December/28/2025"], badge: "Dec 26-28", description: "Vacation leave for 3 days.", type: "event", color: "#63d867" },
                { id: 'event3', name: "Project Deadline", date: "March/20/2025", badge: "Mar 20", description: "Deadline for website relaunch project.", type: "event", color: "#f0ad4e" },
                { id: 'event4', name: "Team Meeting", date: "December/30/2025", badge: "Dec 10", description: "Monthly team meeting at 10 AM.", type: "event", color: "#5bc0de" },
                { id: 'event5', name: "Training Session", date: "December/5/2025", badge: "Dec 5", description: "Front-end development training session.", type: "event", color: "#d9534f" },
                { id: 'event6', name: "Birthday of His Majesty, Sultan of Selangor", date: "December/11/2025", badge: "Dec 10", description: "Holiday in Malaysia", type: "event", color: "#805bdeff" }
            ]
        });
    });

</script>

<script> 
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeIcon = document.getElementById('darkModeIcon');
    const htmlElement = document.documentElement;


    const currentTheme = localStorage.getItem('theme') || 'light';
    updateIcon(currentTheme); 

    darkModeToggle.addEventListener('click', () => {
        const currentTheme = htmlElement.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'light' ? 'dark' : 'light';

        htmlElement.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateIcon(newTheme);

    
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