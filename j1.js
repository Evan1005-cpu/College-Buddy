fetch('api/products.php')
	.then(response => response.json())
	.then(data => {
		const productsContainer = document.querySelector('.products');
		data.forEach(product => {
			const productHTML = `
				<div class="product">
					<h3>${product.name}</h3>
					<p>Price: ${product.price}</p>
					<button>Add to Cart</button>
				</div>
			`;
			productsContainer.innerHTML += productHTML;
		});
	});