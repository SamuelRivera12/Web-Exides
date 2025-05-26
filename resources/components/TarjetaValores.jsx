import React from 'react';
import './TarjetaValores.css';

function TarjetaValores({ image, title, description }) {
    return (
        <div className="valor-card">
            <img src={image} alt={title} />
            <h3>{title}</h3>
            <p>{description}</p>
        </div>
    );
}

export default TarjetaValores;