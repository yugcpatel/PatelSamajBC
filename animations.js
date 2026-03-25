document.addEventListener("DOMContentLoaded", function() {
    // Automatically apply .reveal to main content sections if missing
    const sections = document.querySelectorAll("section:not(.hero)");
    sections.forEach(sec => {
        if (!sec.classList.contains("reveal")) {
            sec.classList.add("reveal");
        }
    });

    const reveals = document.querySelectorAll(".reveal");

    function reveal() {
        const windowHeight = window.innerHeight;
        const elementVisible = 50;

        reveals.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            if (elementTop < windowHeight - elementVisible) {
                element.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", reveal);
    reveal(); // Trigger once on load
});
