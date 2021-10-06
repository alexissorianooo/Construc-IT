<?php session_start()?>

<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0"
    style="background: var(--warning);">
    <div class="container-fluid d-flex flex-column p-0"><a
            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
            href="admin-page.php">
            <div class="sidebar-brand-icon rotate-n-15"></div>
            <div class="sidebar-brand-text mx-3"><span style="color: rgb(0,0,0);">ADMIN&nbsp;</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="admin-page.php"><span
                        style="border-color: rgb(255, 255, 255);border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;color: rgb(0,0,0);"><i
                            class="fas fa-tachometer-alt" style="color: rgb(172,135,43);"></i>User
                        Profiles</span></a>
                <a class="nav-link" data-bss-hover-animate="pulse" href="admin-audit.php"><i class="fas fa-user"
                        style="color: rgb(0,0,0);"></i><span style="color: rgb(0,0,0);">Audit Trail</span></a>
            </li>
            
            <li class="nav-item"><a class="nav-link" data-bss-hover-animate="pulse" href="../../includes/logoutdb.php"
                    style="color: rgba(0,0,0,0.8);"><i class="far fa-user-circle"
                        style="color: rgba(0,0,0,0.3);"></i><span
                        style="color: rgba(0,0,0,0.8);">Logout</span></a></li>
            
        </ul>
        <div class="text-center d-none d-md-inline"></div>
    </div>
</nav>