<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Admin</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Admin</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown active">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="menu-header">Master</li>
              <li class="nav-item dropdown">
                <a href="{{ route('admin.about.index') }}" class="nav-link"><i class="fas fa-shopping-bag"></i> <span>About</span></a>
              </li>
              <li class="nav-item dropdown">
                  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file"></i> <span>Article</span></a>
                  <ul class="dropdown-menu">
                      <li><a class="nav-link" href="{{ route('admin.article.index') }}">Articles</a></li>
                      <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="{{ route('admin.service.index') }}" class="nav-link"><i class="fas fa-pencil-ruler"></i> <span>Services</span></a>
              </li>
              <li><a href="{{ route('admin.portofolio.index') }}" class="nav-link"><i class="fas fa-th-large"></i> <span>Portofolio</span></a></li>
              <li><a href="{{ route('admin.profile.index') }}" class="nav-link"><i class="far fa-user"></i> <span>Profile</span></a></li>
              <li><a href="{{ route('admin.testimoni.index') }}" class="nav-link"><i class="fas fa-ellipsis-h"></i> <span>Testimoni</span></a></li>
              <li><a href="{{ route('admin.address.index') }}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Address</span></a></li>
              <li><a href="{{ route('admin.contact.index') }}" class="nav-link"><i class="fas fa-address-book"></i> <span>Contact Us</span></a></li>
              <li><a href="{{ route('admin.faqs.index') }}" class="nav-link"><i class="fas fa-exclamation"></i> <span>FAQS</span></a></li>
              <li><a href="{{ route('admin.feedbacks.index') }}" class="nav-link"><i class="fas fa-plus-circle"></i> <span>Feedbacks</span></a></li>
              <li><a href="{{ route('admin.setting.index') }}" class="nav-link"><i class="fas fa-address-card"></i> <span>Setting Website</span></a></li>
        </aside>
      </div>
