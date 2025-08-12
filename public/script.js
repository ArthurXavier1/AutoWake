document.addEventListener("DOMContentLoaded", () => {
    let card = document.querySelector(".card");
    let loginbutton = document.querySelector(".loginbutton");
    let cadasbutton = document.querySelector(".cadasbutton");

    loginbutton.onclick = () => {
        card.classList.remove("cadastroActive");
        card.classList.add("LoginActive");
    }

    cadasbutton.onclick = () => {
        card.classList.remove("LoginActive");
        card.classList.add("cadastroActive");
    }
});
