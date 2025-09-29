 function validatePrescription(event) {
      event.preventDefault();              // Stop form submission

                     
      let patient = document.getElementById("patient").value.trim();
      let medicine = document.getElementById("medicine").value.trim();
      let dosage = document.getElementById("dosage").value.trim();
      let notes = document.getElementById("notes").value.trim();

   
      let patientError = document.getElementById("patientError");
      let medicineError = document.getElementById("medicineError");
      let dosageError = document.getElementById("dosageError");
      let notesError = document.getElementById("notesError");

                             
      patientError.textContent = "";
      medicineError.textContent = "";
      dosageError.textContent = "";
      notesError.textContent = "";

      let valid = true;

                    
      if (patient === "") {
        patientError.textContent = "Enter patient name";
     patientError.style.color = "red"; 
        valid = false;
      } else if (!/^[A-Za-z\s]+$/.test(patient)) {
        patientError.textContent = "Name Only Use Letter";
         patientError.style.color = "red"; 
        valid = false;
      }

      if (medicine === "") {
        medicineError.textContent = "Enter medicine name";
          medicineError.style.color = "red"; 
        valid = false;
      }

      if (dosage === "") {
        dosageError.textContent = "Enter dosage";
        dosageError.style.color = "red"; 
        valid = false;
      }

      if (notes === "") {
        notesError.textContent = "Write something";
        notesError.style.color = "red"; 
        valid = false;
      }

      if (valid) {
        alert("successfull!");
        document.getElementById("prescriptionForm").reset();
      }

      return false; 
    }