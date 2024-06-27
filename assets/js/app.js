console.log("Hello I am working")

document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".scroll-to-div-wrap ul li");

    items.forEach(item => {
        item.addEventListener("click", function () {
            // Scroll to the target section
            const targetId = this.getAttribute("data-id");
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: "smooth" });
            }

            // Apply the animation
            items.forEach(el => el.classList.remove("animated")); // Remove animation class from all items
            this.classList.add("animated"); // Add animation class to the clicked item

            // Remove the animation class after the animation duration
            setTimeout(() => {
                this.classList.remove("animated");
            }, 300); // Match the duration of the CSS transition
        });
    });
});