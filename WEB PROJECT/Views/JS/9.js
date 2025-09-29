    // Show/Hide password
    function togglePassword(fieldId, btn) {
      let input = document.getElementById(fieldId);
      if (input.type === "password") {
        input.type = "text";
        btn.textContent = "Hide";
      } else {
        input.type = "password";
        btn.textContent = "Show";
      }
    }

    // Form validation
    function validateSignup(event) {
      event.preventDefault();

      let fullname = document.getElementById("fullname").value.trim();
      let email = document.getElementById("email").value.trim();
      let phone = document.getElementById("phone").value.trim();
      let password = document.getElementById("password").value.trim();
      let confirmPassword = document.getElementById("confirm-password").value.trim();

      let fullnameError = document.getElementById("fullnameError");
      let emailError = document.getElementById("emailError");
      let phoneError = document.getElementById("phoneError");
      let passwordError = document.getElementById("passwordError");
      let confirmPasswordError = document.getElementById("confirmPasswordError");

      fullnameError.textContent = "";
      emailError.textContent = "";
      phoneError.textContent = "";
      passwordError.textContent = "";
      confirmPasswordError.textContent = "";

      let valid = true;

      if (fullname === "") {
        fullnameError.textContent = "Enter your full name.";
        valid = false;
      }

      if (email === "") {
        emailError.textContent = "Enter your email.";
        valid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        emailError.textContent = "Enter a valid email.";
        valid = false;
      }

      if (phone === "") {
        phoneError.textContent = "Enter your phone number.";
        valid = false;
      } else if (!/^\d{11}$/.test(phone)) {
        phoneError.textContent = "Enter a valid 11-digit phone number.";
        valid = false;
      }

      if (password === "") {
        passwordError.textContent = "Enter a password.";
        valid = false;
      } else if (password.length < 6) {
        passwordError.textContent = "Password must be at least 6 characters.";
        valid = false;
      }

      if (confirmPassword === "") {
        confirmPasswordError.textContent = "Re-enter your password.";
        valid = false;
      } else if (password !== confirmPassword) {
        confirmPasswordError.textContent = "Passwords do not match.";
        valid = false;
      }

      if (valid) {
        alert("Signup successful!");
        window.location.href = "0.html";
      }
    }