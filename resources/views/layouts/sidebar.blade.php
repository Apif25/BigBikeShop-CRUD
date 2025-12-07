 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <img src="{{ asset('image/Big_Bike.png') }}" alt="homepage" class="light-logo" style="width: 80px; height: 80px; object-fit: contain;" />
         </div>
         <div class="sidebar-brand-text mx-3"> BigBike Shop </div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="dashboard">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Manajemen Data
     </div>

     <!-- Nav Item - User -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.user.index') }}">
             <i class="fa fa-user"></i>
             <span>User</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Master
     </div>


     <!-- Nav Item - Motor -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.motor.index') }}">
             <i class="fa fa-motorcycle"></i>
             <span>Motor</span></a>
     </li>

     <!-- Nav Item - Pemesanan -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.pemesanan.index') }}">
             <i class="fa fa-shopping-cart"></i>
             <span>Pemesanan</span></a>
     </li>


     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Transaksi
     </div>

     <!-- Nav Item - Transaksi -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.Transaksi.index') }}">
             <i class="fa fa-random"></i>
             <span>Riwayat Transaksi</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.Transaksi.create',  'masuk') }}">
             <i class="fa fa-arrow-down"></i>
             <span>Transaksi Masuk</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.Transaksi.create', 'keluar') }}">
             <i class="fa fa-arrow-up"></i>
             <span>Transaksi Keluar</span></a>
     </li>



    
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

 </ul>