const nameInput = document.querySelector("#name");
const email = document.querySelector("#email");
const message = document.querySelector("#message");
const success = document.querySelector("#success");
const errorNodes = document.querySelectorAll(".error");

function validateForm() {
    clearMessage();

    let isValid = true;

    if (nameInput.value.trim() === "") {
        errorNodes[0].innerText = "Name cannot be blank";
        nameInput.classList.add("error-border");
        isValid = false;
    }

    if (!emailIsValid(email.value.trim())) {
        errorNodes[1].innerText = "Invalid email address";
        email.classList.add("error-border");
        isValid = false;
    }

    if (message.value.trim() === "") {
        errorNodes[2].innerText = "Message cannot be blank";
        message.classList.add("error-border");
        isValid = false;
    }

    if (isValid) {
        success.innerText = "Form submitted successfully!";
    } else {
        success.innerText = "Form submission failed. Please check errors and try again.";
    }
}

function clearMessage() {
    for (let i = 0; i < errorNodes.length; i++) {
        errorNodes[i].innerText = "";
    }

    nameInput.classList.remove("error-border");
    email.classList.remove("error-border");
    message.classList.remove("error-border");

    success.innerText = "";
}

function emailIsValid(email) {
    let pattern = /\S+@\S+\.\S+/;
    return pattern.test(email);
}
