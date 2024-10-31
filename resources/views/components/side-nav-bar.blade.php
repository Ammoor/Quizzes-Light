@if (request()->is('admin-dashboard-home'))
    <style>
        .Dashboard {
            color: var(--main-color-3);
            background-color: #f5cccc;
        }

        .Dashboard:hover {
            color: var(--main-color-3);
            background-color: #f5cccc;
        }
    </style>
@elseif (request()->is('admin-tests'))
    <style>
        #tests {
            color: var(--main-color-3);
            background-color: #f5cccc;
        }

        #all-tests {
            color: var(--main-color-3);
            background-color: #f5cccc;
        }

        #all-tests:hover {
            color: var(--main-color-3);
            background-color: #f5cccc;
        }
    </style>
@endif
<aside>
    <button class="sidebar-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i> Menu
    </button>
    <div class="sidebar" id="sidebar">
        <!-- Dashboard link -->
        <div>
            <a href="admin-dashboard-home" class="Dashboard"> <i class="fas fa-home"></i> Dashboard</a>
        </div>
        <!-- Container for Tests dropdown -->
        <div>
            <input type="checkbox" id="testsDropdown" class="menu-toggle">
            <label class="menu-item" id="tests" for="testsDropdown">
                <span><i class="far fa-file-alt"></i> Quizzes</span>
                <span class="arrow">&#9662;</span>
            </label>
            <!-- Submenu for Tests -->
            <ul class="submenu">
                <li><a href="admin-tests" id="all-tests">All Quizzes</a></li>
                <li><a href="#">Question Bank</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Certificates</a></li>
                <li><a href="#">Statistics</a></li>
            </ul>
        </div>
        <div class="divider"> Give Your Test</div>
        <!-- Container for Links dropdown -->
        <div>
            <input type="checkbox" id="linksDropdown" class="menu-toggle">
            <label class="menu-item" for="linksDropdown">
                <span><i class="fas fa-link"></i> Links</span>
                <span class="arrow">&#9662;</span>
            </label>
            <!-- Submenu for Links -->
            <ul class="submenu">
                <li><a href="#">All Links</a></li>
                <li><a href="#">Themes</a></li>
                <li><a href="#">Export</a></li>
            </ul>
        </div>
        <!-- Container for Groups dropdown -->
        <div class="dropdown">
            <input type="checkbox" id="groupsDropdown" class="menu-toggle">
            <label class="menu-item" for="groupsDropdown">
                <span><i class="fas fa-users"></i> Groups</span>
                <span class="arrow">&#9662;</span>
            </label>
            <!-- Submenu for Groups -->
            <ul class="submenu">
                <li><a href="#">All Groups</a></li>
                <li><a href="#">Export</a></li>
            </ul>
        </div>
    </div>
</aside>
