<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Trivia<span>QUIZ</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item active">
            <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Aplicação</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Subscrições</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
               <?php /*  <li class="nav-item">
                  <a href="../../pages/email/inbox.html" class="nav-link">Recentes</a>
                </li>
                */ ?>
                <li class="nav-item">
                  <a href="<?php echo e(url('admin/subscricoes')); ?>" class="nav-link">Todas</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/subscritores')); ?>" class="nav-link">
              <i class="link-icon" data-feather="message-square"></i>
              <span class="link-title">Subscritores</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="link-icon" data-feather="pie-chart"></i>
              <span class="link-title">Report basico</span>
            </a>
          </li>

          <li class="nav-item nav-category">Parametrização</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">Geral</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                     <a href="<?php echo e(url('admin/topicos')); ?>" class="nav-link">Topicos</a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo e(url('admin/perguntas/lista')); ?>" class="nav-link">Perguntas</a>
                </li>
               
              </ul>
            </div>
          </li>
         
        <?php /*  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#forms" role="button" aria-expanded="false" aria-controls="forms">
              <i class="link-icon" data-feather="inbox"></i>
              <span class="link-title">Forms</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="../../pages/forms/basic-elements.html" class="nav-link">Basic Elements</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/forms/advanced-elements.html" class="nav-link">Advanced Elements</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/forms/editors.html" class="nav-link">Editors</a>
                </li>
                <li class="nav-item">
                  <a href="../../pages/forms/wizard.html" class="nav-link">Wizard</a>
                </li>
              </ul>
            </div>
          </li> */ ?>
         
          <li class="nav-item nav-category">Outros parametros</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" role="button" aria-expanded="false" aria-controls="general-pages">
              <i class="link-icon" data-feather="book"></i>
              <span class="link-title">Configurações</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav sub-menu">
               
              <li class="nav-item">
                  <a href="<?php echo e(url('admin/usuarios')); ?>" class="nav-link">Usuarios</a>
                </li>
                <?php /*<li class="nav-item">
                  <a href="<?php echo e(url('admin/perfil')); ?>" class="nav-link">Perfil</a>
                </li>*/ ?>
              </ul>
            </div>
          </li>
         
          <li class="nav-item nav-category">Docs</li>
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">documentação</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('admin/simulador')); ?>" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Simulador Quiz</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <h6 class="text-muted">Sidebar:</h6>
        <div class="form-group border-bottom">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
              Light
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
              Dark
            </label>
          </div>
        </div>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item active" href="../../../demo_1/dashboard-one.html">
            <img src="../../../assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item" href="../../../demo_2/dashboard-one.html">
            <img src="../../../assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav>