<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TechAdmin - Panel de Administración</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.41.0/dist/apexcharts.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
  <style id="app-style">
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4895ef;
      --success-color: #4cc9f0;
      --warning-color: #f72585;
      --sidebar-width: 250px;
      --sidebar-collapsed-width: 70px;
      --header-height: 60px;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      overflow-x: hidden;
    }
    
    .wrapper {
      display: flex;
      width: 100%;
      align-items: stretch;
      min-height: 100vh;
    }
    
    .sidebar {
      min-width: var(--sidebar-width);
      max-width: var(--sidebar-width);
      background: #2b2d42;
      color: #fff;
      transition: all 0.3s;
      z-index: 1000;
      height: 100vh;
      position: fixed;
      display: flex;
      flex-direction: column;
    }
    
    .sidebar.collapsed {
      min-width: var(--sidebar-collapsed-width);
      max-width: var(--sidebar-collapsed-width);
    }
    
    .sidebar.collapsed .sidebar-header h3,
    .sidebar.collapsed .sidebar-item-text,
    .sidebar.collapsed .dropdown-toggle::after {
      display: none;
    }
    
    .sidebar.collapsed .sidebar-item i {
      margin-right: 0;
      font-size: 1.3rem;
    }
    
    .sidebar-header {
      padding: 15px;
      background: #1d1e33;
      height: var(--header-height);
      display: flex;
      align-items: center;
    }
    
    .sidebar-header h3 {
      color: #fff;
      margin: 0;
      font-size: 1.3rem;
      font-weight: 600;
    }
    
    .sidebar-menu {
      padding: 0;
      list-style: none;
      flex: 1;
      overflow-y: auto;
    }
    
    .sidebar-item {
      padding: 15px 20px;
      display: flex;
      align-items: center;
      color: rgba(255, 255, 255, 0.8);
      transition: all 0.3s;
      text-decoration: none;
      cursor: pointer;
    }
    
    .sidebar-item:hover, .sidebar-item.active {
      color: #fff;
      background: #3f37c9;
    }
    
    .sidebar-item i {
      margin-right: 15px;
      font-size: 1.1rem;
      width: 20px;
      text-align: center;
    }
    
    .content {
      width: 100%;
      min-height: 100vh;
      transition: all 0.3s;
      margin-left: var(--sidebar-width);
      display: flex;
      flex-direction: column;
    }
    
    .content.expanded {
      margin-left: var(--sidebar-collapsed-width);
    }
    
    .header {
      height: var(--header-height);
      background: #fff;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid #eee;
      position: sticky;
      top: 0;
      z-index: 999;
    }
    
    .toggle-sidebar {
      cursor: pointer;
      color: #2b2d42;
      font-size: 1.3rem;
    }
    
    .user-info {
      display: flex;
      align-items: center;
    }
    
    .user-info .user-name {
      margin-right: 10px;
      font-weight: 500;
    }
    
    .user-info img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      object-fit: cover;
    }
    
    .main-content {
      padding: 20px;
      flex: 1;
    }
    
    .section-title {
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: #2b2d42;
    }
    
    .card {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      border: none;
      border-radius: 10px;
      margin-bottom: 25px;
      transition: all 0.3s;
    }
    
    .card:hover {
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
      transform: translateY(-5px);
    }
    
    .stats-card {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: #fff;
    }
    
    .stats-card .card-body {
      padding: 20px;
    }
    
    .stats-card .stat-icon {
      font-size: 2rem;
      margin-bottom: 10px;
    }
    
    .stats-card .stat-value {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 5px;
    }
    
    .stats-card .stat-label {
      font-size: 0.9rem;
      opacity: 0.8;
    }
    
    .table-top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
    }
    
    .add-btn {
      background-color: var(--primary-color);
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      color: white;
      display: flex;
      align-items: center;
      transition: all 0.3s;
    }
    
    .add-btn:hover {
      background-color: var(--secondary-color);
    }
    
    .add-btn i {
      margin-right: 8px;
    }
    
    .action-btn {
      padding: 6px;
      margin: 0 3px;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s;
    }
    
    .edit-btn {
      background-color: var(--accent-color);
      color: white;
    }
    
    .delete-btn {
      background-color: var(--warning-color);
      color: white;
    }
    
    .badge-stock {
      padding: 5px 10px;
      border-radius: 20px;
      font-weight: 500;
      font-size: 0.75rem;
    }
    
    .badge-stock.in-stock {
      background-color: rgba(76, 201, 240, 0.15);
      color: var(--success-color);
    }
    
    .badge-stock.low-stock {
      background-color: rgba(255, 183, 3, 0.15);
      color: #ffb703;
    }
    
    .badge-stock.out-of-stock {
      background-color: rgba(247, 37, 133, 0.15);
      color: var(--warning-color);
    }
    
    .modal-form .form-label {
      font-weight: 500;
      color: #2b2d42;
    }
    
    .section-content {
      display: none;
    }
    
    .section-content.active {
      display: block;
    }
    
    .chart-container {
      min-height: 300px;
    }
    
    /* Responsive */
    @media (max-width: 992px) {
      .sidebar {
        min-width: var(--sidebar-collapsed-width);
        max-width: var(--sidebar-collapsed-width);
      }
      
      .sidebar .sidebar-header h3,
      .sidebar .sidebar-item-text,
      .sidebar .dropdown-toggle::after {
        display: none;
      }
      
      .sidebar .sidebar-item i {
        margin-right: 0;
        font-size: 1.3rem;
      }
      
      .content {
        margin-left: var(--sidebar-collapsed-width);
      }
      
      .sidebar.expanded {
        min-width: var(--sidebar-width);
        max-width: var(--sidebar-width);
        position: fixed;
        z-index: 1030;
        height: 100vh;
      }
      
      .sidebar.expanded .sidebar-header h3,
      .sidebar.expanded .sidebar-item-text,
      .sidebar.expanded .dropdown-toggle::after {
        display: inline;
      }
      
      .sidebar.expanded .sidebar-item i {
        margin-right: 15px;
        font-size: 1.1rem;
      }
      
      .overlay {
        display: none;
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.7);
        z-index: 998;
        opacity: 0;
        transition: all 0.5s ease-in-out;
      }
      
      .overlay.active {
        display: block;
        opacity: 1;
      }
    }
    
    @media (max-width: 576px) {
      .content {
        margin-left: 0;
      }
      
      .sidebar {
        min-width: var(--sidebar-width);
        max-width: var(--sidebar-width);
        transform: translateX(-100%);
        transition: 0.5s;
      }
      
      .sidebar.expanded {
        transform: translateX(0);
      }
    }

    .settings-switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .settings-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .settings-slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .settings-slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked + .settings-slider {
      background-color: var(--primary-color);
    }

    input:checked + .settings-slider:before {
      transform: translateX(26px);
    }

    .user-info.dropdown {
  cursor: pointer;
}

.user-info .dropdown-toggle::after {
  margin-left: 0.5rem;
}

.user-info img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  object-fit: cover;
}

.dropdown-item {
  padding: 0.5rem 1rem;
  display: flex;
  align-items: center;
}

.dropdown-item i {
  width: 20px;
}

/* Estilos para el tema oscuro */
body.dark-theme {
  background-color: #1a1a1a;
  color: #ffffff;
}

body.dark-theme .card {
  background-color: #2d2d2d;
  border-color: #404040;
}

body.dark-theme .header {
  background-color: #2d2d2d;
  border-color: #404040;
}

body.dark-theme .dropdown-menu {
  background-color: #2d2d2d;
  border-color: #404040;
}

body.dark-theme .dropdown-item {
  color: #ffffff;
}

body.dark-theme .dropdown-item:hover {
  background-color: #404040;
}

body.dark-theme .dropdown-divider {
  border-color: #404040;
}

body.dark-theme {
  background-color: #1a1a1a;
  color: #ffffff;
}

/* Estilos para DataTables en modo oscuro */
body.dark-theme .dataTables_wrapper {
  color: #ffffff;
}

body.dark-theme .table {
  color: #ffffff;
  background-color: #2d2d2d;
}

body.dark-theme .table thead th {
  background-color: #343434;
  color: #ffffff;
  border-color: #404040;
}

body.dark-theme .table td {
  border-color: #404040;
}

body.dark-theme .table-striped tbody tr:nth-of-type(odd) {
  background-color: #262626;
}

body.dark-theme .table-hover tbody tr:hover {
  background-color: #363636;
  color: #ffffff;
}

/* Controlees de DataTables */
body.dark-theme .dataTables_length,
body.dark-theme .dataTables_filter,
body.dark-theme .dataTables_info,
body.dark-theme .dataTables_processing {
  color: #ffffff !important;
}

body.dark-theme .dataTables_wrapper .dataTables_length select,
body.dark-theme .dataTables_wrapper .dataTables_filter input {
  background-color: #2d2d2d;
  color: #ffffff;
  border-color: #404040;
}

body.dark-theme .page-link {
  background-color: #2d2d2d;
  border-color: #404040;
  color: #ffffff;
}

