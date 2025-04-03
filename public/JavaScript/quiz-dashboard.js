const quizNameInput = document.querySelector(
    ".update-quiz-name-form .edit-view .content input"
);
document
    .querySelector(".update-quiz-name-form form")
    .addEventListener("submit", function (event) {
        if (quizNameInput.value.trim().length == 0) {
            event.preventDefault();
            alert("Quiz name cannot be blank. Please enter a valid name.");
        }
    });
function expandEditView() {
    const editView = document.querySelector(
        ".update-quiz-name-form .edit-view"
    );
    if (editView.classList.contains("not-active")) {
        editView.classList.remove("not-active");
        editView.classList.add("active");
    } else {
        editView.classList.remove("active");
        editView.classList.add("not-active");
    }
}
function deleteQuiz() {
    if (
        confirm(
            "Deleting this quiz will permanently erase all data, making it inaccessible to all users. This action cannot be undone. Do you want to proceed?"
        )
    ) {
        document.querySelector("main .delete-quiz-form form").submit();
    }
}
