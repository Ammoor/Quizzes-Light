function handleDropdownBehavior() {
    document.querySelectorAll(".menu-toggle").forEach((input) => {
        input.addEventListener("change", function () {
            // Close all other checkboxes when one is opened
            if (this.checked) {
                document
                    .querySelectorAll(".menu-toggle")
                    .forEach((otherInput) => {
                        if (otherInput !== this) {
                            otherInput.checked = false;
                        }
                    });
            }
        });
    });
}
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("open");
    if (sidebar.classList.contains("open")) {
        document.querySelector("main").style.marginLeft = "20rem";
    } else {
        document.querySelector("main").style.marginLeft = "0";
    }
}
{
    let currentCard = 0;
    const cards = document.querySelectorAll(".card");
    let currentCardNumber = document.querySelector(".crnt-card-num");
    let button1 = document.querySelector(".btn-1 button");
    let button2 = document.querySelector(".btn-2 button");
    function showCard(index) {
        cards.forEach((card, i) => {
            card.classList.toggle("active", i === index);
        });
    }
    function validateCurrentCard() {
        const currentInputs = cards[currentCard].querySelectorAll(
            'input[type="radio"]:checked'
        );
        return currentInputs.length > 0;
    }
    function submitForm() {
        if (!validateCurrentCard()) {
            alert(
                "Please make sure you select one option before proceeding to the next question."
            );
            return;
        }
        button2.setAttribute("type", "submit");
    }
    function nextCard() {
        if (currentCard < cards.length - 1) {
            if (!validateCurrentCard()) {
                alert(
                    "Please make sure you select one option before proceeding to the next question."
                );
                return;
            }
            button1.classList.remove("not-allowed");
            currentCard++;
            currentCardNumber.innerHTML =
                currentCard + 1 + " / " + cards.length;
            if (currentCard == cards.length - 1) {
                button2.classList.add("submit");
                button2.innerHTML = 'Create <i class="fa-solid fa-check"></i>';
                button2.addEventListener("click", submitForm);
            }
            showCard(currentCard);
        }
    }
    function prevCard() {
        if (currentCard > 0) {
            button2.removeEventListener("click", submitForm);
            button2.classList.remove("submit");
            button2.innerHTML = 'Next <i class="fa-solid fa-arrow-right"></i>';
            currentCardNumber.innerHTML = currentCard + " / " + cards.length;
            currentCard--;
            if (currentCard == 0) {
                button1.classList.add("not-allowed");
            }
            showCard(currentCard);
        }
    }
    // Initialize the first card
    currentCardNumber.innerHTML = currentCard + 1 + " / " + cards.length;
    showCard(currentCard);
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
