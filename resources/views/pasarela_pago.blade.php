<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/Exides-Logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/pasarela_styles.css') }}">
    <title>Pasarela de Pago - Exides</title>
</head>
<body>
    <header>
        <nav>
            <div class="nav_logo">
                <a href="/">
                    <img class="logo" src="{{ asset('images/Exides-Logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="nav_items" id="navItems">
                <a href="/">Inicio</a>
                <a href="/sobrenosotros">Sobre Nosotros</a>
                <a href="/tienda">Tienda</a>
                <a href="/login">Iniciar Sesión</a>
            </div>
            <div class="hamburguesa" id="hamburguesa">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <section class="textoheader">
            <h1>Pago</h1>
        </section>
    </header>

    <div class="contenedor">
        <div class="checkout-grid">
            <div class="resumen-compra">
                <h2>Resumen de la Compra</h2>
                <ul class="lista-productos">
                    @foreach($cart as $item)
                        <li class="producto-item">
                            <img src="{{ $item['foto'] }}" alt="{{ $item['nombre'] }}" class="producto-imagen">
                            <div class="producto-info">
                                <h3 class="producto-nombre">{{ $item['nombre'] }}</h3>
                                <p class="producto-precio">{{ number_format($item['precio'] * $item['cantidad'], 2) }} € ({{ $item['cantidad'] }} unidades)</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="total">
                    <strong>Total:</strong> {{ number_format($total, 2) }} €
                </div>
            </div>

            <div class="detalles-pago">
                <h2>Detalles de Pago</h2>

                <div class="collapsible-section">
                    <button class="collapsible-button" type="button">
                        Dirección de Envío
                        <i class="fas fa-chevron-down arrow-icon"></i>
                    </button>
                    <div class="collapsible-content">
                        <form id="direccion-form">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección:</label>
                                <input type="text" id="direccion" name="direccion" required>
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" id="ciudad" name="ciudad" required>
                            </div>
                            <div class="form-group">
                                <label for="codigo_postal">Código Postal:</label>
                                <input type="text" id="codigo_postal" name="codigo_postal" required>
                            </div>
                            <div class="form-group">
                                <label for="pais">País:</label>
                                <input type="text" id="pais" name="pais" required>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="collapsible-section">
                    <button class="collapsible-button" type="button">
                        Método de Pago
                        <i class="fas fa-chevron-down arrow-icon"></i>
                    </button>
                    <div class="collapsible-content">
                        <div class="opciones-pago">
                            <div class="payment-option">
                                <input type="radio" id="transferencia" name="metodo_pago" value="transferencia" required>
                                <label for="transferencia">Transferencia Bancaria</label>
                            </div>
                            <div id="transferencia-details" class="payment-details">
                                <p><strong>Banco:</strong> BBVA </p>
                                <p><strong>IBAN:</strong> ES12 3456 7890 1234 5678 9012</p>
                                <p><strong>BIC/SWIFT:</strong> BBVAESMMXXX</p>
                            </div>
                            <div class="payment-option">
                                <input type="radio" id="paypal" name="metodo_pago" value="paypal" required>
                                <label for="paypal">PayPal</label>
                            </div>
                            <div id="paypal-details" class="payment-details">
                                <p><strong>Correo Electrónico de PayPal:</strong> pago@exides.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="btn-pagar" id="finalizar-compra-btn" disabled>Finalizar Compra</button>
            </div>
        </div>
    </div>

    <div class="modal" id="processing-modal">
        <div class="modal-content">
            <i class="fas fa-cogs fa-3x"></i>
            <p>Estamos trabajando en ello...</p>
            <button id="modal-accept-btn">Aceptar</button>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Sobre Exides</h3>
                <p>Tu tienda de confianza en periféricos y equipamiento profesional desde 2005.</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Enlaces Útiles</h3>
                <ul>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Ayuda</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Devoluciones</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <ul class="contact-info">
                    <li><i class="fas fa-phone"></i> +34 944 88 66 22</li>
                    <li><i class="fas fa-envelope"></i> contacto@exides.com</li>
                    <li><i class="fas fa-map-marker-alt"></i> Bilbao, España</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="footer-legal">
                    <a href="#">Política de Privacidad</a>
                    <a href="#">Términos y Condiciones</a>
                    <a href="#">Política de Cookies</a>
                    <a href="#">Aviso Legal</a>
                </div>
                <p class="footer-copyright">
                    &copy; 2023 Exides. Todos los derechos reservados
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('hamburguesa').addEventListener('click', function() {
            this.classList.toggle('open');
            document.getElementById('navItems').classList.toggle('open');
        });

        const collButtons = document.querySelectorAll('.collapsible-button');

        collButtons.forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const isOpen = this.classList.contains('active');

                // Close all other collapsible contents
                collButtons.forEach(otherButton => {
                    if (otherButton !== this) {
                        otherButton.classList.remove('active');
                        otherButton.nextElementSibling.style.maxHeight = '0px';
                    }
                });

                // Toggle the current collapsible content
                if (isOpen) {
                    this.classList.remove('active');
                    content.style.maxHeight = '0px';
                } else {
                    this.classList.add('active');
                    content.style.maxHeight = content.scrollHeight + 'px';
                }
            });
        });

        // Function to check if the address form is filled
        function isAddressFormFilled() {
            const form = document.getElementById('direccion-form');
            const inputs = form.querySelectorAll('input');
            for (let i = 0; i < inputs.length; i++) {
                if (inputs[i].value.trim() === '') {
                    return false;
                }
            }
            return true;
        }

        // Function to update the address button color
        function updateAddressButtonColor() {
            const button = document.querySelectorAll('.collapsible-button')[0];
            if (isAddressFormFilled()) {
                button.style.backgroundColor = 'green';
            } else {
                button.style.backgroundColor = '#333';
            }
            updateFinalizarCompraButtonState();
        }

        // Attach event listeners to the input fields
        const addressForm = document.getElementById('direccion-form');
        const addressInputs = addressForm.querySelectorAll('input');
        addressInputs.forEach(input => {
            input.addEventListener('input', updateAddressButtonColor);
        });

        // Call the function on page load to set the initial color
        updateAddressButtonColor();

        // Function to check if a payment method is selected
        function isPaymentMethodSelected() {
            const paymentOptions = document.querySelectorAll('input[name="metodo_pago"]');
            for (let i = 0; i < paymentOptions.length; i++) {
                if (paymentOptions[i].checked) {
                    return true;
                }
            }
            return false;
        }

        // Function to update the payment button color
        function updatePaymentButtonColor() {
            const button = document.querySelectorAll('.collapsible-button')[1]; // Select the second button (Método de Pago)
            const isPaymentSelected = isPaymentMethodSelected();

            if (isPaymentSelected) {
                button.style.backgroundColor = 'green';
            } else {
                button.style.backgroundColor = '#333';
            }
            updateFinalizarCompraButtonState();

            // Show/hide payment details
            const transferenciaDetails = document.getElementById('transferencia-details');
            const paypalDetails = document.getElementById('paypal-details');
            const transferenciaRadio = document.getElementById('transferencia');
            const paypalRadio = document.getElementById('paypal');

            if (transferenciaRadio.checked) {
                transferenciaDetails.style.display = 'block';
                paypalDetails.style.display = 'none';
            } else if (paypalRadio.checked) {
                transferenciaDetails.style.display = 'none';
                paypalDetails.style.display = 'block';
            } else {
                transferenciaDetails.style.display = 'none';
                paypalDetails.style.display = 'none';
            }
        }

        // Attach event listeners to the payment method radio buttons
        const paymentOptions = document.querySelectorAll('input[name="metodo_pago"]');
        paymentOptions.forEach(option => {
            option.addEventListener('change', updatePaymentButtonColor);
        });

        // Call the function on page load to set the initial color
        //updatePaymentButtonColor();

        // Function to update the "Finalizar Compra" button state
        function updateFinalizarCompraButtonState() {
            const finalizarCompraBtn = document.getElementById('finalizar-compra-btn');
            const isAddressFilled = isAddressFormFilled();
            const isPaymentSelected = isPaymentMethodSelected();

            if (isAddressFilled && isPaymentSelected) {
                finalizarCompraBtn.disabled = false;
                finalizarCompraBtn.style.opacity = 1;
                finalizarCompraBtn.style.cursor = 'pointer';
            } else {
                finalizarCompraBtn.disabled = true;
                finalizarCompraBtn.style.opacity = 0.6;
                finalizarCompraBtn.style.cursor = 'not-allowed';
            }
        }

        // Get the modal
        const modal = document.getElementById("processing-modal");

        // Get the button that opens the modal
        const finalizarCompraBtn = document.getElementById("finalizar-compra-btn");

        // Get the <span> element that closes the modal
        const acceptBtn = document.getElementById("modal-accept-btn");

        // When the user clicks on the button, open the modal
        finalizarCompraBtn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        acceptBtn.onclick = function() {
            modal.style.display = "none";
            window.location.href = "/"; // Redirect to the home page
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>