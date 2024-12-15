const nextButton = document.querySelector(".btn-next");
const prevButton = document.querySelector(".btn-prev");

const form_steps = document.querySelectorAll(".form-step");
let active = 1;

nextButton.addEventListener("click", () => {
    active++;
    if (active > form_steps.length) {
        active = form_steps.length;
    }
    updateProgress();
});

prevButton.addEventListener("click", () => {
    active--;
    if (active < 1) {
        active = 1;
    }
    updateProgress();
});

const updateProgress = () => {
    form_steps.forEach((step, i) => {
        if (i === active - 1) {
            step.classList.add("active");
        } else {
            step.classList.remove("active");
        }
    });

    // enable and disable button
    if (active === 1) {
        prevButton.disabled = true;
    } else if (active === form_steps.length) {
        nextButton.disabled = true;
    } else {
        prevButton.disabled = false;
        nextButton.disabled = false;
    }
};
