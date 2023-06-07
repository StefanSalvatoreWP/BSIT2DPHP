function showSignupForm() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'flex';
    document.getElementById('formTitle').textContent = 'Signup';
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('signupForm').style.display = 'block';
}

function showLoginForm() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'flex';
    document.getElementById('formTitle').textContent = 'Login';
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('signupForm').style.display = 'none';
}

function hideForm() {
    var overlay = document.getElementById('overlay');
    overlay.style.display = 'none';
}

