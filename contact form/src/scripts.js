function validateForm() {

    let name = document.forms[0]["name"].value;
    let phoneNumber = document.forms[0]["phoneNumber"].value;
    let email = document.forms[0]["email"].value
    
    if (name == "" || phoneNumber == "" || email == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "All fields must be filled out"
        });
        return false;
    }
    let numRegex = /^\d{10}$/;
    if (!numRegex.test(phoneNumber)) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Invalid Mobile number!"
        });
        return false;
    }
    return true;
}