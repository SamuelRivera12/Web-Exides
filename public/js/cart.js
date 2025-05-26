let cart = [];

// Function to load cart from localStorage
function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
}

// Function to save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to add item to cart
function addToCart(nombre, precio, foto) {
    loadCart(); // Load cart before modifying
    const itemIndex = cart.findIndex(item => item.nombre === nombre);
    if (itemIndex > -1) {
        cart[itemIndex].cantidad += 1;
    } else {
        cart.push({ nombre, precio, foto, cantidad: 1 });
    }
    saveCart();
    updateCart();
}

// Function to remove item from cart
function removeFromCart(nombre) {
    loadCart(); // Load cart before modifying
    const itemIndex = cart.findIndex(item => item.nombre === nombre);
    if (itemIndex > -1) {
        cart[itemIndex].cantidad -= 1;
        if (cart[itemIndex].cantidad <= 0) {
            cart.splice(itemIndex, 1);
        }
    }
    saveCart();
    updateCart();
}

// Function to update cart display
function updateCart() {
    loadCart(); // Load cart before updating display
    updateCartCount();
    updateCartModal();
}

// Function to update cart count in the UI
function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        const count = cart.reduce((sum, item) => sum + item.cantidad, 0);
        cartCount.textContent = count;
    }
}

// Function to update cart modal content
function updateCartModal() {
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');
    const pagarBtn = document.getElementById('pagar-btn');

    if (!cartItems || !cartTotal) return;

    cartItems.innerHTML = '';
    let total = 0;

    if (cart.length === 0) {
        cartItems.innerHTML = '<p style="text-align: center; color: #fff; padding: 20px;">El carrito está vacío</p>';
        cartTotal.textContent = '';
        if (pagarBtn) pagarBtn.style.display = 'none';
        return;
    }

    cart.forEach(item => {
        const itemTotal = item.precio * item.cantidad;
        total += itemTotal;

        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
            <img src="${item.foto}" alt="${item.nombre}" class="cart-item-img">
            <div class="cart-item-info">
                <div class="cart-item-title">${item.nombre}</div>
                <div class="cart-item-details">
                    <span class="cart-item-price">
                        <b>${itemTotal.toFixed(2)}€</b>
                        <span style="font-size: 0.8em; opacity: 0.6; font-weight: normal;">
                            (${item.precio.toFixed(2)}€/ud)
                        </span>
                    </span>
                    <div class="cart-item-controls">
                        <button onclick="removeFromCart('${item.nombre}')">-</button>
                        <span>${item.cantidad}</span>
                        <button onclick="addToCart('${item.nombre}', ${item.precio}, '${item.foto}')">+</button>
                    </div>
                </div>
            </div>
        `;
        cartItems.appendChild(itemDiv);
    });

    cartTotal.textContent = `Total: ${total.toFixed(2)}€`;
    if (pagarBtn) pagarBtn.style.display = 'block';
}

// Initialization function
function initializeCart() {
    loadCart();
    updateCart();

    // Event listeners for cart button and close button
    const cartBtn = document.getElementById('cart-btn');
    const closeCartBtn = document.getElementById('close-cart');
    const cartPanel = document.getElementById('cart-panel');
    const pagarBtn = document.getElementById('pagar-btn');

    if (cartBtn) {
        cartBtn.addEventListener('click', () => {
            cartPanel.classList.add('open');
            updateCartModal();
        });
    }

    if (closeCartBtn) {
        closeCartBtn.addEventListener('click', () => {
            cartPanel.classList.remove('open');
        });
    }

    if (pagarBtn) {
        pagarBtn.addEventListener('click', () => {
            const cartData = encodeURIComponent(JSON.stringify(cart));
            window.location.href = `/pasarela-pago?cart=${cartData}`;
        });
    }
}

// Make functions globally available
window.addToCart = addToCart;
window.removeFromCart = removeFromCart;

// Initialize cart when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', initializeCart);