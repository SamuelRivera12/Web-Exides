import React from 'react';
import './OpinionCliente.css';

function OpinionCliente({ image, name, review, stars }) {
    return (
        <div className="tarjeta">
            <img src={image} alt={`Foto de ${name}`} />
            <h4>{name}</h4>
            <p>{review}</p>
            <div className="estrellas">
                {Array.from({ length: stars }, (_, index) => (
                    <img key={index} src="/images/star.png" alt="Estrella" />
                ))}
                {Array.from({ length: 5 - stars }, (_, index) => (
                    <img key={index + stars} src="/images/empty_star.png" alt="Estrella Vacía" />
                ))}
            </div>
        </div>
    );
}

export default OpinionCliente;