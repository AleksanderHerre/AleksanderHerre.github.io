function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

// Sjekker om passordet følger reglamange 
function password_valid() {
    const createAccountForm = document.querySelector("#createAccount");
    const passwordInput = createAccountForm.querySelector("input[name='password']");
    const password = passwordInput.value;

    const passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{7,})/;
    if (!passwordPattern.test(password)) {
        setInputError(passwordInput, "Passordet må være lengre enn 6 tegn og må inneholde minst én stor bokstav og én spesiell karakter.");
        return false; // Return false if validation fails
    } else {
        clearInputError(passwordInput);
        return true; // Return true if validation passes
    }    
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
		// Denne delen av koden advarer deg mot og ha  mindre en 3 karakterer i brukernavnet ditt
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 3) {
                setInputError(inputElement, "Username should be more than 3 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    
    });

    document.addEventListener("DOMContentLoaded", () => {
        const createAccountForm = document.querySelector("#createAccount");
    
        createAccountForm.addEventListener("submit", e => {
            e.preventDefault();
            // Validate password before submitting the form
            if (password_valid()) {
                // If validation passes, submit the form
                createAccountForm.submit();
            }
        });
    });
});
