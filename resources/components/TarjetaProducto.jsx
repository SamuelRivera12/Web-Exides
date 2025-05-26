import React from 'react';
import './TarjetaProducto.css';

function TarjetaProducto({ product, addToCart }) {
    return (
        <a href={`/producto/${product.id}`} className="product-card"
            data-titulo={product.nombre.toLowerCase()}
            data-precio={product.precio}
            data-categoria={product.categoria}>
            <img className="product-image" src={product.foto} alt={product.nombre} />
            <h3 className="product-title">{product.nombre}</h3>
            <div className="product-bottom">
                <strong className="product-price">
                    {product.precio.toFixed(2)} €
                </strong>
                <button className="product-button" onClick={(e) => {
                    e.preventDefault();
                    addToCart(product.nombre, product.precio, product.foto);
                }}>
                    Agregar al carrito
                </button>
            </div>
        </a>
    );
}

export default TarjetaProducto;