npm install express mongoose body-parser
const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/ecommerce', { useNewUrlParser: true, useUnifiedTopology: true });

// Define Cart Schema
const cartSchema = new mongoose.Schema({
  productId: String,
  productName: String,
  quantity: Number,
  price: Number
});

// Cart Model
const Cart = mongoose.model('Cart', cartSchema);

// Add Item to Cart
app.post('/cart/add', async (req, res) => {
  const { productId, productName, quantity, price } = req.body;
  try {
    let item = await Cart.findOne({ productId });
    
    // If item exists in cart, update the quantity
    if (item) {
      item.quantity += quantity;
      await item.save();
    } else {
      // Add new item to cart
      const newItem = new Cart({ productId, productName, quantity, price });
      await newItem.save();
    }
    res.status(200).json({ message: 'Item added to cart' });
  } catch (error) {
    res.status(500).json({ error: 'Failed to add item to cart' });
  }
});

// View Cart Items
app.get('/cart', async (req, res) => {
  try {
    const cartItems = await Cart.find();
    res.status(200).json(cartItems);
  } catch (error) {
    res.status(500).json({ error: 'Failed to retrieve cart' });
  }
});

// Remove Item from Cart
app.delete('/cart/remove/:id', async (req, res) => {
  const itemId = req.params.id;
  try {
    await Cart.findByIdAndRemove(itemId);
    res.status(200).json({ message: 'Item removed from cart' });
  } catch (error) {
    res.status(500).json({ error: 'Failed to remove item from cart' });
  }
});

// Start the Server
app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
