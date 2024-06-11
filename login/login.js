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

    createAccountForm.addEventListener("submit", e => {
        e.preventDefault();
        const usernameInput = createAccountForm.querySelector("input[name='username']");
        const username = usernameInput.value;

        const usernamePattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
        if (!usernamePattern.test(username)) {
            setInputError(usernameInput, "Username skal inneholde flere en 7 karakterer og skal inneholde minst en stor bokstav og spesiell karakter.");
        } else {
            createAccountForm.submit();
        }
    });

    createAccountForm.addEventListener("submit", e => {
        e.preventDefault();
        const passwordInput = createAccountForm.querySelector("input[name='password']");
        const password = passwordInput.value;

        const passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
        if (!passwordPattern.test(password)) {
            setInputError(passwordInput, "Passordet skal inneholde flere en 7 karakterer og skal inneholde minst en stor bokstav og spesiell karakter.");
        } else {
            createAccountForm.submit();
        }
    });

    
    document.getElementById('LoginCheckPass').onclick = function() {
        if (this.checked) { 
            document.getElementById('loginpassword').type = "text";
            } else {
            document.getElementById('loginpassword').type = "password";
        }
    };

    // Password Checker, login and signup 
    document.getElementById('SignCheckPass').onclick = function() {
        if (this.checked) { 
            document.getElementById('signuppassword').type = "text";
            } else {
            document.getElementById('signuppassword').type = "password";
        }
    };
});
