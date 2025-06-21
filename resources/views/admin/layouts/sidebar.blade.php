  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link">
          <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">GGM</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  {{-- <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" class="img-circle elevation-2"
                      alt="User Image"> --}}
              </div>
              <div class="info">
                  <a href="#" class="d-block">
                      {{ Auth::guard('')->user()->name }}
                  </a>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Dashboard
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.categories') }}" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Categories
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.product') }}" class="nav-link">
                          <i class="nav-icon fab fa-product-hunt"></i>
                          <p>
                              Product
                          </p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="{{ route('admin.blog') }}" class="nav-link">
                          <i class="nav-icon fas fa-blog"></i>
                          <p>
                              Blogs
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.testimonial') }}" class="nav-link">
                          <i class="nav-icon fas fa-comments"></i>
                          <p>
                              Testimonials
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-table"></i>
                          <p>
                              FrontPage
                              <i class="fas fa-angle-left right"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.instagram') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Instagram</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.contact') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Contact</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="pages/tables/jsgrid.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>jsGrid</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  {{-- logout --}}
                  <li class="nav-item">
                      <a href="{{ route('admin.logout') }}" class="nav-link">
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
