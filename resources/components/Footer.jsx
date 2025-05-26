import React from 'react';
import './Footer.css';

function Footer() {
    return (
        <footer className="footer">
            <div className="footer-content">
                <div className="footer-section">
                    <h3>Sobre Exides</h3>
                    <p>Tu tienda de confianza en periféricos y equipamiento profesional desde 2005.</p>
                    <div className="social-links">
                        <a href="#" aria-label="Facebook"><i className="fab fa-facebook"></i></a>
                        <a href="#" aria-label="Twitter"><i className="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i className="fab fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i className="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <div className="footer-section">
                    <h3>Enlaces Útiles</h3>
                    <ul>
                        <li><a href="#">Sobre Nosotros</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>

                <div className="footer-section">
                    <h3>Ayuda</h3>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Devoluciones</a></li>
                    </ul>
                </div>

                <div className="footer-section">
                    <h3>Contacto</h3>
                    <ul className="contact-info">
                        <li><i className="fas fa-phone"></i> +34 944 88 66 22</li>
                        <li><i className="fas fa-envelope"></i> contacto@exides.com</li>
                        <li><i className="fas fa-map-marker-alt"></i> Bilbao, España</li>
                    </ul>
                </div>
            </div>

            <div className="footer-bottom">
                <div className="footer-bottom-content">
                    <div className="footer-legal">
                        <a href="#">Política de Privacidad</a>
                        <a href="#">Términos y Condiciones</a>
                        <a href="#">Política de Cookies</a>
                        <a href="#">Aviso Legal</a>
                    </div>
                    <p className="footer-copyright">
                        &copy; 2023 Exides. Todos los derechos reservados
                    </p>
                </div>
            </div>
        </footer>
    );
}

export default Footer;