<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | MonarchTask</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center text-danger" id="auth-title">MonarchTask</h1>
            </div> 
            
            <div id="alert-container" class="mb-3"></div>

            <div class="card-text">
                <!-- LOGIN FORM -->
                <form id="login-form" onsubmit="handleAuth(event, 'login')">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="loginCheck">
                        <label class="form-check-label" for="loginCheck">Remember me</label>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">LOGIN</button> 
                    </div>
                    <p class="text-center text-secondary">
                        Don't have an account? 
                        <a href="#" onclick="toggleView('register')" class="text-danger fw-bold">Register here</a>
                    </p>
                </form>

                <!-- REGISTER FORM -->
                <form id="register-form" onsubmit="handleAuth(event, 'register')" style="display:none;">
                    <div class="mb-3">
                        <label for="registerEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="registerEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="registerPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="registerPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" required>
                    </div>
                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary">REGISTER</button> 
                    </div>
                    <p class="text-center text-secondary">
                        Already have an account? 
                        <a href="#" onclick="toggleView('login')" class="text-danger fw-bold">Login here</a>
                    </p>
                </form>

                <div id="welcome-message" class="text-center p-4 bg-success-subtle text-success rounded" style="display:none;">
                    <h4>Authentication Successful!</h4>
                    <p id="welcome-text">You are logged in.</p>
                </div>

            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
        
        const HARDCODED_USER = {
            email: "user@example.com",
            password: "password123"
        };

        let registeredUsers = [HARDCODED_USER];

        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        const authTitle = document.getElementById('auth-title');
        const alertContainer = document.getElementById('alert-container');
        const welcomeMessage = document.getElementById('welcome-message');

    
        function toggleView(view) {
            alertContainer.innerHTML = '';

            if (view === 'login') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                authTitle.textContent = 'L O G I N';
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                authTitle.textContent = 'R E G I S T E R';
            }
        }

        function showAlert(message, type = 'danger') {
            alertContainer.innerHTML = `
                <div class="alert alert-${type} alert-dismissible fade show" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
        }

        function handleAuth(event, type) {
            event.preventDefault();
            alertContainer.innerHTML = '';

            if (type === 'login') {
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;

                const user = registeredUsers.find(
                    u => u.email === email && u.password === password
                );

                if (user) {
                    localStorage.setItem("authUser", user.email);
                    window.location.href = "dashboard.php";   // FIXED
                } else {
                    showAlert('Invalid email or password. Hint: user@example.com / password123');
                }

            } else if (type === 'register') {
                const email = document.getElementById('registerEmail').value;
                const password = document.getElementById('registerPassword').value;
                const confirmPassword = document.getElementById('confirmPassword').value;

                if (password !== confirmPassword) {
                    showAlert('Passwords do not match.');
                    return;
                }
                
                if (registeredUsers.some(u => u.email === email)) {
                    showAlert('This email is already registered.');
                    return;
                }

                registeredUsers.push({ email, password });
                document.getElementById('register-form').reset();

                showAlert(`Registration successful for ${email}! You can now log in.`, 'success');
                toggleView('login');
            }
        }
    </script>
</body>
</html>
