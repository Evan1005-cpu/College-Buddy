let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>
{
	loginForm.classList.toggle('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>
{
	shoppingCart.classList.toggle('active');
}