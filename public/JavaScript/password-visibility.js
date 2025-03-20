const showPasswordAudio = document.getElementById("show-password-audio");
const hidePasswordAudio = document.getElementById("hide-password-audio");
function passwordVisibility() {
    const passwordFelid = document.querySelector(
        ".form-container .form form .password-container input"
    );
    let visibilityButton = document.querySelector(
        ".form-container .form form .password-container button"
    );
    if (visibilityButton.className == "hide") {
        showPasswordAudio.play();
        visibilityButton.setAttribute("class", "show");
        visibilityButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
        passwordFelid.setAttribute("type", "text");
    } else {
        hidePasswordAudio.play();
        visibilityButton.setAttribute("class", "hide");
        visibilityButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
        passwordFelid.setAttribute("type", "password");
    }
}
function confirmPasswordVisibility() {
    const passwordFelid = document.querySelector(
        ".form-container .form form .confirm-password-container input"
    );
    let visibilityButton = document.querySelector(
        ".form-container .form form .confirm-password-container button"
    );
    if (visibilityButton.className == "hide") {
        showPasswordAudio.play();
        visibilityButton.setAttribute("class", "show");
        visibilityButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
        passwordFelid.setAttribute("type", "text");
    } else {
        hidePasswordAudio.play();
        visibilityButton.setAttribute("class", "hide");
        visibilityButton.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
        passwordFelid.setAttribute("type", "password");
    }
}
