    function togglePassword(fieldId, toggleSpan) {
      const input = document.getElementById(fieldId);
      if (input.type === "password") {
        input.type = "text";
        toggleSpan.textContent = "Hide";
      } else {
        input.type = "password";
        toggleSpan.textContent = "Show";
      }
    }
    
    function validateForgot(event) {
      event.preventDefault();
      const email = document.getElementById("email").value.trim();
      const emailError = document.getElementById("emailError");
      emailError.textContent = "";

      if (email === "") {
        emailError.textContent = "Email is required";
        return false;
      }

      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      if (!emailPattern.test(email)) {
        emailError.textContent = "Invalid email format";
        return false;
      }

      document.getElementById("forgotForm").style.display = "none";
      document.getElementById("otpForm").style.display = "block";
    }

    function validateOTP(event) {
      event.preventDefault();
      const otpInputs = [
        document.getElementById("otp1").value.trim(),
        document.getElementById("otp2").value.trim(),
        document.getElementById("otp3").value.trim(),
        document.getElementById("otp4").value.trim()
      ];
      const otpError = document.getElementById("otpError");
      otpError.textContent = "";

      for (let i = 0; i < otpInputs.length; i++) {
        if (otpInputs[i] === "" || isNaN(otpInputs[i])) {
          otpError.textContent = "Please enter a valid 4-digit OTP";
          return false;
        }
      }

      document.getElementById("otpForm").style.display = "none";
      document.getElementById("recoverForm").style.display = "block";
    }

    function recoverPassword(event) {
      event.preventDefault();
      const newPass = document.getElementById("newPassword").value.trim();
      const confirmPass = document.getElementById("confirmPassword").value.trim();

      const newPassError = document.getElementById("newPassError");
      const confirmPassError = document.getElementById("confirmPassError");
      newPassError.textContent = "";
      confirmPassError.textContent = "";

      if (newPass === "") {
        newPassError.textContent = "New password is required";
        return false;
      } else if (newPass.length < 6) {
        newPassError.textContent = "Password must be at least 6 characters";
        return false;
      }

      if (confirmPass === "") {
        confirmPassError.textContent = "Please confirm password";
        return false;
      } else if (newPass !== confirmPass) {
        confirmPassError.textContent = "Passwords do not match";
        return false;
      }

      alert("Password reset successfully!");
      window.location.href = "0.html";
    }
