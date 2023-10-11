<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <a href="{{ route('dashboard') }}"><img src="{{ asset('upload/admin_image') }}/{{ Auth::user()->p_image }}" alt="" class="avatar-md rounded-circle"></a>
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('checkinMorning') }}" class="">
                        <i class="ri-user-follow-line"></i>
                        <span>Registrar Asistencia</span>
                    </a>
                   
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="ri-database-2-line"></i>
                        <span>Historial</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('historial') }}">Asistencia Hoy</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('historialAll') }}">Historial</a></li>
                    </ul>
                </li> 
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>