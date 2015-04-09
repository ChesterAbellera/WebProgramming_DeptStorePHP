window.onload = function () {
    //-------------------------------------------------------------------------
    // Defines an event listener for the 'createRegionForm'
    //-------------------------------------------------------------------------
    var createRegionForm = document.getElementById('createRegionForm');
    if (createRegionForm !== null) {
        createRegionForm.addEventListener('submit', validateRegionForm);
    }

    function validateRegionForm(event) {
        var form = event.target; 

        var regionname = form['regionname'].value;
        var regionalmanager = form['shopmanagername'].value;
        var phonenumber = form['regionalmanager'].value;
        var email = form['email'].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (regionname === "") {
            errors["regionname"] = "* Hey, you forgot to fill in the Region Name\n";
        }
        if (regionalmanager === "") {
            errors["regionalmanager"] = "* Hey, you forgot to fill in the Regional Manager!\n";
        }
        if (phonenumber === "") {
            errors["phonenumber"] = "* Hey, you forgot to fill in the Region Phone Number!\n";
        }
        if (email === "") {
            errors["email"] = "* Hey, you forgot to fill in the Email form!\n";
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
        else if (!confirm("Proceed ?")) {
            event.preventDefault();
        }
    }

    //-------------------------------------------------------------------------
    // Defines an event listener for the 'editRegionForm'
    //-------------------------------------------------------------------------
    var editRegionForm = document.getElementById('editRegionForm');
    if (editRegionForm !== null) {
        editRegionForm.addEventListener('submit', validateRegionForm);
    }

    //-------------------------------------------------------------------------
    // Defines an event listener for any 'deleteRegion' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteRegion');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you sure you want to delete this region?")) {
            event.preventDefault();
        }
    }

};