body.dark-theme .page-item.active .page-link {
  background-color: #4361ee;
  border-color: #4361ee;
}

body.dark-theme .page-item.disabled .page-link {
  background-color: #262626;
  border-color: #404040;
  color: #666666;
}

/* Modales en modo oscuro */
body.dark-theme .modal-content {
  background-color: #2d2d2d;
  border-color: #404040;
}

body.dark-theme .modal-header {
  border-bottom-color: #404040;
}

body.dark-theme .modal-footer {
  border-top-color: #404040;
}

/* Inputs y selects en modo oscuro */
body.dark-theme .form-controle,
body.dark-theme .form-select {
  background-color: #2d2d2d;
  border-color: #404040;
  color: #ffffff;
}

body.dark-theme .form-controle:focus,
body.dark-theme .form-select:focus {
  background-color: #363636;
  border-color: #4361ee;
  color: #ffffff;
}

/* Badges en modo oscuro */
body.dark-theme .badge {
  border: 1px solid rgba(255,255,255,0.1);
}

/* Charts en modo oscuro */
body.dark-theme .apexcharts-text,
body.dark-theme .apexcharts-legend-text {
  color: #ffffff !important;
}

body.dark-theme .apexcharts-gridline {
  stroke: #404040;
}

body.dark-theme .apexcharts-tooltip {
  background-color: #2d2d2d !important;
  border-color: #404040 !important;
  color: #ffffff !important;
}

/* Stats cards en modo oscuro */
body.dark-theme .stats-card {
  background: linear-gradient(135deg, #2d2d2d, #363636);
}

/* Alertas en modo oscuro */
body.dark-theme .alert {
  background-color: #2d2d2d;
  border-color: #404040;
}

/* Lista de actividad reciente en modo oscuro */
body.dark-theme .list-group-item {
  background-color: #2d2d2d;
  border-color: #404040;
  color: #ffffff;
}

/* Placeholder text en modo oscuro */
body.dark-theme ::placeholder {
  color: #888888 !important;
}

/* Scrolelbar en modo oscuro */
body.dark-theme ::-webkit-scrolelbar {
  width: 10px;
}

body.dark-theme ::-webkit-scrolelbar-track {
  background: #2d2d2d;
}

body.dark-theme ::-webkit-scrolelbar-thumb {
  background: #404040;
  border-radius: 5px;
}

body.dark-theme ::-webkit-scrolelbar-thumb:hover {
  background: #4d4d4d;
}

  </style>
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
      <div class="sidebar-header">
        <h3>TechAdmin</h3>
      </div>
      
      <ul class="sidebar-menu">
        <li>
          <a href="javascript:void(0)" class="sidebar-item active" data-section="dashboard">
            <i class="fas fa-tachometer-alt"></i>
            <span class="sidebar-item-text">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="sidebar-item" data-section="products">
            <i class="fas fa-laptop"></i>
            <span class="sidebar-item-text">Productos</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="sidebar-item" data-section="orders">
            <i class="fas fa-shopping-cart"></i>
            <span class="sidebar-item-text">Pedidos</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="sidebar-item" data-section="users">
            <i class="fas fa-users"></i>
            <span class="sidebar-item-text">users</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="sidebar-item" data-section="reports">
            <i class="fas fa-chart-bar"></i>
            <span class="sidebar-item-text">Informes</span>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)" class="sidebar-item" data-section="settings">
            <i class="fas fa-cog"></i>
            <span class="sidebar-item-text">Configuración</span>
          </a>
        </li>
      </ul>
    </nav>
    
    <!-- Page Content -->
    <div id="content" class="content">
      <div class="header">
        <div class="toggle-sidebar" id="sidebarCollapse">
          <i class="fas fa-bars"></i>
        </div>
        
        <div class="user-info dropdown">
  <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="user-name me-2">Admin</span>
    <img src="https://cdn.pixabay.com/photo/2016/08/08/09/17/avatar-1577909_1280.png" alt="Usuario" class="rounded-circle">
  </a>
  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
    <li>
      <a class="dropdown-item" href="#" id="toggleTheme">
        <i class="fas fa-moon me-2"></i>
        Modo oscuro
      </a>
    </li>
    <li>
      <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#languageModal">
        <i class="fas fa-globe me-2"></i>
        Idioma
      </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
      <a class="dropdown-item" href="#"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt me-2"></i>
        Cerrar sesión
      </a>
    </li>
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>
      </div>
      
      <div class="main-content">
        <!-- Dashboard Section -->
        <div id="dashboard-section" class="section-content active">
          <h2 class="section-title">Dashboard</h2>
          
          <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="card stats-card">
                <div class="card-body">
                  <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="stat-value"></div>
                  <div class="stat-label">Ventas este mes</div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="card stats-card">
                <div class="card-body">
                  <div class="stat-icon">
                    <i class="fas fa-shopping-bag"></i>
                  </div>
                  <div class="stat-value pedidos"></div>
                  <div class="stat-label">Nuevas ventas</div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="card stats-card">
                <div class="card-body">
                  <div class="stat-icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="stat-value users"></div>
                  <div class="stat-label">Nuevos usuarios</div>
                </div>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
              <div class="card stats-card">
                <div class="card-body">
                  <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="stat-value stock_restante"></div>
                  <div class="stat-label">Stock bajo</div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-8 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Ventas mensuales</h5>
                </div>
                <div class="card-body">
                  <div id="sales-chart" class="chart-container"></div>
                </div>
              </div>
            </div>
            
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Categorías más vendidas</h5>
                </div>
                <div class="card-body">
                  <div id="category-chart" class="chart-container"></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Últimos pedidos</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="recent-orders-table" class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Los datos se cargarán dinámicamente -->
        </tbody>
      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Products Section -->
         <!-- Product Modal -->

         <!-- Agregar antes del cierre del body -->
