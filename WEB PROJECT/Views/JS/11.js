function togglePassword(id, span) {
  let input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
    span.textContent = "Hide";
  } else {
    input.type = "password";
    span.textContent = "Show";
  }
}

function validatePassword(event) {
  event.preventDefault();

  let current = document.getElementById("current").value.trim();
  let newPass = document.getElementById("new").value.trim();
  let confirmPass = document.getElementById("confirm").value.trim();

  let currentError = document.getElementById("currentError");
  let newError = document.getElementById("newError");
  let confirmError = document.getElementById("confirmError");

  currentError.textContent = "";
  newError.textContent = "";
  confirmError.textContent = "";

  let valid = true;

  if (current === "") {
    currentError.textContent = "Enter current password.";
    valid = false;
  }
  if (newPass === "") {
    newError.textContent = "Enter new password.";
    valid = false;
  } else if (newPass.length < 6) {
    newError.textContent = "Password must be at least 6 characters.";
    valid = false;
  }

  if (confirmPass === "") {
    confirmError.textContent = "Confirm new password.";
    valid = false;
  }

  if (newPass !== "" && confirmPass !== "" && newPass !== confirmPass) {
    confirmError.textContent = "Passwords do not match!";
    valid = false;
  }

  if (valid) {
    alert("Password changed successfully!");
    document.getElementById("changeForm").reset();
    window.location.href = "0.html";
  }
}
