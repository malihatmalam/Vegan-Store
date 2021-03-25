<div class="sidebar">
<nav class="sidebar-nav">
     <ul class="nav">
         <li class="nav-item">
             <a class="nav-link" href="#">
                 <i class="nav-icon icon-speedometer"></i> Dashboard
             </a>
         </li>
 
         <li class="nav-title">MANAJEMEN FRESH BOX</li>
 
        {{-- Kategori --}}
         <li class="nav-item">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="nav-icon icon-drop"></i> Kategori
            </a>
         </li>

        {{-- Produk --}}
         <li class="nav-item">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="nav-icon icon-drop"></i> Produk
            </a>
         </li>

         {{-- Sector --}}
         <li class="nav-item">
            <a class="nav-link" href="{{ route('sector.index') }}">
                <i class="nav-icon icon-drop"></i> Sector
            </a>
         </li>

         {{-- Customer --}}
         <li class="nav-item">
            <a class="nav-link" href="{{ route('customer.index') }}">
                <i class="nav-icon icon-drop"></i> Customer
            </a>
         </li>
        
         {{-- Pengiriman --}}
         <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> Pengiriman
            </a>
            {{-- Data Pengiriman --}}
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="nav-icon icon-puzzle"></i> Data Pengiriman
                    </a>
                </li>
            </ul>
            {{-- Data Kurir --}}
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courir.index') }}">
                        <i class="nav-icon icon-puzzle"></i> Data Kurir
                    </a>
                </li>
            </ul>
        </li>


        {{-- Pengaturan --}}
         <li class="nav-item nav-dropdown">
             <a class="nav-link nav-dropdown-toggle" href="#">
                 <i class="nav-icon icon-settings"></i> Pengaturan
             </a>
             <ul class="nav-dropdown-items">
                 <li class="nav-item">
                     <a class="nav-link" href="#">
                         <i class="nav-icon icon-puzzle"></i> Toko
                     </a>
                 </li>
             </ul>
         </li>

     </ul>
 </nav>
 