<div class="modal fade" id="languageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Seleccionar idioma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="list-group">
          <button type="button" class="list-group-item list-group-item-action active" data-lang="es">
            <img src="https://flagcdn.com/28x21/es.png" alt="Español" class="me-2">
            Español
          </button>
          <button type="button" class="list-group-item list-group-item-action" data-lang="en">
            <img src="https://flagcdn.com/28x21/gb.png" alt="English" class="me-2">
            English
          </button>
          <button type="button" class="list-group-item list-group-item-action" data-lang="fr">
            <img src="https://flagcdn.com/28x21/fr.png" alt="Français" class="me-2">
            Français
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Añadir Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="modal-form">
          <input type="hidden" id="productId">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="productName" class="form-label">Nombre del producto</label>
              <input type="text" class="form-controle" id="productName" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="productSKU" class="form-label">TIPO</label>
              <input type="text" class="form-controle" id="productSKU" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="productPrice" class="form-label">Precio</label>
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-controle" id="productPrice" required step="0.01">
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="productStock" class="form-label">Stock</label>
              <input type="number" class="form-controle" id="productStock" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="productCategory" class="form-label">Categoría</label>
              <select class="form-select" id="productCategory" required>
                <option value="">Seleccionar categoría</option>
                <option>Ratones</option>
                <option>Teclados</option>
                <option>Altavoces</option>
                <option>Cascos</option>
              </select>
            </div>
          </div>
          <div class="mb-3">
            <label for="productDescription" class="form-label">Descripción</label>
            <textarea class="form-controle" id="productDescription" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label class="form-label">Imagen actual</label>
            <img id="currentProductImage" src="" alt="Imagen del producto" style="max-width: 200px; display: none;" class="mb-2 d-block">
            <label for="productImage" class="form-label">Nueva imagen</label>
            <input type="file" class="form-controle" id="productImage" accept="image/*">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
        <div id="products-section" class="section-content">
          <h2 class="section-title">Gestión de Productos</h2>
          
          <div class="card">
            <div class="card-body">
              <div class="table-top-bar">
                <div class="search-bar">
                  <input type="text" class="form-controle" placeholder="Buscar productos...">
                </div>
                <button type="button" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#productModal">
                  <i class="fas fa-plus"></i> Añadir Producto
                </button>
              </div>
              
              <div class="table-responsive">
                <table id="products-table" class="table table-striped">
                  <thead>
                    <tr>
                      <th>Imagen</th>
                      <th>Nombre</th>
                      <th>Categoría</th>
                      <th>Precio</th>
                      <th>Stock</th>
                      <th>TIPO</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><img src="https://cdn.pixabay.com/photo/2013/07/12/18/39/smartphone-153650_960_720.png" alt="Producto" width="50"></td>
                      <td>Smartphone XYZ Pro</td>
                      <td>SP-XYZ-001</td>
                      <td>$899.99</td>
                      <td><span class="badge-stock in-stock">En stock (45)</span></td>
                      <td>Smartphones</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#productModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="https://cdn.pixabay.com/photo/2013/07/13/12/43/laptop-160045_960_720.png" alt="Producto" width="50"></td>
                      <td>Laptop UltraBook 15"</td>
                      <td>LT-UB-015</td>
                      <td>$1,299.99</td>
                      <td><span class="badge-stock in-stock">En stock (12)</span></td>
                      <td>Laptops</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#productModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="https://cdn.pixabay.com/photo/2012/04/13/20/24/computer-33521_960_720.png" alt="Producto" width="50"></td>
                      <td>Monitor Gaming 27" 4K</td>
                      <td>MN-GM-427</td>
                      <td>$549.99</td>
                      <td><span class="badge-stock low-stock">Stock bajo (3)</span></td>
                      <td>Monitores</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#productModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="https://cdn.pixabay.com/photo/2014/04/03/10/55/printer-311204_960_720.png" alt="Producto" width="50"></td>
                      <td>Impresora Láser Color</td>
                      <td>PR-LC-002</td>
                      <td>$349.99</td>
                      <td><span class="badge-stock in-stock">En stock (28)</span></td>
                      <td>Impresoras</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#productModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td><img src="https://cdn.pixabay.com/photo/2017/05/15/23/47/headphones-2316179_960_720.png" alt="Producto" width="50"></td>
                      <td>Auriculares Bluetooth</td>
                      <td>AU-BT-001</td>
                      <td>$129.99</td>
                      <td><span class="badge-stock out-of-stock">Sin stock</span></td>
                      <td>Audio</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#productModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <nav aria-label="Page navigation">
              </nav>
            </div>
          </div>
        </div>
        
        <!-- Orders Section -->
        <div id="orders-section" class="section-content">
          <h2 class="section-title">Gestión de Pedidos</h2>
          
          <div class="card">
            <div class="card-body">
              <div class="table-top-bar">
                <div class="search-bar">
                  <input type="text" class="form-controle" placeholder="Buscar pedidos...">
                </div>
                <div class="d-flex">
                  <select class="form-select me-2">
                    <option selected>Todos los estados</option>
                    <option>Pagado</option>
                    <option>Procesando</option>
                    <option>En envío</option>
                    <option>Entregado</option>
                    <option>Cancelado</option>
                  </select>
                  <button type="button" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#orderModal">
                    <i class="fas fa-plus"></i> Nuevo Pedido
                  </button>
                </div>
              </div>
              
              <div class="table-responsive">
                <table id="orders-table" class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID Pedido</th>
                      <th>Cliente</th>
                      <th>Fecha</th>
                      <th>Total</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>#ORD-2025-1001</td>
                      <td>Juan Pérez</td>
                      <td>15/04/2025</td>
                      <td>$599.99</td>
                      <td><span class="badge bg-success">Entregado</span></td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderDetailModal"><i class="fas fa-eye"></i></button>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-2025-1002</td>
                      <td>María López</td>
                      <td>16/04/2025</td>
                      <td>$1,299.99</td>
                      <td><span class="badge bg-warning text-dark">En envío</span></td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderDetailModal"><i class="fas fa-eye"></i></button>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-2025-1003</td>
                      <td>Carlos Rodríguez</td>
                      <td>16/04/2025</td>
                      <td>$899.50</td>
                      <td><span class="badge bg-primary">Procesando</span></td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderDetailModal"><i class="fas fa-eye"></i></button>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-2025-1004</td>
                      <td>Ana Martínez</td>
                      <td>17/04/2025</td>
                      <td>$2,499.00</td>
                      <td><span class="badge bg-info">Pagado</span></td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderDetailModal"><i class="fas fa-eye"></i></button>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>#ORD-2025-1005</td>
                      <td>Roberto García</td>
                      <td>17/04/2025</td>
                      <td>$349.99</td>
                      <td><span class="badge bg-danger">Cancelado</span></td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderDetailModal"><i class="fas fa-eye"></i></button>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
        </div>
        
        <!-- Users Section -->
        <div id="users-section" class="section-content">
          <h2 class="section-title">Gestión de users</h2>
          
          <div class="card">
            <div class="card-body">
              <div class="table-top-bar">
                <div class="search-bar">
                  <input type="text" class="form-controle" placeholder="Buscar users...">
                </div>
                <button type="button" class="btn add-btn" data-bs-toggle="modal" data-bs-target="#userModal">
                  <i class="fas fa-plus"></i> Añadir Usuario
                </button>
              </div>
              
              <div class="table-responsive">
                <table id="users-table" class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>role</th>
                      <th>Estado</th>
                      <th>Última conexión</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Juan Pérez</td>
                      <td>juan.perez@ejemplo.com</td>
                      <td>Cliente</td>
                      <td><span class="badge bg-success">Activo</span></td>
                      <td>Hoy, 10:45</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>María López</td>
                      <td>maria.lopez@ejemplo.com</td>
                      <td>Administrador</td>
                      <td><span class="badge bg-success">Activo</span></td>
                      <td>Hoy, 09:30</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Carlos Rodríguez</td>
                      <td>carlos.rodriguez@ejemplo.com</td>
                      <td>Cliente</td>
                      <td><span class="badge bg-success">Activo</span></td>
                      <td>Ayer, 18:20</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Ana Martínez</td>
                      <td>ana.martinez@ejemplo.com</td>
                      <td>Inventario</td>
                      <td><span class="badge bg-success">Activo</span></td>
                      <td>Ayer, 14:30</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Roberto García</td>
                      <td>roberto.garcia@ejemplo.com</td>
                      <td>Cliente</td>
                      <td><span class="badge bg-danger">Inactivo</span></td>
                      <td>15/04/2025</td>
                      <td>
                        <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-edit"></i></button>
                        <button class="btn action-btn delete-btn"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Reports Section -->
        <div id="reports-section" class="section-content">
          <h2 class="section-title">Informes</h2>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Ventas por Categoría</h5>
                </div>
                <div class="card-body">
                  <div id="category-sales-chart" class="chart-container"></div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Tendencias de Ventas</h5>
                </div>
                <div class="card-body">
                  <div id="sales-trend-chart" class="chart-container"></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Top Productos Más Vendidos</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="top-products-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Unidades Vendidas</th>
                        <th>Ingresos</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los datos se cargarán dinámicamente -->
                </tbody>
            </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Alertas de Stock</h5>
                </div>
                <div class="card-body">
                  <div class="alert alert-warning" rolee="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Monitor Gaming 27" 4K</strong> - Stock bajo (3 unidades)
                  </div>
                  <div class="alert alert-warning" rolee="alert">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>Disco SSD 1TB</strong> - Stock bajo (5 unidades)
                  </div>
                  <div class="alert alert-danger" rolee="alert">
                    <i class="fas fa-times-circle me-2"></i>
                    <strong>Auriculares Bluetooth</strong> - Sin stock
                  </div>
                  <div class="alert alert-danger" rolee="alert">
                    <i class="fas fa-times-circle me-2"></i>
                    <strong>Tarjeta Gráfica RTX 4080</strong> - Sin stock
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-8 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Actividad Reciente</h5>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Nuevo pedido #ORD-2025-1005</div>
                        Pedido realizado por Roberto García
                      </div>
                      <span class="text-muted small">hace 2 horas</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Actualización de producto</div>
                        El precio de "Laptop UltraBook 15" ha sido actualizado
                      </div>
                      <span class="text-muted small">hace 4 horas</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Nuevo usuario registrado</div>
                        Ana Martínez se ha registrado en la plataforma
                      </div>
                      <span class="text-muted small">hace 5 horas</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Pedido completado #ORD-2025-0998</div>
                        El pedido ha sido marcado como entregado
                      </div>
                      <span class="text-muted small">hace 6 horas</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="ms-2 me-auto">
                        <div class="fw-bold">Alerta de stock</div>
                        "Auriculares Bluetooth" está sin stock
                      </div>
                      <span class="text-muted small">hace 8 horas</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Settings Section -->
        <div id="settings-section" class="section-content">
          <h2 class="section-title">Configuración</h2>
          
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Notificaciones</h5>
                </div>
                <div class="card-body">
                  <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                      <h6 class="mb-1">Notificaciones por email</h6>
                      <p class="text-muted mb-0 small">Recibir alertas por email para nuevos pedidos</p>
                    </div>
                    <label class="settings-switch">
                      <input type="checkbox" checked>
                      <span class="settings-slider"></span>
                    </label>
                  </div>
                  <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                      <h6 class="mb-1">Alertas de stock bajo</h6>
                      <p class="text-muted mb-0 small">Recibir notificaciones cuando el stock sea bajo</p>
                    </div>
                    <label class="settings-switch">
                      <input type="checkbox" checked>
                      <span class="settings-slider"></span>
                    </label>
                  </div>
                  <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                      <h6 class="mb-1">Informes semanales</h6>
                      <p class="text-muted mb-0 small">Recibir un resumen semanal de ventas</p>
                    </div>
                    <label class="settings-switch">
                      <input type="checkbox">
                      <span class="settings-slider"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-md-6 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Preferencias</h5>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label class="form-label">Idioma</label>
                    <select class="form-select">
                      <option selected>Español</option>
                      <option>English</option>
                      <option>Français</option>
                      <option>Deutsch</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Zona horaria</label>
                    <select class="form-select">
                      <option selected>(GMT+01:00) Madrid</option>
                      <option>(GMT+00:00) Londres</option>
                      <option>(GMT-05:00) Nueva York</option>
                      <option>(GMT-08:00) Los Ángeles</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Formato de fecha</label>
                    <select class="form-select">
                      <option selected>DD/MM/YYYY</option>
                      <option>MM/DD/YYYY</option>
                      <option>YYYY-MM-DD</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 mb-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-0">Seguridad</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="currentPassword" class="form-label">Contraseña actual</label>
                      <input type="password" class="form-controle" id="currentPassword">
                    </div>
                    <div class="mb-3">
                      <label for="newPassword" class="form-label">Nueva contraseña</label>
                      <input type="password" class="form-controle" id="newPassword">
                    </div>
                    <div class="mb-3">
                      <label for="confirmPassword" class="form-label">Confirmar nueva contraseña</label>
                      <input type="password" class="form-controle" id="confirmPassword">
                    </div>
                    <button type="button" class="btn btn-primary">Cambiar contraseña</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Overlay for sidebar on mobile -->
  <div class="overlay"></div>

  <!-- Product Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Añadir Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="modal-form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productName" class="form-label">Nombre del producto</label>
                <input type="text" class="form-controle" id="productName">
              </div>
              <div class="col-md-6 mb-3">
                <label for="productSKU" class="form-label">TIPO</label>
                <input type="text" class="form-controle" id="productSKU">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="productPrice" class="form-label">Precio</label>
                <div class="input-group">
                  <span class="input-group-text">$</span>
                  <input type="number" class="form-controle" id="productPrice">
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="productStock" class="form-label">Stock</label>
                <input type="number" class="form-controle" id="productStock">
              </div>
              <div class="col-md-4 mb-3">
                <label for="productCategory" class="form-label">Categoría</label>
                <select class="form-select" id="productCategory">
                  <option selected>Seleccionar categoría</option>
                  <option>Smartphones</option>
                  <option>Laptops</option>
                  <option>Monitores</option>
                  <option>Periféricos</option>
                  <option>Componentes PC</option>
                  <option>Audio</option>
                  <option>Impresoras</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Descripción</label>
              <textarea class="form-controle" id="productDescription" rows="4"></textarea>
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">Imagen del producto</label>
              <input type="file" class="form-controle" id="productImage">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Order Modal -->
  <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModalLabel">Gestionar Pedido</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="modal-form">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="orderId" class="form-label">ID Pedido</label>
                <input type="text" class="form-controle" id="orderId" value="#ORD-2025-1001" readonly>
              </div>
              <div class="col-md-6 mb-3">
                <label for="orderDate" class="form-label">Fecha</label>
                <input type="date" class="form-controle" id="orderDate" value="2025-04-15">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="customerName" class="form-label">Cliente</label>
                <select class="form-select" id="customerName">
                  <option selected>Juan Pérez</option>
                  <option>María López</option>
                  <option>Carlos Rodríguez</option>
                  <option>Ana Martínez</option>
                  <option>Roberto García</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="orderStatus" class="form-label">Estado</label>
                <select class="form-select" id="orderStatus">
                  <option>Pagado</option>
                  <option>Procesando</option>
                  <option>En envío</option>
                  <option selected>Entregado</option>
                  <option>Cancelado</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Productos</label>
              <div class="table-responsive">
                <table class="table table-sm table-bordered">
                  <thead>
                    <tr>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <select class="form-select form-select-sm">
                          <option selected>Smartphone XYZ Pro</option>
                          <option>Laptop UltraBook 15"</option>
                          <option>Monitor Gaming 27" 4K</option>
                          <option>Impresora Láser Color</option>
                          <option>Auriculares Bluetooth</option>
                        </select>
                      </td>
                      <td>$599.99</td>
                      <td><input type="number" class="form-controle form-controle-sm" value="1"></td>
                      <td>$599.99</td>
                      <td><button type="button" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="5">
                        <button type="button" class="btn btn-sm btn-success">
                          <i class="fas fa-plus"></i> Añadir producto
                        </button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="shippingAddress" class="form-label">Dirección de envío</label>
                <textarea class="form-controle" id="shippingAddress" rows="3">Calle Ejemplo 123, Ciudad, 28001</textarea>
              </div>
              <div class="col-md-6 mb-3">
                <label for="orderNotes" class="form-label">Notas</label>
                <textarea class="form-controle" id="orderNotes" rows="3"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="shippingAddress" class="form-label">Dirección</label>
                <input type="text" class="form-controle" id="shippingAddress" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="shippingCity" class="form-label">Ciudad</label>
                <input type="text" class="form-controle" id="shippingCity" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="shippingCountry" class="form-label">País</label>
                <input type="text" class="form-controle" id="shippingCountry" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="shippingZip" class="form-label">Código Postal</label>
                <input type="text" class="form-controle" id="shippingZip" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="paymentMethod" class="form-label">Método de Pago</label>
                <select class="form-select" id="paymentMethod" required>
                  <option value="">Seleccionar método de pago</option>
                  <option value="Tarjeta">Tarjeta de Crédito</option>
                  <option value="PayPal">PayPal</option>
                  <option value="Transferencia">Transferencia Bancaria</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Order Detail Modal -->
  <div class="modal fade" id="orderDetailModal" tabindex="-1" aria-labelledby="orderDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orderDetailModalLabel">Detalles del Pedido <span id="orderDetailId"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row mb-4">
          <div class="col-md-6">
            <h6>Información del Cliente</h6>
            <p><strong>Nombre:</strong> <span id="orderDetailCustomer"></span></p>
            <p><strong>Email:</strong> <span id="orderDetailEmail"></span></p>
            <p><strong>Teléfono:</strong> <span id="orderDetailPhone"></span></p>
          </div>
          <div class="col-md-6">
            <h6>Información del Pedido</h6>
            <p><strong>Fecha:</strong> <span id="orderDetailDate"></span></p>
            <p><strong>Estado:</strong> <span id="orderDetailStatus"></span></p>
            <p><strong>Método de pago:</strong> <span id="orderDetailPayment"></span></p>
          </div>
        </div>
        <h6>Productos</h6>
        <div class="table-responsive mb-4">
          <table class="table table-sm table-bordered">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="orderDetailProducts">
              <!-- Aquí se insertan los productos -->
            </tbody>
            <tfoot>
              <tr>
                <td colspan="3" class="text-end"><strong>Subtotal:</strong></td>
                <td id="orderDetailSubtotal"></td>
              </tr>
              <tr>
                <td colspan="3" class="text-end"><strong>Envío:</strong></td>
                <td id="orderDetailShipping"></td>
              </tr>
              <tr>
                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                <td id="orderDetailTotal"></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h6>Dirección de Envío</h6>
            <p id="orderDetailAddress"></p>
          </div>
          <div class="col-md-6">
            <h6>Historial del Pedido</h6>
            <ul class="list-group" id="orderDetailHistory">
              <!-- Aquí se insertan los eventos del historial -->
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#orderModal">Editar</button>
      </div>
    </div>
  </div>
