document.querySelectorAll(".menu-toggle").forEach((input) => {
    input.addEventListener("change", function () {
        // Close all other checkboxes when one is opened
        if (this.checked) {
            document.querySelectorAll(".menu-toggle").forEach((otherInput) => {
                if (otherInput !== this) {
                    otherInput.checked = false;
                }
            });
        }
    });
});
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("open");
    if (sidebar.classList.contains("open")) {
        document.querySelector("main").style.marginLeft = "20rem";
    } else {
        document.querySelector("main").style.marginLeft = "0";
    }
}
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
