document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".about-us .card");
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.animation = "move-card-right 1.5s forwards";
            } else {
                entry.target.style.animation = "move-card-left 1.5s forwards";
            }
        });
    });
    elements.forEach((element) => {
        observer.observe(element);
    });

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
});