</div>

  <!-- User Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userModalLabel">Gestionar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="modal-form">
            <input type="hidden" id="userId">  <!-- Añadir este campo oculto -->
            <div class="mb-3">
              <label for="userName" class="form-label">Nombre completo</label>
              <input type="text" class="form-controle" id="userName">
            </div>
            <div class="mb-3">
              <label for="userEmail" class="form-label">Email</label>
              <input type="email" class="form-controle" id="userEmail">
            </div>
            <div class="mb-3">
              <label for="userrolee" class="form-label">role</label>
              <select class="form-select" id="userrolee">
                <option>admin</option>
                <option>Inventario</option>
                <option selected>Cliente</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="userStatus" class="form-label">Estado</label>
              <select class="form-select" id="userStatus">
                <option selected>Activo</option>
                <option>Inactivo</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="userPassword" class="form-label">Contraseña</label>
              <input type="password" class="form-controle" id="userPassword">
              <div class="form-text">Dejar en blanco para mantener la contraseña actual.</div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.41.0/dist/apexcharts.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script id="app-script">
    $(document).ready(function() {
      // Toggle sidebar
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('collapsed');
        $('#content').toggleClass('expanded');
        $('.overlay').toggleClass('active');
        
        // Store sidebar state in localStorage
        const sidebarState = $('#sidebar').hasClass('collapsed') ? 'collapsed' : 'expanded';
        localStorage.setItem('sidebarState', sidebarState);
      });
      
      // Close sidebar when overlay is clicked (mobile)
      $('.overlay').on('click', function() {
        $('#sidebar').removeClass('expanded');
        $('.overlay').removeClass('active');
      });
      
      // Navigation between sections
      $('.sidebar-item').on('click', function() {
        const targetSection = $(this).data('section');
        
        // Update active class on sidebar items
        $('.sidebar-item').removeClass('active');
        $(this).addClass('active');
        
        // Show the selected section
        $('.section-content').removeClass('active');
        $(`#${targetSection}-section`).addClass('active');
        
        // Close sidebar on mobile after navigation
        if ($(window).width() < 576) {
          $('#sidebar').removeClass('expanded');
          $('.overlay').removeClass('active');
        }
        
        // Store current section in localStorage
        localStorage.setItem('currentSection', targetSection);
      });
      
      // Load saved sidebar state from localStorage
      const savedSidebarState = localStorage.getItem('sidebarState');
      if (savedSidebarState === 'collapsed') {
        $('#sidebar').addClass('collapsed');
        $('#content').addClass('expanded');
      }
      
      // Load saved section from localStorage
      const savedSection = localStorage.getItem('currentSection');
      if (savedSection) {
        $(`.sidebar-item[data-section="${savedSection}"]`).click();
      }
      
      // Initialize DataTables
      const initDataTables = () => {
        if ($.fn.DataTable.isDataTable('#products-table')) {
          $('#products-table').DataTable().destroy();
        }
        
        if ($.fn.DataTable.isDataTable('#orders-table')) {
          $('#orders-table').DataTable().destroy();
        }
        
        if ($.fn.DataTable.isDataTable('#users-table')) {
          $('#users-table').DataTable().destroy();
        }
        
        $('#products-table').DataTable({
          columnDefs: [
            { defaultContent: "-" , targets: "_all" }
          ],  
          lengthMenu: [5, 10, 25, 50],
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
          }
        });
        
        $('#orders-table').DataTable({
          columnDefs: [
            { defaultContent: "-" , targets: "_all" }
          ],
          pageLength: 5,
          lengthMenu: [5, 10, 25, 50],
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
          }
        });
        
        $('#users-table').DataTable({
          columnDefs: [
            { defaultContent: "-" , targets: "_all" }
          ],
          pageLength: 5,
          lengthMenu: [5, 10, 25, 50],
          language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
          }
        });
      };
      
      // Initialize DataTables after delay to ensure DOM is ready
      setTimeout(initDataTables, 500);
      
      // Reinitialize DataTables when switching tabs
      $('.sidebar-item').on('click', function() {
        setTimeout(initDataTables, 100);
      });
      
      
      // Handle form submissions (prevent default for now)
      $('form').on('submit', function(e) {
        e.preventDefault();
      });
      

    });

