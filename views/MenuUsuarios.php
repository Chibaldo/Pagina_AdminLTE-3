<?php
// Incluir archivo de estilos CSS para el menú de usuarios
echo '<link rel="stylesheet" href="modulos/cssMenuUsuarios.css">';
?>
<!-- MenuUsuarios.php -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Menú de Usuario -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Gestión de Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="../views/perfil.php" class="nav-link">
            <i class="fas fa-id-badge nav-icon"></i>
            <p>Perfil</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../views/lista_usuarios.php" class="nav-link">
            <i class="fas fa-users nav-icon"></i>
            <p>Lista de Usuarios</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../views/agregar_usuario.php" class="nav-link">
            <i class="fas fa-user-plus nav-icon"></i>
            <p>Agregar Usuario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../views/editar_usuario.php" class="nav-link">
            <i class="fas fa-user-edit nav-icon"></i>
            <p>Editar Usuario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../views/eliminar_usuario.php" class="nav-link">
            <i class="fas fa-user-times nav-icon"></i>
            <p>Eliminar Usuario</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../views/login.php" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <p>Cerrar Sesión</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
