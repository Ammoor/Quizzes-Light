let currentCardIndex = 0;
const cards = document.querySelectorAll("main .question-card");
const currentCardNumber = document.querySelector(".crnt-card-number");
const prevButton = document.querySelector("main .form-buttons .prev");
const nextButton = document.querySelector("main .form-buttons .next");
function showCard(index) {
    cards.forEach((card, i) => {
        card.classList.toggle("active", i === index);
    });
}
function prevCard() {
    if (currentCardIndex > 0) {
        if (currentCardIndex == 1) {
            prevButton.classList.add("not-allowed");
        }
        nextButton.classList.remove("not-allowed");
        currentCardIndex--;
        showCard(currentCardIndex);
        showCurrentCardNumber(currentCardIndex);
    }
}
function submitForm() {
    if (
        confirm(
            "Are you sure you want to submit the quiz? Once submitted, your answers cannot be changed."
        )
    ) {
        document.querySelector("main form").submit();
    }
}
function nextCard() {
    if (currentCardIndex < cards.length - 1) {
        if (currentCardIndex == cards.length - 2) {
            nextButton.classList.add("not-allowed");
        }
        prevButton.classList.remove("not-allowed");
        currentCardIndex++;
        showCard(currentCardIndex);
        showCurrentCardNumber(currentCardIndex);
    }
}
function showCurrentCardNumber() {
    currentCardNumber.innerHTML = currentCardIndex + 1 + " / " + cards.length;
}
// To show the first card.
showCurrentCardNumber(currentCardIndex);
showCard(currentCardIndex);