function deleteUser(userId) {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  fetch(`${API_BASE_URL}/users/${userId}`, {
    method: 'DELETE'
  })
    .then(response => {
      if (!response.ok) throw new Error('Error al eliminar usuario');
      return response.json();
    })
    .then(() => {
      loadUsersFromAPI();
      alert('Usuario eliminado correctamente');
    })
    .catch(error => {
      console.error('Error al eliminar usuario:', error);
      alert('Error al eliminar usuario');
    });
}



    // Función para cargar datos de la API y actualizar los gráficos
function loadChartDataFromAPI() {
  // URLs de la API (ajusta las URLs según el dominio y puerto donde se ejecute tu API)
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  const MONTHLY_SALES_URL = `${API_BASE_URL}/ventas/mensual`;
  const MONTHLY_SALES_LAST_MONTH_URL = `${API_BASE_URL}/sales/monthly`;
  const CATEGORY_SALES_URL = `${API_BASE_URL}/ventas/categorias`;
  const SALES_TREND_URL = `${API_BASE_URL}/ventas/tendencia`;
  const CATEGORY_DETAIL_URL = `${API_BASE_URL}/ventas/categoria/detalle`;


  // 1. Cargar datos para el gráfico de ventas mensuales
  fetch(MONTHLY_SALES_URL)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al obtener datos de ventas mensuales');
      }
      return response.json();
    })
    .then(data => {
      // Transformar datos para el formato que espera ApexCharts
      const months = data.map(item => item.month);
      const amounts = data.map(item => item.amount);

      // Actualizar el gráfico de ventas
      if (window.salesChart) {
        window.salesChart.updateOptions({
          xaxis: {
            categories: months
          },
          series: [{
            name: 'Ventas',
            data: amounts
          }]
        });
      } else if (document.getElementById('sales-chart')) {
        // Si el gráfico no existe, crearlo con los nuevos datos
        const salesChartOptions = {
          series: [{
            name: 'Ventas',
            data: amounts
          }],
          chart: {
            height: 350,
            type: 'line',
            toolbar: {
              show: false
            }
          },
          colors: ['#4361ee'],
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth',
            width: 3
          },
          grid: {
            borderColor: '#e0e0e0',
            row: {
              colors: ['#f3f3f3', 'transparent'],
              opacity: 0.5
            }
          },
          xaxis: {
            categories: months,
            labels: {
              style: {
                colors: '#3f4254',
                fontSize: '12px'
              }
            }
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              },
              style: {
                colors: '#3f4254',
                fontSize: '12px'
              }
            }
          },
          tooltip: {
            y: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              }
            }
          }
        };
        
        window.salesChart = new ApexCharts(document.getElementById('sales-chart'), salesChartOptions);
        window.salesChart.render();
      }
    })
    .catch(error => {
      console.error('Error en datos de ventas mensuales:', error);
      // Opcionalmente mostrar un mensaje de error en la interfaz
    });

    function updateMonthlySalesCard() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  fetch(`${API_BASE_URL}/ventas/mensuales_ultimo_mes`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener ventas del mes');
      return response.json();
    })
    .then(data => {
      // data es un array, tomamos el primer elemento
      if (data.length > 0) {
        const total = data[0].amount;
        $('.stat-value').first().text(`$${total.toLocaleString()}`);
      } else {
        $('.stat-value').first().text('$0');
      }
    })
    .catch(error => {
      console.error('Error al cargar ventas del mes:', error);
      $('.stat-value').first().text('Error');
    });
}

function updateSalesAmountCard() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
    fetch(`${API_BASE_URL}/ventas/total_ultimo_mes`)
      .then(response => {
      if (!response.ok) throw new Error('Error al obtener ventas del mes');
      return response.json();
    })
    .then(data => {
      // data es un array, tomamos el primer elemento
      if (data.length > 0) {
        const total = data[0].amount;
        $('.pedidos').first().text(`${total.toLocaleString()}`);
      } else {
        $('.pedidos').first().text('$0');
      }
    })
    .catch(error => {
      console.error('Error al cargar ventas del mes:', error);
      $('.pedidos').first().text('Error');
    });
}

function updateUsersCard() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  fetch(`${API_BASE_URL}/users/users_ultimo_mes`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener users');
      return response.json();
    })
    .then(data => {
      // data es un array, tomamos el primer elemento
      if (data.length > 0) {
        const count = data[0].total_users;
        $('.users').first().text(`${count.toLocaleString()}`);
      } else {
        $('.users').first().text('0');
      }
    })
    .catch(error => {
      console.error('Error al cargar users:', error);
      $('.users').first().text('Error');
    });
}

function updateStock() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  fetch(`${API_BASE_URL}/productos/poco_stock`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener productos con stock bajo');
      return response.json();
    })
    .then(data => {
      if (data.length > 0) {
        // Corregido: Ahora usamos la propiedad 'stock' en lugar de 'low_stock_count'
        const count = data[0].stock;
        $('.stock_restante').first().text(`${count.toLocaleString()}`);
      } else {
        $('.stock_restante').first().text('0');
      }
    })
    .catch(error => {
      console.error('Error al cargar productos con stock bajo:', error);
      $('.stock_restante').first().text('Error');
    });
}


