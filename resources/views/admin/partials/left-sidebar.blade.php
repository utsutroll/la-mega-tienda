<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">{{-- <img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> --}}
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="img-circle">
                    <span class="hide-menu">{{ Auth::user()->name }}</span>
                </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('profile.show') }}"><i class="ti-user"></i> Mi Perfil</a></li>
                        <li>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    <i class="fa fa-power-off"></i> {{ __('Cerrar Sesión') }}
                                </a>
                            </form>    
                        </li>
                    </ul>
                </li>
                <li id="LiMenu"> <a class="waves-effect waves-dark" href="{{url('admin')}}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Menú Principal</span></a></li>
                
                <li class="nav-small-cap">--- Productos</li>
                <li id="LiCategories"> 
                    <a class="waves-effect waves-dark" href="{{route('admin.categories.index')}}" aria-expanded="false">
                        <i class="icon-layers"></i>
                        <span class="hide-menu">Categoría</span>
                    </a>
                </li>
                <li id="LiTags"> 
                    <a class="waves-effect waves-dark" href="{{route('admin.tags.index')}}" aria-expanded="false">
                        <i class="icon-tag"></i>
                        <span class="hide-menu">Etiqueta</span>
                    </a>
                </li>
                <li id="LiPresentations"> 
                    <a class="waves-effect waves-dark" href="{{route('admin.presentations.index')}}" aria-expanded="false">
                        <i class="ti-layers-alt"></i>
                        <span class="hide-menu">Presentación</span>
                    </a>
                </li>
                <li id="liProducts"> 
                    <a class="waves-effect waves-dark" href="{{route('admin.products.index')}}" aria-expanded="false">
                        <i class="icon-bag"></i>
                        <span class="hide-menu">Producto</span>
                    </a>
                </li>
                <li class="nav-small-cap">--- Almacén</li>
                <li class="LiAmacen"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-home"></i><span class="hide-menu">Entradas & Salidas</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li id="liEntry"><a id="AEntry" href="{{route('admin.product-entry.index')}}" class="">Entrada de Producto</a></li>
                        <li><a href="{{route('admin.product-entry.stock')}}">Stock</a></li>
                        <li><a href="#">Salida de Producto</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- Actualizar $</li>
                <li> 
                    <a class="waves-effect waves-dark" aria-expanded="false" data-toggle="modal" data-target="#modalUpdatePrice">
                        <i class="fa fa-refresh"></i>
                        <span class="hide-menu">Precio de Producto</span>
                    </a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" aria-expanded="false" data-toggle="modal" data-target="#modalUpdatePriceDolar">
                        <i class="fa fa-refresh"></i>
                        <span class="hide-menu">Tasa del Dolar</span>
                    </a>
                </li>
                <li class="nav-small-cap">--- Bancos & Formas de Pago</li>
                <li id="LiBank"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-bank"></i><span class="hide-menu">Bancos & Billeteras</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Cuentas Bancarias</a></li>
                        <li><a href="#">Billeteras Electronícas</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- Cotrol de Usuarios</li>
                <li id="LiUser"> 
                    <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Usuarios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Roles</a></li>
                        <li><a href="#">Permisos</a></li>
                        <li><a href="#">Usuarios</a></li>
                    </ul>
                </li>
            
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>