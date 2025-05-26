import React, { useState, useEffect } from 'react';
import './Cart.css';

function Cart() {
    const [cart, setCart] = useState([]);
    const [isCartOpen, setIsCartOpen] = useState(false);

    useEffect(() => {
        loadCart();
        updateCartCount();
    }, []);

    const loadCart = () => {
        const savedCart = localStorage.getItem('cart');
        if (savedCart) {
            setCart(JSON.parse(savedCart));
        }
    };

    const saveCart = () => {
        localStorage.setItem('cart', JSON.stringify(cart));
    };

    const addToCart = (nombre, precio, foto) => {
        const itemIndex = cart.findIndex(item => item.nombre === nombre);
        let newCart = [...cart];
        if (itemIndex > -1) {
            newCart[itemIndex].cantidad += 1;
        } else {
            newCart.push({ nombre, precio, foto, cantidad: 1 });
        }
        setCart(newCart);
        localStorage.setItem('cart', JSON.stringify(newCart));
        updateCartCount();
    };

    const removeFromCart = (nombre) => {
        const itemIndex = cart.findIndex(item => item.nombre === nombre);
        if (itemIndex > -1) {
            let newCart = [...cart];
            newCart[itemIndex].cantidad -= 1;
            if (newCart[itemIndex].cantidad <= 0) {
                newCart.splice(itemIndex, 1);
            }
            setCart(newCart);
            localStorage.setItem('cart', JSON.stringify(newCart));
            updateCartCount();
        }
    };

    const updateCartCount = () => {
        const count = cart.reduce((sum, item) => sum + item.cantidad, 0);
        document.getElementById('cart-count').textContent = count;
    };

    const toggleCart = () => {
        setIsCartOpen(!isCartOpen);
    };

    const goToCheckout = () => {
        const cartData = encodeURIComponent(JSON.stringify(cart));
        window.location.href = `/pasarela-pago?cart=${cartData}`;
    };

    const cartTotal = cart.reduce((sum, item) => sum + item.precio * item.cantidad, 0);

    return (
        <div>
            <div className="cart-container">
                <button id="cart-btn" onClick={toggleCart} style={{ background: 'none', border: 'none', cursor: 'pointer', position: 'relative' }}>
                    <i className="fas fa-shopping-cart" style={{ fontSize: '1.7rem', color: '#FFDA63' }}></i>
                    <span id="cart-count" style={{ position: 'absolute', top: '-8px', right: '-10px', background: '#FFDA63', color: '#181818', fontWeight: 'bold', borderRadius: '50%', padding: '2px 7px', fontSize: '0.9rem' }}>0</span>
                </button>
            </div>

            <div id="cart-panel" className={`cart-panel ${isCartOpen ? 'open' : ''}`}>
                <div className="cart-panel-content">
                    <button id="close-cart" className="close-cart-btn" onClick={toggleCart}>&times;</button>
                    <h2>Carrito</h2>
                    <hr className="cart-modal-hr" />
                    <div id="cart-items">
                        {cart.length === 0 ? (
                            <p style={{ textAlign: 'center', color: '#fff', padding: '20px' }}>El carrito está vacío</p>
                        ) : (
                            cart.map(item => (
                                <div className="cart-item" key={item.nombre}>
                                    <img src={item.foto} alt={item.nombre} className="cart-item-img" />
                                    <div className="cart-item-info">
                                        <div className="cart-item-title">{item.nombre}</div>
                                        <div className="cart-item-details">
                                            <span className="cart-item-price">
                                                <b>{item.precio * item.cantidad}€</b>
                                                <span style={{ fontSize: '0.8em', opacity: '0.6', fontWeight: 'normal' }}>
                                                    ({item.precio}€/ud)
                                                </span>
                                            </span>
                                            <div className="cart-item-controls">
                                                <button onClick={() => removeFromCart(item.nombre)}>-</button>
                                                <span>{item.cantidad}</span>
                                                <button onClick={() => addToCart(item.nombre, item.precio, item.foto)}>+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))
                        )}
                    </div>
                    <div id="cart-total">Total: {cartTotal.toFixed(2)}€</div>
                    <button id="pagar-btn" onClick={goToCheckout}>Pagar</button>
                </div>
            </div>
        </div>
    );
}

export default Cart;