$(document).ready(function() {
  updateMonthlySalesCard();
  updateSalesAmountCard();
  updateStock();
  updateUsersCard();
  // ...ya tienes loadChartDataFromAPI() y loadTablesFromAPI() aquí...
  setInterval(updateMonthlySalesCard, 300000); // Opcional: actualiza cada 5 minutos
  $('#refresh-data').on('click', function() {
    updateMonthlySalesCard();
    updateSalesAmountCard();
    updateStock();
    updateUsersCard();
  });
});

  // 2. Cargar datos para el gráfico de categorías (donut)
  fetch(CATEGORY_SALES_URL)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al obtener datos de ventas por categoría');
      }
      return response.json();
    })
    .then(data => {
      // Transformar datos para el formato que espera ApexCharts
      const categories = data.map(item => item.category);
      const amounts = data.map(item => item.amount);

      // Actualizar el gráfico de categorías
      if (window.categoryChart) {
        window.categoryChart.updateOptions({
          labels: categories,
          series: amounts
        });
      } else if (document.getElementById('category-chart')) {
        // Si el gráfico no existe, crearlo con los nuevos datos
        const categoryChartOptions = {
          series: amounts,
          chart: {
            type: 'donut',
            height: 350
          },
          labels: categories,
          colors: ['#4361ee', '#4cc9f0', '#3f37c9', '#f72585', '#7209b7', '#3a0ca3'],
          responsive: [{
            breakpoint: 480,
            options: {
              chart: {
                width: 200
              },
              legend: {
                position: 'bottom'
              }
            }
          }],
          dataLabels: {
            enabled: false
          }
        };
        
        window.categoryChart = new ApexCharts(document.getElementById('category-chart'), categoryChartOptions);
        window.categoryChart.render();
      }
    })
    .catch(error => {
      console.error('Error en datos de ventas por categoría:', error);
    });

  // 3. Cargar datos para el gráfico de tendencia de ventas (comparación por año)
  fetch(SALES_TREND_URL)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al obtener datos de tendencia de ventas');
      }
      return response.json();
    })
    .then(data => {
      // Actualizar el gráfico de tendencia de ventas
      if (window.salesTrendChart) {
        window.salesTrendChart.updateOptions({
          xaxis: {
            categories: data.months
          },
          series: data.series
        });
      } else if (document.getElementById('sales-trend-chart')) {
        // Si el gráfico no existe, crearlo con los nuevos datos
        const salesTrendOptions = {
          series: data.series,
          chart: {
            height: 350,
            type: 'line',
            toolbar: {
              show: false
            }
          },
          colors: ['#3f37c9', '#4361ee'],
          dataLabels: {
            enabled: false
          },
          stroke: {
            width: [3, 3],
            curve: 'smooth'
          },
          grid: {
            borderColor: '#e0e0e0',
          },
          markers: {
            size: 5,
            hover: {
              size: 7
            }
          },
          xaxis: {
            categories: data.months,
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              }
            }
          },
          legend: {
            position: 'top'
          },
          tooltip: {
            y: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              }
            }
          }
        };
        
        window.salesTrendChart = new ApexCharts(document.getElementById('sales-trend-chart'), salesTrendOptions);
        window.salesTrendChart.render();
      }
    })
    .catch(error => {
      console.error('Error en datos de tendencia de ventas:', error);
    });

  // 4. Cargar datos para el gráfico de barras de ventas por categoría
  fetch(CATEGORY_DETAIL_URL)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al obtener datos detallados de ventas por categoría');
      }
      return response.json();
    })
    .then(data => {
      // Actualizar el gráfico de barras de categorías
      if (window.categorySalesChart) {
        window.categorySalesChart.updateOptions({
          xaxis: {
            categories: data.categories
          },
          series: data.series
        });
      } else if (document.getElementById('category-sales-chart')) {
        // Si el gráfico no existe, crearlo con los nuevos datos
        const categorySalesOptions = {
          series: data.series,
          chart: {
            type: 'bar',
            height: 350,
            toolbar: {
              show: false
            }
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              borderRadius: 5
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: data.categories,
          },
          yaxis: {
            labels: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              }
            }
          },
          fill: {
            opacity: 1,
            colors: ['#4361ee']
          },
          tooltip: {
            y: {
              formatter: function (value) {
                return '$' + value.toLocaleString();
              }
            }
          }
        };
        
        window.categorySalesChart = new ApexCharts(document.getElementById('category-sales-chart'), categorySalesOptions);
        window.categorySalesChart.render();
      }
    })
    .catch(error => {
      console.error('Error en datos detallados de ventas por categoría:', error);
    });
}

// Función para actualizar las tablas de datos
function loadTablesFromAPI() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/productos`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener productos');
      return response.json();
    })
    .then(products => {
      const productsTable = $('#products-table').DataTable();
      productsTable.clear();
      
      products.forEach(product => {
        const stockClass = product.unidades > 10 ? 'in-stock' : 
                         product.unidades > 0 ? 'low-stock' : 
                         'out-of-stock';
        const stockText = product.unidades > 10 ? `En stock (${product.unidades})` :
                         product.unidades > 0 ? `Stock bajo (${product.unidades})` :
                         'Sin stock';
        
        productsTable.row.add([
          `<img src="${product.foto || 'ruta/imagen/default.png'}" alt="${product.unidades}" width="120" height="80">`,
          product.nombre,
          product.categoria,
          `$${product.precio.toLocaleString()}`,
          `<span class="badge-stock ${stockClass}">${stockText}</span>`,
          product.tipo,
          `<button class="btn action-btn edit-btn" data-id="${product.id_producto}">
             <i class="fas fa-edit"></i>
           </button>
           <button class="btn action-btn delete-btn" data-id="${product.id_producto}">
             <i class="fas fa-trash"></i>
           </button>`
        ]);
      });
      
      productsTable.draw();
    })
    .catch(error => {
      console.error('Error al cargar productos:', error);
    });
}
    
  // Aquí podrías agregar código similar para cargar datos de órdenes y users

function loadUsersFromAPI() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/users`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener datos de users');
      return response.json();
    })
    .then(users => {
      const usersTable = $('#users-table').DataTable({
        destroy: true,
        data: users,
        columns: [
          { data: 'id' },
          { data: 'name' },
          { data: 'email' },
          { data: 'role' },
          { 
  data: 'estado',
  render: function(data, type, row) {
    // Cambiamos la lógica: si está Activo será verde, si no, rojo
    const badgeClass = data === 'Activo' ? 'bg-success' : 'bg-danger';
    return `<span class="badge ${badgeClass}">${data}</span>`;
  }
},
          { data: 'ultima_sesion' },
          {
            data: null,
            render: function(data, type, row) {
              return `
                <button class="btn action-btn edit-btn" data-bs-toggle="modal" data-bs-target="#userModal" data-id="${row.id}">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn action-btn delete-btn" data-id="${row.id}">
                  <i class="fas fa-trash"></i>
                </button>
              `;
            }
          }
        ],
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        }
      });

      // Manejar el click en el botón de editar
      $('#users-table').on('click', '.edit-btn', function() {
        const userId = $(this).data('id');
        editUser(userId);
      });

      // Manejar el click en el botón de eliminar
      $('#users-table').on('click', '.delete-btn', function() {
        const userId = $(this).data('id');
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
          deleteUser(userId);
        }
      });
    })
    .catch(error => {
      console.error('Error al cargar users:', error);
      alert('Error al cargar los users');
    });
}

// Función para cargar datos del usuario en el modal
function editUser(userId) {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/users/${userId}`)
    .then(response => response.json())
    .then(user => {
      // Rellenar el modal con los datos del usuario
      $('#userModal').find('#userId').val(user.id);
      $('#userModal').find('#userStatus').val(user.estado);
      $('#userModal').find('#userEmail').val(user.email);
      $('#userModal').find('#userrolee').val(user.role);
      $('#userModal').find('#userName').val(user.name);
    })
    .catch(error => {
      console.error('Error al cargar datos del usuario:', error);
      alert('Error al cargar datos del usuario');
    });
}

// Función para guardar cambios del usuario
function saveUser() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  const userId = $('#userModal').find('#userId').val();
  const userData = {
    estado: $('#userModal').find('#userStatus').val(),
    email: $('#userModal').find('#userEmail').val(),
    role: $('#userModal').find('#userrolee').val(),
    name: $('#userModal').find('#userName').val(),
    password: $('#userModal').find('#userPassword').val()
  };

  fetch(`${API_BASE_URL}/users/${userId}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(userData)
  })
    .then(response => response.json())
    .then(() => {
      $('#userModal').modal('hide');
      loadUsersFromAPI();
      alert('Usuario actualizado correctamente');
    })
    .catch(error => {
      console.error('Error al actualizar usuario:', error);
      alert('Error al actualizar usuario');
    });
}

function loadTopProducts() {
    const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
    
    console.log('Cargando productos más vendidos...');
    
    fetch(`${API_BASE_URL}/productos/mas_vendidos`)
        .then(response => {
            if (!response.ok) {
                console.error('Error en la respuesta:', response.status);
                throw new Error('Error al obtener productos más vendidos');
            }
            return response.json();
        })
        .then(products => {
            console.log('Productos recibidos:', products);
            
            const tbody = $('#top-products-table tbody');
            tbody.empty();
            
            if (products && products.length > 0) {
                products.forEach(product => {
                    tbody.append(`
                        <tr>
                            <td>${product.nombre || 'N/A'}</td>
                            <td>${product.categoria || 'N/A'}</td>
                            <td>$${(product.precio || 0).toLocaleString('es-ES', {minimumFractionDigits: 2})}</td>
                            <td>${(product.unidades_vendidas || 0).toLocaleString('es-ES')}</td>
                            <td>$${(product.ingresos_totales || 0).toLocaleString('es-ES', {minimumFractionDigits: 2})}</td>
                        </tr>
                    `);
                });
            } else {
                tbody.append(`
                    <tr>
                        <td colspan="5" class="text-center">No hay datos disponibles</td>
                    </tr>
                `);
            }
        })
        .catch(error => {
            console.error('Error completo:', error);
            const tbody = $('#top-products-table tbody');
            tbody.empty().append(`
                <tr>
                    <td colspan="5" class="text-center text-danger">
                        Error al cargar los datos: ${error.message}
                    </td>
                </tr>
            `);
        });
}

