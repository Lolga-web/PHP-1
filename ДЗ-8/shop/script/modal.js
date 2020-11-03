'use strict';

/*
Фукция открывает модальное окно
*/
function openModal(action) {
    let modal = document.getElementById("modal__window");
    let modalContent = document.getElementById("modal__content_wrp");
    let openBtn = document.getElementById(action);
    let closeBtn = document.getElementsByClassName("close__modal__btn")[0];
    
    modal.style.display = "block";

    checkModalAction (action);

    closeBtn.onclick = function () {
        modal.style.display = "none";
        modalContent.innerHTML = "";
    };

    document.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modalContent.innerHTML = "";
        };
    };      
}

/*
Функция определяет контент для модального окна
*/
function checkModalAction (action) {
    if (action==='login') {
        let url = '/shop/templates/loginForm.php';
        addModalContent(url);
    } else if (action==='reg') {
        let url = '/shop/templates/regForm.php';
        addModalContent(url);
    }
}

/*
Функция наполняет модальное окно контентом
*/
function addModalContent(url) {
    $.ajax({
        type: "POST",
        url: url,
        success: function(result){
            $('#modal__content_wrp').html(result);
        }
    });
}
   