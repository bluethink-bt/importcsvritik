function validation() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let pass = document.getElementById('password').value;
    let confpass = document.getElementById('confpassword').value;

    console.log(Number.isInteger(phone));

    if (name.length < 3) {
        document.getElementById("nameerr").innerHTML = 'Name is too short...';
        return false;
    } else {

        document.getElementById("nameerr").innerHTML = '';
    }

    if (phone.length > 10 || phone.length < 10) {
        document.getElementById("mobileerr").innerHTML = 'Mobile no. must be 10 digit';
        return false;
    } else {

        document.getElementById("mobileerr").innerHTML = '';
    }

    if (!(/[6-9]\d{9}/.test(phone))) {
        document.getElementById("mobileerr").innerHTML = 'Enter valid phone number...';
        return false;
    } else {

        document.getElementById("mobileerr").innerHTML = '';
    }

    if (pass.length < 8) {
        document.getElementById("passerr").innerHTML = 'Password must be greater the 8 digit....';
        return false;

    } else {

        document.getElementById("passerr").innerHTML = '';
    }

    if (pass != confpass) {
        document.getElementById("confpasserr").innerHTML = 'Password Not Match';

        return false;
    } else {

        document.getElementById("confpasserr").innerHTML = '';
    }
    return true;
}