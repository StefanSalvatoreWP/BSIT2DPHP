const productList = document.querySelectorAll('.productList');
const cartNotification = document.querySelector('.notification');
let cartCount = 0;

productList.forEach((list) => {
    list.addEventListener('click', () => {
        cartCount++;
        cartNotification.textContent = cartCount;
    });
});