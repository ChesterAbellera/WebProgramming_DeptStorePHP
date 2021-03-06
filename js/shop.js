window.onload = function () {
    //-------------------------------------------------------------------------
    // Defines an event listener for the 'createShopForm'
    //-------------------------------------------------------------------------
    var createShopForm = document.getElementById('createShopForm');
    if (createShopForm !== null) {
        createShopForm.addEventListener('submit', validateShopForm);
    }

    function validateShopForm(event) {
        var form = event.target; 

        var address = form['address'].value;
        var shopmanagername = form['shopmanagername'].value;
        var phonenumber = form['phonenumber'].value;
        var dateopened = form['dateopened'].value;
        var url = form['url'].value;
        var regionnumber = form['regionnumber'].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (address === "") {
            errors["address"] = "* Hey, you forgot to fill in the Shop Address!\n";
        }
        if (shopmanagername === "") {
            errors["shopmanagername"] = "* Hey, you forgot to fill in the name of your Shop Manager!\n";
        }
        if (phonenumber === "") {
            errors["phonenumber"] = "* Hey, you forgot to fill in your Shop Phone Number!\n";
        }
        if (dateopened === "") {
            errors["dateopened"] = "* Hey, you forgot to fill in when the shop was opened!\n";
        }
        if (url === "") {
            errors["url"] = "* Hey, you forgot to fill in the Url Address of your shop!\n";
        }
        if (regionnumber === "") {
            errors["regionnumber"] = "* Hey, you forgot to fill in the Region Number associated with your shop!\n";
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
    // Defines an event listener for the 'editShopForm'
    //-------------------------------------------------------------------------
    var editShopForm = document.getElementById('editShopForm');
    if (editShopForm !== null) {
        editShopForm.addEventListener('submit', validateShopForm);
    }

    //-------------------------------------------------------------------------
    // Defines an event listener for any 'deleteShop' links
    //-------------------------------------------------------------------------
    var deleteLinks = document.getElementsByClassName('deleteShop');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    function deleteLink(event) {
        if (!confirm("Are you really sure you want to delete this shop?")) {
            event.preventDefault();
        }
    }

};