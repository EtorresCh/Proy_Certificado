<div class="br-logo"><a href=""><span>[</span>Empresa<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
  <label class="sidebar-label pd-x-15 mg-t-20">Menú</label>
    <div class="br-sideleft-menu"> 
      <a href="../UsuHome/" class="br-menu-link">
        <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Inicio</span>
        </div>
      </a>       
        <?php
         if($_SESSION["rol_id"]== 1){
          ?>
            <a href="../UsuCurso/" class="br-menu-link">
              <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Mis Cursos</span>
              </div>
            </a>
          <?php  
         } else{
          ?>
           <a href="../Admin_Usuarios/" class="br-menu-link">
              <div class="br-menu-item">
                <i class=" menu-item-icon icon  far fa-user tx-20"></i>
                <span class="menu-item-label">Mnt. Usuarios</span>
              </div>
            </a>
            <a href="../Admin_Cursos/" class="br-menu-link">
              <div class="br-menu-item">
              <i class="menu-item-icon icon far fa-file-alt tx-20"></i>
                <span class="menu-item-label">Mnt. Cursos</span>
              </div>
            </a>
            <a href="../Admin_Instructores/" class="br-menu-link">
              <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-people-outline tx-24"></i>
                <span class="menu-item-label">Mnt. Instructores</span>
              </div>
            </a>
            <a href="../Admin_Categorias/" class="br-menu-link">
              <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-pricetags-outline tx-24"></i>
                <span class="menu-item-label">Mnt. Categorias</span>
              </div>
            </a>
            <a href="../Admin_Detalle_Certificado/" class="br-menu-link">
              <div class="br-menu-item">
              <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-24"></i>
                <span class="menu-item-label">Detalle Certificado</span>
              </div>
            </a>
          <?php  
         }
        ?>
       <a href="../UsuPerfil/" class="br-menu-link">
          <div class="br-menu-item">
          <i class="menu-item-icon icon ion-ios-gear-outline tx-20"></i>
            <span class="menu-item-label">Mi Perfil</span>
          </div>
        </a>
        <a href="../../index.php" class="br-menu-link">
          <div class="br-menu-item">
          <i class="menu-item-icon icon ion-power tx-20"></i>
            <span class="menu-item-label">Cerrar Sesion</span>
          </div>
        </a>
      </div>
    </div>