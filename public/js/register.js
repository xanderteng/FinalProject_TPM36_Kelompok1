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
            setError(teamNameField, "Team Name is required!");
            isValid = false;
        } else {
            setSuccess(teamNameField);
        }

        // Validate Password
        if (!validatePassword(passwordField.value)) {
            setError(passwordField, "Password must contain 8 characters and include at least one uppercase letter, one lowercase letter, one number, and one special character.");
            isValid = false;
        } else {
            setSuccess(passwordField);
        }

        // Validate Confirm Password
        if (confirmPasswordField.value !== passwordField.value) {
            setError(confirmPasswordField, "Password confirmation must match the password");
            isValid = false;
        } else {
            setSuccess(confirmPasswordField);
        }

        if (isValid) {
                window.location.href = "/register-2"; // Redirect if validation passes   
        }
    });

    function validatePassword(password) {
        return password.length >= 8 &&
               /[A-Z]/.test(password) &&
               /[a-z]/.test(password) &&
               /[0-9]/.test(password) &&
               /[^a-zA-Z0-9]/.test(password);
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