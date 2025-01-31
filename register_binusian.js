document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registration-form");
    const emailFields = document.querySelectorAll("input[type='email']");
    const whatsappField = document.querySelector(".input-whatsapp");
    const birthDateField = document.querySelector(".input-birth-date");
    const cvUploadField = document.querySelector("#upload-cv");
    const flazzUploadField = document.querySelector("#upload-flazz");
    const radioButtons = document.querySelectorAll("input[name='status']");
    const registerButton = document.querySelector(".button-register");

    function showErrorMessage(input, message) {
        let errorSpan = input.nextElementSibling;
        if (!errorSpan || !errorSpan.classList.contains("error-message")) {
            errorSpan = document.createElement("span");
            errorSpan.classList.add("error-message");
            input.parentNode.insertBefore(errorSpan, input.nextSibling);
        }
        errorSpan.textContent = message;
        errorSpan.style.color = "red";
        errorSpan.style.fontSize = "14px";
        errorSpan.style.marginTop = "5px";
    }

    function clearErrorMessage(input) {
        let errorSpan = input.nextElementSibling;
        if (errorSpan && errorSpan.classList.contains("error-message")) {
            errorSpan.textContent = "";
        }
    }

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (!validateForm()) {
            return;
        }
        alert("Registration successful!");
    });

    function validateForm() {
        let isValid = true;
        
        // Validate required fields
        document.querySelectorAll("input[required]").forEach(input => {
            if (!input.value.trim()) {
                showErrorMessage(input, `${input.placeholder} tidak boleh kosong`);
                isValid = false;
            } else {
                clearErrorMessage(input);
            }
        });

        // Validate Email format
        emailFields.forEach(email => {
            if (!email.value.includes("@")) {
                showErrorMessage(email, "Masukkan email yang valid seperti user@gmail.com");
                isValid = false;
            } else {
                clearErrorMessage(email);
            }
        });

        // Validate WhatsApp number length
        if (whatsappField.value.length < 9) {
            showErrorMessage(whatsappField, "Nomor WhatsApp minimal 9 karakter");
            isValid = false;
        } else {
            clearErrorMessage(whatsappField);
        }

        // Validate Age (minimum 17 years old)
        if (birthDateField) {
            const birthDate = new Date(birthDateField.value);
            const today = new Date();
            const age = today.getFullYear() - birthDate.getFullYear();
            if (age < 17) {
                showErrorMessage(birthDateField, "Anda harus berusia minimal 17 tahun");
                isValid = false;
            } else {
                clearErrorMessage(birthDateField);
            }
        }

        // Validate CV and Flazz Upload formats
        [cvUploadField, flazzUploadField].forEach(fileInput => {
            if (fileInput) {
                const allowedExtensions = fileInput.id === "upload-cv" ? ["pdf"] : ["pdf", "jpg", "jpeg", "png"];
                const fileName = fileInput.value;
                const fileExtension = fileName.split(".").pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    showErrorMessage(fileInput, `${fileInput.id === "upload-cv" ? "CV" : "FLAZZ Card"} harus dalam format ${allowedExtensions.join(", ")}`);
                    isValid = false;
                } else {
                    clearErrorMessage(fileInput);
                }
            }
        });

        // Validate Radio Button Selection
        const isChecked = Array.from(radioButtons).some(radio => radio.checked);
        if (!isChecked) {
            alert("Silakan pilih Binusian atau Non-Binusian.");
            isValid = false;
        }

        return isValid;
    }

    // Instant validation on input fields
    document.querySelectorAll("input").forEach(input => {
        input.addEventListener("input", () => {
            if (input.value.trim()) {
                clearErrorMessage(input);
            }
        });
    });
});
