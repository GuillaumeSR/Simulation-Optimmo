document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll(".card");
    const button = document.querySelector(".btn-continue");

    cards.forEach(function(card) {
        card.addEventListener('click', function() {
            cards.forEach(function(otherCard) {
                if (otherCard !== card) {
                    otherCard.style.border = "none";
                }
            });
            card.style.border = "1px solid #07755A";
            button.style.backgroundColor = "#07755A";
        });
    });
});
