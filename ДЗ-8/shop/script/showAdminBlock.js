'use strict';

/*
Функция отображает блоки аккаунта
*/
function showAdminBlock(action) {
    let addBlock = document.querySelector('.admin_account_add_block');
    let editBlock = document.querySelector('.admin_account_edit_block');
    let orderBlock = document.querySelector('.admin_orders_block');
    let addLink = document.querySelector('.add_link');
    let editLink = document.querySelector('.edit_link');
    let ordersLink = document.querySelector('.orders_link');

    if(action == 'add'){
        addBlock.style.display = 'flex';
        editBlock.style.display = 'none';
        orderBlock.style.display = 'none';
        addLink.classList.add("active_left");
        editLink.classList.remove("active_center");
        ordersLink.classList.remove("active_right");
    } else if(action == 'edit') {
        addBlock.style.display = 'none';
        editBlock.style.display = 'flex';
        orderBlock.style.display = 'none';
        addLink.classList.remove("active_left");
        editLink.classList.add("active_center");
        ordersLink.classList.remove("active_right");
    } else if(action == 'orders') {
        addBlock.style.display = 'none';
        editBlock.style.display = 'none';
        orderBlock.style.display = 'flex';
        addLink.classList.remove("active_left");
        editLink.classList.remove("active_center");
        ordersLink.classList.add("active_right");
    }
}

/*
Функция отображает блок редактирования товара
*/
function editGood(id) {
    let goodBlock = document.getElementById(`admin_good_info_${id}`);
    let editFormBlock = document.getElementById(`admin_edit_block_${id}`);
    goodBlock.style.display = 'none';
    editFormBlock.style.display = 'flex';
}

/*
Функция отображает блок описания товара
*/
function showGood(id) {
    let goodBlock = document.getElementById(`admin_good_info_${id}`);
    let editFormBlock = document.getElementById(`admin_edit_block_${id}`);
    goodBlock.style.display = 'flex';
    editFormBlock.style.display = 'none';
}