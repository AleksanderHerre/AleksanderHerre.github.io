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