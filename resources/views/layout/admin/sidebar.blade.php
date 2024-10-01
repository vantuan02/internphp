<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

            @role('admin')
                <li class="nav">
                    <a href="{{ route('students.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-lines-fill"></i>
                        <p>
                            {{ __('Students') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>
            @endrole
            <li class="nav">
                <a href="{{ route('departments.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-list-task"></i>
                    <p>
                        {{ __('Departments') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('subjects.index') }}" class="nav-link">
                    <i class="nav-icon bi bi-bookmarks-fill"></i>
                    <p>
                        {{ __('Subjects') }}
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('students.table') }}" class="nav-link">
                    <i class="bi bi-grid-3x3"></i>
                    <p>
                        {{ __('Scores') }}
                    </p>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
