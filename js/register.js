function validateRegistration(event) {
    var form = event.target;
    var username = form['username'].value;
    var password = form['password'].value;
    var password2 = form['password2'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    if (username === "") {
        errors["username"] = "* Oh no, You left this Username field empty!\n";
    }
    if (password === "") {
        errors["password"] = "* Oops, you left this Password field empty!\n";
    }
    if (password2 === "") {
        errors["password2"] = "* Re-enter your password HERE!\n";
    }
    else if (password !== password2) {
        errors["password2"] = "* Pssst! Your passwords do not match at all. Give it another go!\n";
    }

    var valid = true;
    for (var index in errors) {
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        spanElement.innerHTML = errorMessage;
    }
    if (!valid) {
        event.preventDefault();
    }
}

var form = document.getElementById("registerForm");
form.addEventListener("submit", validateRegistration);