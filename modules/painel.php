<?php
$pageTitle = "Dashboard | FlowDesk";
include __DIR__.'/inc/headers/login.php';
if (!isset($_SESSION['user_id'])) {
    header('Location: /flowdesk_novo/modules/painel.php');
    exit;
}
$user_name = isset($_SESSION['user_nome']) ? $_SESSION['user_nome'] : 'Usuário';
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
?>

<!-- Botão Hamburguer (apenas mobile) -->
<button class="btn btn-primary d-lg-none m-2" id="menuToggle" aria-label="Abrir menu">
    <i class="bi bi-list" style="font-size: 2rem;"></i>
</button>

<div class="container-fluid painel-pai">
  <div class="row flex-nowrap">
    <!-- Sidebar -->
    <nav class="col-auto col-lg-2 px-sm-2 px-0 sidebar bg-primary min-vh-100 d-flex flex-column justify-content-between" id="sidebar">
      <div>
        <div class="d-flex align-items-center justify-content-center py-4">
          <img src="assets/img/icon.png" alt="Logo" width="40" class="me-2" />
          <span class="fs-5 fw-bold text-light d-none d-lg-inline">FlowDesk</span>
        </div>
        <div class="text-center text-light mb-3 d-none d-lg-block">"Aqui vai sua frase motivacional"</div>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="#" class="nav-link active text-light"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
          </li>
          <li>
            <a href="#" class="nav-link text-light"><i class="bi bi-people me-2"></i>Clientes</a>
          </li>
          <li>
            <a href="#" class="nav-link text-light"><i class="bi bi-briefcase me-2"></i>Projetos</a>
          </li>
          <li>
            <a href="#" class="nav-link text-light"><i class="bi bi-cash me-2"></i>Financeiro</a>
          </li>
          <li>
            <a href="#" class="nav-link text-light"><i class="bi bi-hdd-network me-2"></i>Hospedagens</a>
          </li>
        </ul>
      </div>
      <div class="sidebar-footer text-center text-light p-3 small">
        <div>&copy; 2025 FlowDesk</div>
        <div><a href="#" class="text-light text-decoration-underline">Termos de uso</a> • <a href="#" class="text-light text-decoration-underline">Política de privacidade</a></div>
      </div>
    </nav>
    <!-- Conteúdo principal -->
    <main class="col py-3 px-4" id="painel_content">
      <h2>Dashboard</h2>
      <!-- Seu conteúdo do painel aqui -->
    </main>
  </div>
</div>
