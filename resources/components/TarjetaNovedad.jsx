import React from 'react';
import './TarjetaNovedad.css';

function TarjetaNovedad({ imageUrl, productId, description }) {
    return (
        <div className="producto-wrapper">
            <a href={`/producto/${productId}`}>
                <div className="nofotos">
                    <img src={imageUrl} alt="Periférico" />
                    <div className="nohover">
                        <p>Ver en Tienda</p>
                    </div>
                </div>
                <p className="producto-descripcion">{description}</p>
            </a>
        </div>
    );
}

export default TarjetaNovedad;