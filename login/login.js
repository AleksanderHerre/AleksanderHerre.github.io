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
            // Denne delen av koden advarer deg mot og ha mindre en 3 karakterer i brukernavnet ditt
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 3) {
                setInputError(inputElement, "Username should be more than 3 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });

    createAccountForm.addEventListener("submit", e => {
        e.preventDefault();

        const usernameInput = createAccountForm.querySelector("input[name='username']");
        const passwordInput = createAccountForm.querySelector("input[name='password']");
        const mailInput = createAccountForm.querySelector("input[name='mail']");

        const username = usernameInput.value;
        const password = passwordInput.value;
        const mail = mailInput.value;

        const usernamePattern = /^(?=.{3,})/;
        const passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.{8,})/;
        const mailPattern = /^(?=.*[@.])/;

        let isValid = true;

        if (!mailPattern.test(mail)) {
            setInputError(mailInput, "Email skal inneholde @ og dot");
            isValid = false; 
        } else {
            clearInputError(mailInput);
        }

        if (!usernamePattern.test(username)) {
            setInputError(usernameInput, "Brukernavnet skal inneholde 3 eller flere karakterer.");
            isValid = false;
        } else {
            clearInputError(usernameInput);
        }

        if (!passwordPattern.test(password)) {
            setInputError(passwordInput, "Passordet skal inneholde flere en 7 karakterer og skal inneholde minst en stor bokstav og spesiell karakter.");
            isValid = false;
        } else {
            clearInputError(passwordInput);
        }

        if (isValid) {
            createAccountForm.submit();
        }
    });

    document.getElementById('LoginCheckPass').onclick = function() {
        const loginPasswordInput = document.getElementById('loginpassword');
        loginPasswordInput.type = this.checked ? "text" : "password";
    };

    document.getElementById('SignCheckPass').onclick = function() {
        const signupPasswordInput = document.getElementById('signuppassword');
        signupPasswordInput.type = this.checked ? "text" : "password";
    };
});

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}
