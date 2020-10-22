'use strict';

let modal = document.getElementById("modal__window");
let openBtn = document.getElementById("modal__btn");
let closeBtn = document.getElementsByClassName("close__modal__btn")[0];

openBtn.onclick = function () {
    modal.style.display = "block";
};

closeBtn.onclick = function () {
    modal.style.display = "none";
};

document.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    };
};