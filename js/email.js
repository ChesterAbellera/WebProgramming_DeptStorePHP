function validateEmail(event) {
    var form = event.target;
    var emailaddress = form['emailaddress'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    if (emailaddress === "") {
        errors["emailaddress"] = "* Oh no, You left this e-mail field empty!\n";
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

var form = document.getElementById("emailForm");
form.addEventListener("submit", validateEmail);