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
