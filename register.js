document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("register-form");
    const teamNameField = document.querySelector(".input-team-name");
    const passwordField = document.querySelector(".input-password");
    const confirmPasswordField = document.querySelector(".input-confirm-password");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        let isValid = true;

        // Validate Team Name
        if (!teamNameField.value.trim()) {
            setError(teamNameField, "Nama tidak boleh kosong");
            isValid = false;
        } else {
            setSuccess(teamNameField);
        }

        // Validate Password
        if (!validatePassword(passwordField.value)) {
            setError(passwordField, "Minimal 8 karakter, ada huruf besar, kecil, angka & simbol");
            isValid = false;
        } else {
            setSuccess(passwordField);
        }

        // Validate Confirm Password
        if (confirmPasswordField.value !== passwordField.value) {
            setError(confirmPasswordField, "Konfirmasi password harus sama");
            isValid = false;
        } else {
            setSuccess(confirmPasswordField);
        }

        if (isValid) {
            alert("Registrasi berhasil!");
        }
    });

    function validatePassword(password) {
        return password.length >= 8 &&
               /[A-Z]/.test(password) &&
               /[a-z]/.test(password) &&
               /[0-9]/.test(password) &&
               /[@$!%*?&#]/.test(password);
    }

    function setError(input, message) {
        const inputControl = input.parentElement;
        const errorDisplay = inputControl.querySelector(".error-message");
        inputControl.classList.add("error");
        errorDisplay.innerText = message;
    }

    function setSuccess(input) {
        const inputControl = input.parentElement;
        const errorDisplay = inputControl.querySelector(".error-message");
        inputControl.classList.remove("error");
        errorDisplay.innerText = "";
    }
});