// Asegúrate de que la tabla exista en el HTML y tenga la estructura correcta
$(document).ready(function() {
    // Verificar si la tabla existe
    if ($('#top-products-table').length === 0) {
        console.error('La tabla #top-products-table no existe en el HTML');
        return;
    }
    
    // Cargar datos iniciales
    loadTopProducts();
    
    // Actualizar cada 5 minutos
    setInterval(loadTopProducts, 300000);
});

function loadRecentOrders() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/pedidos/recientes`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener pedidos recientes');
      return response.json();
    })
    .then(orders => {
      const recentOrdersTable = $('#recent-orders-table').DataTable({
        destroy: true,
        data: orders,
        columns: [
          { 
            data: 'id',
            render: function(data) {
              return `#${data}`;
            }
          },
          { data: 'cliente_nombre' },
          { 
            data: 'fecha',
            render: function(data) {
              return new Date(data).toLocaleDateString('es-ES');
            }
          },
          { 
            data: 'cantidad_total',
            render: function(data) {
              return `$${parseFloat(data).toLocaleString()}`;
            }
          },
          { 
            data: 'estado',
            render: function(data) {
              const badgeClass = getStatusBadgeClass(data);
              return `<span class="badge ${badgeClass}">${data}</span>`;
            }
          },
          {
            data: null,
            render: function(data) {
              return `
                <button class="btn btn-sm btn-info view-btn" data-id="${data.id}" title="Ver detalles">
                  <i class="fas fa-eye"></i>
                </button>
              `;
            }
          }
        ],
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        pageLength: 5,
        order: [[0, 'desc']],
        dom: 'rt<"bottom"p>',
        responsive: true
      });

      // Manejar eventos de los botones
      $('#recent-orders-table').on('click', '.view-btn', function() {
        const orderId = $(this).data('id');
        viewOrderDetails(orderId);
      });

      $('#recent-orders-table').on('click', '.edit-btn', function() {
        const orderId = $(this).data('id');
        editOrder(orderId);
      });
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al cargar los pedidos recientes');
    });
}

function loadOrdersFromAPI() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  console.log('Iniciando carga de pedidos...');
  console.log('URL:', `${API_BASE_URL}/pedidos`);
 
  fetch(`${API_BASE_URL}/pedidos`)
    .then(response => {
      console.log('Respuesta recibida:', response);
      console.log('Status:', response.status);
      console.log('OK:', response.ok);
      
      if (!response.ok) {
        throw new Error(`Error HTTP: ${response.status} - ${response.statusText}`);
      }
      return response.json();
    })
    .then(orders => {
      console.log('Datos de pedidos recibidos:', orders);
      console.log('Número de pedidos:', orders.length);
      console.log('Primer pedido (si existe):', orders[0]);
      
      // Verificar si existe la tabla
      const tableElement = $('#orders-table');
      console.log('Elemento tabla encontrado:', tableElement.length > 0);
      
      if (tableElement.length === 0) {
        console.error('ERROR: No se encontró el elemento #orders-table');
        alert('Error: No se encontró la tabla de pedidos en el HTML');
        return;
      }
      
      // Verificar si DataTable está disponible
      if (typeof $.fn.DataTable === 'undefined') {
        console.error('ERROR: DataTables no está cargado');
        alert('Error: DataTables no está disponible');
        return;
      }
      
      // Destruir tabla existente si existe
      if ($.fn.DataTable.isDataTable('#orders-table')) {
        $('#orders-table').DataTable().destroy();
        console.log('Tabla DataTable anterior destruida');
      }
      
      const ordersTable = $('#orders-table').DataTable({
        destroy: true,
        data: orders,
        columns: [
          { 
            data: 'id',
            title: 'ID'
          },
          { 
            data: 'cliente_nombre',
            title: 'Cliente'
          },
          { 
            data: 'fecha',
            title: 'Fecha'
          },
          { 
            data: 'total',
            title: 'Total',
            render: function(data, type, row) {
              return `$${parseFloat(data).toFixed(2)}`;
            }
          },
          {
            data: 'estado',
            title: 'Estado',
            render: function(data, type, row) {
              const badgeClass = getStatusBadgeClass(data);
              return `<span class="badge ${badgeClass}">${data}</span>`;
            }
          },
          {
            data: null,
            title: 'Acciones',
            orderable: false,
            render: function(data, type, row) {
              return `
                <button class="btn btn-sm btn-info view-btn" data-id="${row.id}" title="Ver detalles">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-warning edit-btn" data-id="${row.id}" title="Editar">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger delete-btn" data-id="${row.id}" title="Eliminar">
                  <i class="fas fa-trash"></i>
                </button>
              `;
            }
          }
        ],
        language: {
          url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        responsive: true,
        pageLength: 10
      });
      
      console.log('DataTable creado exitosamente');
      
      // Event listeners
      $('#orders-table').off('click', '.view-btn .edit-btn .delete-btn'); // Limpiar eventos anteriores
      
      $('#orders-table').on('click', '.view-btn', function(e) {
        e.preventDefault();
        const orderId = $(this).data('id');
        console.log('Ver pedido:', orderId);
        viewOrderDetails(orderId);
      });
      
      $('#orders-table').on('click', '.edit-btn', function(e) {
        e.preventDefault();
        const orderId = $(this).data('id');
        console.log('Editar pedido:', orderId);
        editOrder(orderId);
      });
      
      $('#orders-table').on('click', '.delete-btn', function(e) {
        e.preventDefault();
        const orderId = $(this).data('id');
        console.log('Eliminar pedido:', orderId);
        if (confirm('¿Estás seguro de que deseas eliminar este pedido?')) {
          deleteOrder(orderId);
        }
      });
      
    })
    .catch(error => {
      console.error('Error completo:', error);
      console.error('Mensaje del error:', error.message);
      console.error('Stack trace:', error.stack);
      alert(`Error al cargar los pedidos: ${error.message}`);
    });
}

function viewOrderDetails(orderId) {
  fetch(`https://api-web-hlw7.onrender.com/pedidos/${orderId}`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Error al obtener el pedido: ${response.statusText}`);
      }
      return response.json();
    })
    .then(order => {
      console.log('Pedido cargado:', order);
      fillOrderModal(order, true); // Modo solo lectura
      $('#orderModal').modal('show');
    })
    .catch(error => {
      console.error('Error al ver el pedido:', error);
      alert(`No se pudo cargar el pedido: ${error.message}`);
    });
}

function getStatusBadgeClass(status) {
  const statusClasses = {
    'Entregado': 'bg-success',
    'En envío': 'bg-warning text-dark',
    'Procesando': 'bg-primary',
    'Pagado': 'bg-info',
    'Cancelado': 'bg-danger'
  };
  return statusClasses[status] || 'bg-secondary';
}

// Funciones placeholder
function viewOrderDetails(orderId) {
  fetch(`https://api-web-hlw7.onrender.com/pedidos/${orderId}`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Error al obtener el pedido: ${response.statusText}`);
      }
      return response.json();
    })
    .then(order => {
      console.log('Pedido cargado:', order);
      fillOrderModal(order, true); // Modo solo lectura
      $('#orderModal').modal('show');
    })
    .catch(error => {
      console.error('Error al ver el pedido:', error);
      alert(`No se pudo cargar el pedido: ${error.message}`);
    });
}



function editOrder(orderId) {
  fetch(`https://api-web-hlw7.onrender.com/pedidos/${orderId}`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Error al obtener el pedido: ${response.statusText}`);
      }
      return response.json();
    })
    .then(order => {
      console.log('Pedido para editar:', order);
      fillOrderModal(order, false); // Modo editable
      $('#orderModal').modal('show');
    })
    .catch(error => {
      console.error('Error al editar el pedido:', error);
      alert(`No se pudo cargar el pedido: ${error.message}`);
    });
}

function fillOrderModal(order, readonly = false) {
  $('#orderId').val(order.id);
  $('#orderDate').val(order.fecha);
  $('#customerName').val(order.cliente_nombre);
  $('#orderStatus').val(order.estado);

  // Controlear la edición
  $('#orderDate').prop('disabled', readonly);
  $('#customerName').prop('disabled', readonly);
  $('#orderStatus').prop('disabled', readonly);

  // Limpiar y rellenar tabla de productos
  const tbody = $('#orderModal table tbody');
  tbody.empty();

  order.productos.forEach(prod => {
    const row = `
      <tr>
        <td>
          <input type="text" class="form-controle form-controle-sm" value="${prod.nombre}" readonly>
        </td>
        <td>
          <input type="number" class="form-controle form-controle-sm" value="${prod.precio.toFixed(2)}" ${readonly ? 'readonly' : ''}>
        </td>
        <td>
          <input type="number" class="form-controle form-controle-sm" value="${prod.cantidad}" ${readonly ? 'readonly' : ''}>
        </td>
        <td>
          <input type="text" class="form-controle form-controle-sm" value="${prod.subtotal.toFixed(2)}" readonly>
        </td>
        <td>
          ${readonly ? '' : '<button class="btn btn-sm btn-danger">🗑️</button>'}
        </td>
      </tr>
    `;
    tbody.append(row);
  });

  // Si quieres controlear también la acción de guardar:
  if (readonly) {
    $('.modal-footer .save-btn').hide();
  } else {
    $('.modal-footer .save-btn').show();
  }
}




function deleteOrder(orderId) {
  console.log('Función deleteOrder llamada con ID:', orderId);
}



// Llamar cuando el documento esté listo
$(document).ready(function() {
  console.log('Documento listo, iniciando carga de pedidos...');
  loadOrdersFromAPI();
});

// Función para cargar datos del usuario en el modal
function editUser(userId) {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/users/${userId}`)
    .then(response => response.json())
    .then(user => {
      // Rellenar el modal con los datos del usuario
      $('#userModal').find('#userId').val(user.id);
      $('#userModal').find('#userStatus').val(user.estado);
      $('#userModal').find('#userEmail').val(user.email);
      $('#userModal').find('#userrolee').val(user.role);
      $('#userModal').find('#userName').val(user.name);
    })
    .catch(error => {
      console.error('Error al cargar datos del usuario:', error);
      alert('Error al cargar datos del usuario');
    });
}

