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
function deleteQuiz() {
    if (
        confirm(
            "Deleting this quiz will remove it for all users. Do you still want to proceed?"
        )
    ) {
        document.querySelector("main .delete-quiz-form").submit();
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
function expandEditView() {
    const editView = document.querySelector(".update-quiz-form .edit-view");
    if (editView.classList.contains("not-active")) {
        editView.classList.remove("not-active");
        editView.classList.add("active");
    } else {
        editView.classList.remove("active");
        editView.classList.add("not-active");
    }
}
function updateQuiz() {
    if (
        confirm(
            "By proceeding, you accept that the changes will override the existing quiz settings and may disrupt ongoing user activities. Do you wish to continue?"
        )
    ) {
        document.querySelector("main .update-quiz-form").submit();
    }
}
