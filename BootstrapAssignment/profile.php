<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard.css">
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
    <style>
        /* Custom card shadow for a slightly lifted look */
        .card-shadow {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        }
        .profile-pic {
            object-fit: cover;
        }
        /* Style for the skill badges */
        .skill-badge {
            display: inline-block;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
            background-color: #17a2b8; /* Use info color for skills */
        }
    </style>
</head>
<style>
        /* General styling for theme-aware elements */
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .profile-pic {
            object-fit: cover;
        }
        /* Style for the skill badges */
        .badge {
            font-size: 0.75em;
        }
        .dark-mode-toggle {
            cursor: pointer;
            border: none;
            background: none;
            color: var(--bs-body-color); 
        }
        .dark-mode-toggle:hover {
            opacity: 0.7;
        }
    </style>
</head>
    <main class="py-5">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                        <h2 class="text-primary fw-bold">User Profile</h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil-square me-1"></i>Edit Profile
                        </button>
                    </div>

                    <div class="row g-4">
                        
                        <div class="col-lg-4">
                            <div class="card text-center h-100 border-0">
                                <div class="card-body p-4">
                                    <img id="profile-card-img" src="https://placehold.co/120x120/0d6efd/ffffff?text=MS" class="rounded-circle mb-3 border border-4 border-primary profile-pic" alt="Profile Picture">
                                    
                                    <h4 id="profile-card-name" class="card-title fw-bold mb-0">...</h4>
                                    <p id="profile-card-role" class="text-muted mb-4">...</p>
                                    
                                    <ul class="list-group list-group-flush text-start small">
                                        <li class="list-group-item"><i class="bi bi-geo-alt-fill me-2 text-primary"></i><span id="profile-location">...</span></li>
                                        <li class="list-group-item"><i class="bi bi-calendar-check me-2 text-primary"></i>Joined: <span id="profile-joined">Dec 2023</span></li>
                                        <li class="list-group-item"><i class="bi bi-code-square me-2 text-primary"></i>Expertise: <span id="profile-expertise">...</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="card h-100 border-0">
                                <div class="card-body">
                                    
                                    <h5 class="text-primary fw-bold mb-3 border-bottom pb-2"><i class="bi bi-person-lines-fill me-2"></i>Contact Information</h5>
                                    <div class="row mb-4">
                                        <div class="col-md-4 text-muted">Email Address:</div>
                                        <div class="col-md-8 fw-medium" id="detail-email">...</div>
                                        <div class="col-md-4 text-muted">Phone Number:</div>
                                        <div class="col-md-8 fw-medium" id="detail-phone">...</div>
                                    </div>

                                    <h5 class="text-primary fw-bold mb-3 border-bottom pb-2"><i class="bi bi-speedometer2 me-2"></i>Performance Overview</h5>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-3 text-bg-success-subtle border border-success d-flex justify-content-between align-items-center">
                                                <div><span class="small text-success-emphasis">Tasks Completed (Wk)</span><h4 class="fw-bold mb-0 text-success-emphasis">12</h4></div>
                                                <i class="bi bi-check-circle-fill fs-3 text-success-emphasis"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-3 text-bg-warning-subtle border border-warning d-flex justify-content-between align-items-center">
                                                <div><span class="small text-warning-emphasis">Pending Tasks</span><h4 class="fw-bold mb-0 text-warning-emphasis">5</h4></div>
                                                <i class="bi bi-hourglass-split fs-3 text-warning-emphasis"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <h6 class="text-muted small mb-2">Overall Completion Rate</h6>
                                    <div class="progress" role="progressbar" aria-label="Completion progress" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                                        <div class="progress-bar bg-primary" style="width: 75%"></div>
                                    </div>
                                    <span class="small text-muted float-end mt-1">75% Target Achieved</span>
                                    
                                    <div class="clearfix"></div> 
                                    
                                    <h5 class="text-primary fw-bold mt-5 mb-3 border-bottom pb-2"><i class="bi bi-tools me-2"></i>Key Skills</h5>
                                    <div id="profile-skills" class="d-flex flex-wrap gap-2">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit My Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProfileForm">
                        <div class="mb-3">
                            <label for="modalName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="modalName">
                        </div>
                        <div class="mb-3">
                            <label for="modalRole" class="form-label">Role Title</label>
                            <input type="text" class="form-control" id="modalRole">
                        </div>
                        <div class="mb-3">
                            <label for="modalLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="modalLocation">
                        </div>
                        <div class="mb-3">
                            <label for="modalExpertise" class="form-label">Expertise/Focus</label>
                            <input type="text" class="form-control" id="modalExpertise">
                        </div>
                        <div class="mb-3">
                            <label for="modalSkills" class="form-label">Skills (Comma Separated)</label>
                            <input type="text" class="form-control" id="modalSkills" placeholder="e.g., Bootstrap, JavaScript, SQL">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveProfileChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 1. Initial User Data
        let userProfile = {
            name: "Misha Safiah",
            role: "Project Manager",
            email: "misha@taskflow.com",
            phone: "017-6019723",
            // joined is kept static for this simple example
            location: "Kuala Lumpur, MY",
            expertise: "Front-end Dev",
            skills: ["Bootstrap", "JavaScript", "MySQL", "Project Planning"]
        };

        /**
         * Renders the current data from the userProfile object to the HTML elements.
         */
        function renderProfile() {
            // Update Core Profile Details
            document.getElementById('profile-card-name').textContent = userProfile.name;
            document.getElementById('profile-card-role').textContent = userProfile.role;
            document.getElementById('profile-location').textContent = userProfile.location;
            document.getElementById('profile-expertise').textContent = userProfile.expertise;
            
            // Update Profile Picture Initials
            const initials = userProfile.name.split(' ').map(n => n[0]).join('');
            document.getElementById('profile-card-img').src = `https://placehold.co/120x120/0d6efd/ffffff?text=${initials}`;

            // Update Skills Badges
            const skillsContainer = document.getElementById('profile-skills');
            skillsContainer.innerHTML = ''; // Clear existing skills
            userProfile.skills.forEach(skill => {
                const badge = document.createElement('span');
                badge.className = 'badge text-bg-primary'; // Use theme-aware badge class
                badge.textContent = skill.trim();
                skillsContainer.appendChild(badge);
            });

            // Update Contact Details
            document.getElementById('detail-email').textContent = userProfile.email;
            document.getElementById('detail-phone').textContent = userProfile.phone;
        }

        /**
         * Saves changes from the modal form back into the userProfile object.
         */
        function saveProfileChanges() {
            // Get values from modal inputs
            const newName = document.getElementById('modalName').value.trim();
            const newRole = document.getElementById('modalRole').value.trim();
            const newLocation = document.getElementById('modalLocation').value.trim();
            const newExpertise = document.getElementById('modalExpertise').value.trim();
            const newSkillsString = document.getElementById('modalSkills').value.trim();

            // Update userProfile object if values are provided
            if (newName) userProfile.name = newName;
            if (newRole) userProfile.role = newRole;
            if (newLocation) userProfile.location = newLocation;
            if (newExpertise) userProfile.expertise = newExpertise;
            
            // Update skills from comma-separated string
            userProfile.skills = newSkillsString.split(',').map(s => s.trim()).filter(s => s.length > 0);

            // Re-render the profile with new data
            renderProfile();

            // Hide the modal manually
            const modalElement = document.getElementById('editProfileModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();
        }

        // Event listener to populate the modal fields with current data before it opens
        document.getElementById('editProfileModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('modalName').value = userProfile.name;
            document.getElementById('modalRole').value = userProfile.role;
            document.getElementById('modalLocation').value = userProfile.location;
            document.getElementById('modalExpertise').value = userProfile.expertise;
            // Join the skills array back into a comma-separated string for the input field
            document.getElementById('modalSkills').value = userProfile.skills.join(', ');
        });

        // Initialize the page on load
        document.addEventListener('DOMContentLoaded', renderProfile);

        // --- Dark Mode and Logout Scripts (for completeness) ---
        function logout() {
            localStorage.removeItem("authUser");
            window.location.href = "login.php"; // Example navigation
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
        });

        function updateIcon(theme){
            if(theme === 'dark'){
                darkModeIcon.className = 'bi bi-sun-fill';
            } else {
                darkModeIcon.className = 'bi bi-moon-stars-fill';
            }
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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