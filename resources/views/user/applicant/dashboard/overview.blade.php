<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
            --info-color: #17a2b8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            margin: 0;
            padding: 0;
            transition: background-color 0.3s;
        }

        body.dark-mode {
            background-color: #1a1d21;
            color: #e4e6eb;
        }

        .dashboard-container {
            padding: 20px;
        }

        /* Topbar Styles */
        .topbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        body.dark-mode .topbar {
            background-color: #242526;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0;
            color: var(--secondary-color);
        }

        body.dark-mode .dashboard-title {
            color: #e4e6eb;
        }

        /* Stats Cards */
        .stats-container {
            margin-bottom: 20px;
        }

        .stat-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card h6 {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 5px;
        }

        body.dark-mode .stat-card h6 {
            color: #a0a4a8;
        }

        .stat-card h5 {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
        }

        /* Tabs */
        .nav-tabs {
            border-bottom: 2px solid #dee2e6;
            margin-bottom: 20px;
        }

        body.dark-mode .nav-tabs {
            border-bottom: 2px solid #444;
        }

        .nav-tabs .nav-link {
            border: none;
            color: #6c757d;
            padding: 12px 20px;
            border-radius: 0;
            background: transparent;
            font-weight: 500;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            background: transparent;
        }

        body.dark-mode .nav-tabs .nav-link {
            color: #a0a4a8;
        }

        body.dark-mode .nav-tabs .nav-link.active {
            color: var(--primary-color);
        }

        /* Iframe Container */
        .iframe-card {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 75vh;
        }

        body.dark-mode .iframe-card {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #contentFrame {
            width: 100%;
            height: 100%;
            border: none;
            background: white;
        }

        body.dark-mode #contentFrame {
            background: #242526;
        }

        /* Toggle buttons */
        .btn-toggle-theme {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        .btn-toggle-theme:hover {
            background-color: #2980b9;
        }

        /* Navigation Menu Styles */
        .nav-menu {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .nav-menu-item {
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #f8f9fa;
            color: var(--secondary-color);
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #dee2e6;
        }

        .nav-menu-item:hover, .nav-menu-item.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        body.dark-mode .nav-menu-item {
            background-color: #2a2c31;
            color: #e4e6eb;
            border-color: #444;
        }

        body.dark-mode .nav-menu-item:hover, 
        body.dark-mode .nav-menu-item.active {
            background-color: var(--primary-color);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .stats-container .col-md-2 {
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
                margin-bottom: 15px;
            }
            
            .nav-menu {
                gap: 8px;
            }
            
            .nav-menu-item {
                padding: 6px 12px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .stats-container .col-md-2 {
                flex: 0 0 50%;
                max-width: 50%;
            }
            
            .iframe-card {
                height: 70vh;
            }
            
            .topbar {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .nav-menu {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .stats-container .col-md-2 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            
            .nav-tabs .nav-link {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
            
            .dashboard-title {
                font-size: 1.5rem;
            }
            
            .nav-menu {
                flex-direction: column;
                gap: 5px;
            }
            
            .nav-menu-item {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Topbar -->
        <div class="topbar">
            <h1 class="dashboard-title">*</h1>
            <button id="toggleTheme" class="btn-toggle-theme">
                <i class="fas fa-moon"></i> Dark Mode
            </button>
        </div>

        <!-- Stats Cards -->
       <div class="stats-container">
    <div class="row">
        <div class="col-md-2 col-6">
            <div class="card stat-card shadow-sm mb-1">
                <div class="card-body text-center">
                    <h6>Total Applications</h6>
                    <h5>{{ $totalApplications }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="card stat-card shadow-sm mb-4 bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Pending Applications</h6>
                    <h5>{{ $pendingApplications }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="card stat-card shadow-sm mb-4 bg-dark text-white">
                <div class="card-body text-center">
                    <h6>Accepted Applications</h6>
                    <h5>{{ $acceptedApplications }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="card stat-card shadow-sm mb-4 bg-info text-white">
                <div class="card-body text-center">
                    <h6>Rejected Applications</h6>
                    <h5>{{ $rejectedApplications }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-6">
            <div class="card stat-card shadow-sm mb-4 bg-secondary text-white">
                <div class="card-body text-center">
                    <h6>Jobs Applied</h6>
                    <h5>{{ $jobsApplied }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Navigation Menu (Replaces Tabs) -->
        <div class="nav-menu mb-4" id="navMenu">
            <!-- Navigation items will be dynamically added here -->
        </div>

        <!-- Iframe Container -->
        <div class="iframe-card shadow-sm">
            <iframe id="contentFrame" src="{{ route('user.applicant.overviews.index') }}"></iframe>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // DOM Elements
        const iframe = document.getElementById("contentFrame");
        const toggleTheme = document.getElementById("toggleTheme");
        const navMenu = document.getElementById("navMenu");

        // Theme toggle
        if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark-mode");
            toggleTheme.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
        }

        toggleTheme.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            if (document.body.classList.contains("dark-mode")) {
                localStorage.setItem("theme", "dark");
                toggleTheme.innerHTML = '<i class="fas fa-sun"></i> Light Mode';
            } else {
                localStorage.setItem("theme", "light");
                toggleTheme.innerHTML = '<i class="fas fa-moon"></i> Dark Mode';
            }
        });

        function selectItem(element, url) {
            iframe.src = url;
            document.querySelectorAll(".nav-menu-item").forEach(item => item.classList.remove("active"));
            element.classList.add("active");
        }

        function createNavButton(label, icon, url) {
            const button = document.createElement('a');
            button.className = 'nav-menu-item';
            button.innerHTML = `<i class="${icon}"></i> ${label}`;
            button.addEventListener('click', () => selectItem(button, url));
            navMenu.appendChild(button);
            
            // Set first button as active by default
            if (navMenu.children.length === 1) {
                button.classList.add('active');
            }
            
            return button;
        }

        // Create navigation buttons (same as in your Blade template)
  createNavButton('overview', 'fas fa-map-marker-alt', '{{ route('user.applicant.overviews.index') }}');
 createNavButton('Certifications', 'fas fa-certificate', '{{ route('user.applicant.certifications.index') }}');
  createNavButton('Educations', 'fas fa-graduation-cap', '{{ route('user.applicant.educations.index') }}');
  createNavButton('Experiences', 'fas fa-briefcase', '{{ route('user.applicant.experiences.index') }}');
  createNavButton('Voluntary Disclosures', 'fas fa-user-shield', '{{ route('user.applicant.voluntary_disclosures.edit') }}');
  createNavButton('Locations', 'fas fa-map-marker-alt', '{{ route('user.applicant.locations.index') }}');


    </script>
</body>
</html>