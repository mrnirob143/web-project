function validateLeave(event) {
  event.preventDefault(); // stop form from submitting

  let doctorName = document.getElementById("doctor-name").value.trim();
  let startDate = document.getElementById("start-date").value.trim();
  let endDate = document.getElementById("end-date").value.trim();
  let reason = document.getElementById("reason").value.trim();

  let doctorError = document.getElementById("doctorError");
  let startDateError = document.getElementById("startDateError");
  let endDateError = document.getElementById("endDateError");
  let reasonError = document.getElementById("reasonError");

  doctorError.textContent = "";
  startDateError.textContent = "";
  endDateError.textContent = "";
  reasonError.textContent = "";

  let valid = true;

  // Name validation: only letters
  if (doctorName === "") {
    doctorError.textContent = "Enter Doctor Name";
    doctorError.style.color = "red";  
    valid = false;
  } else if (!/^[a-zA-Z\s]+$/.test(doctorName)) {
    doctorError.textContent = "Doctor Name can only contain letters";
    doctorError.style.color = "red";  
    valid = false;
  }

  if (startDate === "") {
    startDateError.textContent = "Select start date";
    startDateError.style.color = "red";  
    valid = false;
  }

  if (endDate === "") {
    endDateError.textContent = "Select end date";
    endDateError.style.color = "red";  
    valid = false;
  } else if (startDate !== "" && endDate < startDate) {
    endDateError.textContent = "End date cannot be before start date";
    endDateError.style.color = "red";  
    valid = false;
  }

  if (reason === "") {
    reasonError.textContent = "Enter reason for leave";
    reasonError.style.color = "red";  
    valid = false;
  }


  if (valid) {
    alert(" request successfull!");
    document.getElementById("leaveForm").reset();
  }

  return false;
}