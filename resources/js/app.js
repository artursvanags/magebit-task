document.addEventListener('DOMContentLoaded', function() {
    // Helper function to create error message element
    const createErrorMessage = function(message) {
        const div = document.createElement('div');
        div.textContent = message;
        div.classList.add('error-message', 'text-red-500', 'text-sm', 'mt-2');
        return div;
    };

    // Helper function to validate email
    const validateEmail = function(input) {
        const emailPattern = /^\S+@\S+\.\S+$/;
        const value = input.value.trim();
        if (!value) {
            return "Email address is required";
        } else if (!emailPattern.test(value)) {
            return "Please provide a valid e-mail address";
        }
        return null;
    };

    // Helper function to validate required field
    const validateRequiredField = function(input, fieldName) {
        if (!input.value.trim()) {
            return `${fieldName} is required`;
        }
        return null;
    };

    // Helper function to remove existing error messages
    const removeErrorMessage = function(input) {
        const error = input.parentNode.querySelector('.error-message');
        if (error) {
            error.remove();
        }
    };

    // Helper function to display error messages
    const displayError = function(input, message) {
        removeErrorMessage(input);
        const error = createErrorMessage(message);
        input.parentNode.appendChild(error);
    };

    // Function to handle form validation
    const handleFormValidation = function(event) {
        event.preventDefault();
        const form = event.target;
        const emailInput = form.querySelector('input[type="email"]');
        const passwordInput = form.querySelector('input[name="password"]');
        const passConfirmInput = form.querySelector('input[name="passwordConfirm"]');
        let isValid = true;

        // Email validation
        const emailError = validateEmail(emailInput);
        if (emailError) {
            displayError(emailInput, emailError);
            isValid = false;
        } else {
            removeErrorMessage(emailInput);
        }

        // Password validation
        const passwordError = validateRequiredField(passwordInput, 'Password');
        if (passwordError) {
            displayError(passwordInput, passwordError);
            isValid = false;
        } else {
            removeErrorMessage(passwordInput);
        }

        // Password confirmation validation (only for registration form)
        if (passConfirmInput) {
            const passConfirmError = passwordInput.value.trim() === passConfirmInput.value.trim() ? null : "Passwords must match";
            if (passConfirmError) {
                displayError(passConfirmInput, passConfirmError);
                isValid = false;
            } else {
                removeErrorMessage(passConfirmInput);
            }
        }

        // If all validations pass, submit the form
        if (isValid) {
            form.submit();
        }
    };

    // Get the login and registration forms
    const loginForm = document.getElementById('customer-login-form');
    const registrationForm = document.getElementById('customer-registration-form');

    // Attach event listeners to both forms
    loginForm.addEventListener('submit', handleFormValidation);
    registrationForm.addEventListener('submit', handleFormValidation);
});