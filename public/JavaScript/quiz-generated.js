function deleteQuiz() {
    if (
        confirm(
            "Deleting this quiz will remove it for all users. Do you still want to proceed?"
        )
    ) {
        document.querySelector("main .delete-quiz-form").submit();
    }
}
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
