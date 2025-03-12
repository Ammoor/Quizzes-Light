const scrollUpButton = document.querySelector(".scroll-up-button button");
window.addEventListener("scroll", function () {
    if (window.scrollY >= 500) {
        scrollUpButton.parentElement.style.animation =
            "move-button-left 1s forwards";
        setTimeout(() => {
            scrollUpButton.parentElement.style.display = "block";
        }, 500);
    } else {
        scrollUpButton.parentElement.style.animation =
            "move-button-right 1s forwards";
        setTimeout(() => {
            scrollUpButton.parentElement.style.display = "none";
        }, 500);
    }
});
scrollUpButton.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
    });
});
