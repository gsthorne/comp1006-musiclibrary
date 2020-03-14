function confirmDelete() {
    return confirm("Are you sure you want to delete this?");
}

function comparePasswords() {
    // get password values
    let pw1 = document.getElementById('password').value;
    let pw2 = document.getElementById('confirm').value;
    let pwMsg = document.getElementById('pwMsg');

    // compare the 2 passwords entered
    if (pw1 != pw2) {
        // display error message in red
        pwMsg.innerText = 'Passwords do not match';
        pwMsg.className = 'text-danger';
        return false;
    } else {
        // remove error message
        pwMsg.innerText = '';
        pwMsg.className = '';
        return true;
    }
}

function showHidePassword() {
    // reference the password
    let pw = document.getElementById('password');
    let img = document.getElementById('showHideIcon');

    // if the box is currently type password, change it to type text
    if (pw.type == 'password') {
        pw.type = 'text';
        img.src = 'img/hide.png';
    } else {
        pw.type = 'password';
        img.src = 'img/show.png';
    }
}