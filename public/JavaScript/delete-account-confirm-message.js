const deletedMessage = document.querySelector(".account-delete-confirm");
const deletedMessageBar = document.querySelector(
    ".account-delete-confirm .delete-message-bar"
);
let isFinished = false;
function hideDeleteMessage() {
    isFinished = true;
    deletedMessage.style.animation = "disappear-message 1.5s linear forwards";
    setTimeout(() => {
        deletedMessage.style.display = "none";
    }, 1500);
}
deletedMessage.addEventListener("mouseenter", () => {
    if (!isFinished) {
        deletedMessageBar.style.visibility = "hidden";
        deletedMessageBar.style.animation = "none";
    }
});
deletedMessage.addEventListener("mouseleave", () => {
    if (!isFinished) {
        deletedMessageBar.style.visibility = "visible";
        deletedMessageBar.style.animation =
            "move-message-line 7s linear forwards";
    }
});
deletedMessageBar.addEventListener("animationend", hideDeleteMessage);
deletedMessage.addEventListener("click", hideDeleteMessage);