// Función para guardar cambios del usuario
function saveUser() {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  const userId = $('#userModal').find('#userId').val();
  const userData = {
    estado: $('#userModal').find('#userStatus').val(),
    email: $('#userModal').find('#userEmail').val(),
    role: $('#userModal').find('#userrolee').val(),
    name: $('#userModal').find('#userName').val(),
    password: $('#userModal').find('#userPassword').val()
  };

  fetch(`${API_BASE_URL}/users/${userId}`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(userData)
  })
    .then(response => response.json())
    .then(() => {
      $('#userModal').modal('hide');
      loadUsersFromAPI();
      alert('Usuario actualizado correctamente');
    })
    .catch(error => {
      console.error('Error al actualizar usuario:', error);
      alert('Error al actualizar usuario');
    });
}
// Función para cargar los detalles de un pedido


function editProduct(productId) {
  const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
  
  fetch(`${API_BASE_URL}/productos/${productId}`)
    .then(response => {
      if (!response.ok) throw new Error('Error al obtener datos del producto');
      return response.json();
    })
    .then(product => {
      // Rellenar los campos del modal
      $('#productId').val(product.id_producto);
      $('#productName').val(product.nombre);
      $('#productDescription').val(product.descripcion);
      $('#productCategory').val(product.categoria);
      $('#productSKU').val(product.tipo);
      $('#productPrice').val(product.precio);
      $('#productStock').val(product.unidades);
      
      // Mostrar imagen actual si existe
      if (product.foto) {
        $('#currentProductImage').attr('src', product.foto).show();
      } else {
        $('#currentProductImage').hide();
      }
      
      // Actualizar título del modal
      $('#productModalLabel').text('Editar Producto');
      
      // Mostrar el modal
      $('#productModal').modal('show');
    })
    .catch(error => {
      console.error('Error:', error);
      alert('Error al cargar datos del producto');
    });
}

function deleteProduct(productId) {
    const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
    
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        fetch(`${API_BASE_URL}/productos/${productId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => {
                    throw new Error(err.detail || 'Error al eliminar producto');
                });
            }
            return response.json();
        })
        .then(data => {
            loadTablesFromAPI(); // Recargar tabla de productos
            alert('Producto eliminado correctamente');
        })
        .catch(error => {
            console.error('Error:', error);
            alert(`Error al eliminar producto: ${error.message}`);
        });
    }
}

function saveProduct() {
    const API_BASE_URL = 'https://api-web-hlw7.onrender.com';
    const productId = $('#productId').val();
    
    // Obtener todos los valores del formulario
    const formData = {
        nombre: $('#productName').val().trim(),
        descripcion: $('#productDescription').val().trim(),
        categoria: $('#productCategory').val(),
        tipo: $('#productSKU').val().trim(),
        precio: parseFloat($('#productPrice').val()) || 0,
        unidades: parseInt($('#productStock').val()) || 0
    };

    // Verificar que los campos requeridos no estén vacíos
    if (!formData.nombre || !formData.categoria || !formData.precio) {
        alert('Por favor, complete todos los campos requeridos');
        return;
    }

    // Si hay una imagen actual, mantenerla
    if ($('#currentProductImage').is(':visible')) {
        formData.foto = $('#currentProductImage').attr('src');
    }

    // Filtrar cualquier valor null o undefined
    const productData = Object.fromEntries(
        Object.entries(formData).filter(([_, value]) => value != null && value !== '')
    );

    console.log('Datos a enviar:', productData); // Para debug

    const method = productId ? 'PUT' : 'POST';
    const url = productId ? `${API_BASE_URL}/productos/${productId}` : `${API_BASE_URL}/productos`;

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(productData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                throw new Error(err.detail || 'Error al guardar producto');
            });
        }
        return response.json();
    })
    .then(data => {
        $('#productModal').modal('hide');
        loadTablesFromAPI(); // Recargar tabla de productos
        alert(productId ? 'Producto actualizado correctamente' : 'Producto creado correctamente');
    })
    .catch(error => {
        console.error('Error completo:', error);
        alert(`Error al guardar producto: ${error.message}`);
    });
}



// Agregar los eventos necesarios
$(document).ready(function() {
  // Evento para el botón de editar en la tabla de productos
  $('#products-table').on('click', '.edit-btn', function() {
    const productId = $(this).data('id');
    editProduct(productId);
  });
  
  // Evento para el botón de guardar en el modal
  $('#productModal .btn-primary').on('click', function() {
    saveProduct();
  });

  $(document).ready(function() {
    // ... otros event listeners ...

    // Añadir evento para el botón de eliminar
    $('#products-table').on('click', '.delete-btn', function() {
        const productId = $(this).data('id');
        deleteProduct(productId);
    });
});
  
  // Evento para limpiar el modal cuando se cierra
  $('#productModal').on('hidden.bs.modal', function() {
    $(this).find('form')[0].reset();
    $('#productId').val('');
    $('#productModalLabel').text('Añadir Producto');
    $('#currentProductImage').hide();
  });
});

// Agregar el evento para guardar cambios
$('#userModal .btn-primary').on('click', saveUser);

// Inicializar y establecer intervalo de actualización
$(document).ready(function() {
  // Cargar datos al iniciar
  loadChartDataFromAPI();
  loadTablesFromAPI();
  loadUsersFromAPI();
  loadRecentOrders();
  loadTopProducts()
  
  // Actualizar cada 5 minutos (300000 ms)
  // Puedes ajustar este intervalo según tus necesidades
  setInterval(function() {
    loadChartDataFromAPI();
    loadTablesFromAPI();
    loadUsersFromAPI();
    loadRecentOrders();
    loadTopProducts()
  }, 300000);
  
  // Botón de actualización manual
  $('#refresh-data').on('click', function() {
    loadChartDataFromAPI();
    loadTablesFromAPI();
    loadUsersFromAPI();
    loadRecentOrders();
    loadTopProducts()
    
    // Mostrar notificación de actualización
    const toast = `<div class="toast show" rolee="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Sistema</strong>
        <small>Ahora</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Datos actualizados correctamente.
      </div>
    </div>`;
    
    $('#toast-container').html(toast);
    setTimeout(() => {
      $('.toast').toast('hide');
    }, 3000);
  });
});
  
// Agregar al final del script existente
$(document).ready(function() {
  // Tema oscuro
  const toggleTheme = () => {
    $('body').toggleClass('dark-theme');
    const isDark = $('body').hasClass('dark-theme');
    localStorage.setItem('darkTheme', isDark);
    
    // Cambiar icono
    const icon = isDark ? 'fa-sun' : 'fa-moon';
    $('#toggleTheme i').removeClass('fa-sun fa-moon').addClass(icon);
  };

  // Cargar preferencia de tema
  if (localStorage.getItem('darkTheme') === 'true') {
    toggleTheme();
  }

  // Evento para cambiar tema
  $('#toggleTheme').on('click', function(e) {
    e.preventDefault();
    toggleTheme();
  });

  // Manejo de idiomas
  $('.list-group-item').on('click', function() {
    const lang = $(this).data('lang');
    $('.list-group-item').removeClass('active');
    $(this).addClass('active');
    localStorage.setItem('language', lang);
    $('#languageModal').modal('hide');
    
    // Aquí puedes agregar la lógica para cambiar el idioma
    // Por ejemplo, recargar la página con el nuevo idioma
    // window.location.href = `?lang=${lang}`;
  });

  // Cargar idioma preferido
  const savedLang = localStorage.getItem('language');
  if (savedLang) {
    $(`.list-group-item[data-lang="${savedLang}"]`).click();
  }

  // Cerrar sesión
  $('#logoutBtn').on('click', function(e) {
    e.preventDefault();
    if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
      // Aquí puedes agregar la lógica para cerrar sesión
      // Por ejemplo:
      // window.location.href = 'logout.php';
    }
  });
});
  </script>
</body>
</html>