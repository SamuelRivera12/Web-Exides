import React from 'react';
import './FiltrosTienda.css';

function FiltrosTienda() {
    return (
        <form id="filtros-form" className="filtros-menu">
            <input type="text" id="filtro-titulo" placeholder="Buscar por título..." />
            <input type="number" id="filtro-precio-min" placeholder="Precio mínimo" min="0" step="0.01" />
            <input type="number" id="filtro-precio-max" placeholder="Precio máximo" min="0" step="0.01" />
            <select id="filtro-categoria">
                <option value="">Todas las categorías</option>
                <option value="Ratones">Ratones</option>
                <option value="Teclados">Teclados</option>
                <option value="Cascos">Cascos</option>
                <option value="Altavoces">Altavoces</option>
                <option value="Monitores">Monitores</option>
            </select>
            <button type="submit">Aplicar filtros</button>
        </form>
    );
}

export default FiltrosTienda;