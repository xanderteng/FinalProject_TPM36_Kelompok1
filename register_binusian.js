document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register-form");
    
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      validateForm();
    });

    function validateForm() {
      let isValid = true;

      document.querySelectorAll(".input-control").forEach(control => {
        const input = control.querySelector(".input-field, .upload-field");
        let errorMessage = control.querySelector(".error-message");
        
        if (!errorMessage) {
          errorMessage = document.createElement("span");
          errorMessage.classList.add("error-message");
          control.appendChild(errorMessage);
        }

        if (input.value.trim() === "") {
          showError(control, "Field tidak boleh kosong");
          isValid = false;
        } else {
          clearError(control);

          if (input.type === "email" && !validateEmail(input.value)) {
            showError(control, "Masukkan email yang valid seperti user@gmail.com");
            isValid = false;
          }

          if (input.classList.contains("input-whatsapp") && !validateWhatsapp(input.value)) {
            showError(control, "Nomor WhatsApp harus minimal 9 angka.");
            isValid = false;
          }
        }
      });

      document.querySelectorAll(".file-upload").forEach(upload => {
        const control = upload.closest(".input-control");
        let errorMessage = control.querySelector(".error-message");

        if (!errorMessage) {
          errorMessage = document.createElement("span");
          errorMessage.classList.add("error-message");
          control.appendChild(errorMessage);
        }

        if (upload.files.length === 0) {
          showError(control, "File harus diunggah.");
          isValid = false;
        } else {
          clearError(control);
        }
      });

      const radioButtons = document.querySelectorAll("input[name='status']");
      const radioControl = radioButtons[0].closest(".input-control");
      let errorMessage = radioControl.querySelector(".error-message");

      if (!errorMessage) {
        errorMessage = document.createElement("span");
        errorMessage.classList.add("error-message");
        radioControl.appendChild(errorMessage);
      }

      if (![...radioButtons].some(radio => radio.checked)) {
        showError(radioControl, "Harus memilih salah satu status Binusian atau Non-Binusian");
        isValid = false;
      } else {
        clearError(radioControl);
      }

      if (isValid) {
        alert("Form submitted successfully!");
      }
    }

    function showError(control, message) {
      let errorMessage = control.querySelector(".error-message");
      errorMessage.textContent = message;
      control.classList.add("error");
      errorMessage.style.display = "block";
    }

    function clearError(control) {
      let errorMessage = control.querySelector(".error-message");
      errorMessage.textContent = "";
      control.classList.remove("error");
      errorMessage.style.display = "none";
    }

    function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    function validateWhatsapp(number) {
      const whatsappRegex = /^\d{9,}$/;
      return whatsappRegex.test(number);
    }
});