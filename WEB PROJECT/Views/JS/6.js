function validateForm(event) {
  event.preventDefault();

  let doctorName = document.getElementById("doctor-name").value.trim();
  let item = document.getElementById("item").value.trim();
  let quantity = document.getElementById("quantity").value.trim();
  let notes = document.getElementById("notes").value.trim();

  let doctorError = document.getElementById("doctorError");
  let itemError = document.getElementById("itemError");
  let quantityError = document.getElementById("quantityError");
  let notesError = document.getElementById("notesError");

  // Reset errors
  doctorError.textContent = "";
  itemError.textContent = "";
  quantityError.textContent = "";
  notesError.textContent = "";

  let valid = true;

  if (doctorName === "") {
    doctorError.textContent = "Enter a Doctor Name";
    doctorError.style.color = "red";   
    valid = false;
  } else if (!/^[A-Za-z\s]+$/.test(doctorName)) {
    doctorError.textContent = "Doctor Name must contain only letters";
    doctorError.style.color = "red";   
    valid = false;
  }

  if (item === "") {
    itemError.textContent = "Enter Item Name";
    itemError.style.color = "red";   
    valid = false;
  }

  if (quantity === "" || quantity <= 0) {
    quantityError.textContent = "Enter a valid quantity.";
    quantityError.style.color = "red";   
    valid = false;
  }

  if (notes === "") {
    notesError.textContent = "Write Something";
    notesError.style.color = "red";  
    valid = false;
  }

  if (valid) {
    alert("Request successful!");
    document.getElementById("requestForm").reset();
  }

  return false;
}
