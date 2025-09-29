// Toggle show/hide password
function togglePassword() {
    let passwordInput = document.getElementById("password");
    let toggleBtn = document.querySelector(".show-password");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleBtn.textContent = "Hide";
    } else {
        passwordInput.type = "password";
        toggleBtn.textContent = "Show";
    }
}

// Form validation
function validateLogin(event) {
    event.preventDefault();

    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();

    let emailError = document.getElementById("emailError");
    let passwordError = document.getElementById("passwordError");

    emailError.textContent = "";
    passwordError.textContent = "";

    let valid = true;

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        emailError.textContent = "Enter a valid email.";
        valid = false;
    } 

    if (password === "") {
        passwordError.textContent = "Enter your password.";
        valid = false;
    }

    if (valid) {
        window.location.href = "1.html";
    }
}