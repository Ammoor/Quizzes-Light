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
    function showCard(index) {
        cards.forEach((card, i) => {
            card.classList.toggle("active", i === index);
        });
    }
    function nextCard() {
        if (currentCard < cards.length - 1) {
            currentCardNumber.innerHTML = currentCard + 2 + "/" + cards.length;
            currentCard++;
            showCard(currentCard);
        }
    }
    function prevCard() {
        if (currentCard > 0) {
            currentCardNumber.innerHTML = currentCard + "/" + cards.length;
            currentCard--;
            showCard(currentCard);
        }
    }
    // Initialize the first card
    currentCardNumber.innerHTML = currentCard + 1 + "/" + cards.length;
    showCard(currentCard);
}
