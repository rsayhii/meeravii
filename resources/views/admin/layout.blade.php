<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClothingHub - Admin Dashboard</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Chart.js for analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom styles -->
    <style>
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease;
        }
        
        /* Hide scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            display: none;
        }
        .sidebar-scroll {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Custom color scheme */
        .bg-primary { background-color: #556b2f; }
        .bg-primary-light { background-color: #6b8540; }
        .bg-primary-dark { background-color: #445526; }
        .text-primary { color: #556b2f; }
        .border-primary { border-color: #556b2f; }
        .hover\:bg-primary:hover { background-color: #556b2f; }
        .hover\:text-primary:hover { color: #556b2f; }
        
        /* Custom chart colors */
        .chart-color-1 { background-color: #556b2f; }
        .chart-color-2 { background-color: #6b8540; }
        .chart-color-3 { background-color: #809953; }
        .chart-color-4 { background-color: #95ad6c; }
        .chart-color-5 { background-color: #aac285; }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#556b2f',
                            light: '#6b8540',
                            dark: '#445526'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
       

        {{-- sidebar --}}
        @include('admin.sidebar.sidebar')
        {{-- sidebar --}}

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden lg:ml-0">
        
            {{-- header --}}
            @include('admin.header.header')
            {{-- header --}}

           {{-- dynamic content --}}
         <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50">
             @yield('content')
            </main>
           {{-- dynamic content --}}




        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 hidden lg:hidden"></div>

    <!-- Loading spinner -->
    <div id="loading-spinner" class="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-75 hidden">
        <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-primary"></div>
    </div>


    @stack('scripts')



    <script>
        
        // Toggle mobile sidebar
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });
        
        // Close sidebar when clicking overlay
        document.getElementById('sidebar-overlay').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
            this.classList.add('hidden');
        });
        
        // Toggle navigation dropdowns
        document.querySelectorAll('.nav-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const submenu = this.parentElement.querySelector('.nav-submenu');
                const icon = this.querySelector('.fa-chevron-down');
                
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
        
        // Toggle notifications dropdown
        document.getElementById('notifications-button').addEventListener('click', function() {
            document.getElementById('notifications-dropdown').classList.toggle('hidden');
        });
        
        // Toggle user dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#notifications-button')) {
                document.getElementById('notifications-dropdown').classList.add('hidden');
            }
            
            if (!event.target.closest('#user-menu-button')) {
                document.getElementById('user-dropdown').classList.add('hidden');
            }
        });
        
        document.querySelectorAll('.nav-item').forEach(item => {
    const sectionId = item.getAttribute('data-section');

    if(sectionId){ // Only dynamic links
        item.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active from all nav items
            document.querySelectorAll('.nav-item').forEach(nav => {
                nav.classList.remove('text-primary', 'bg-gray-100', 'active');
            });

            // Add active to clicked item
            this.classList.add('text-primary', 'bg-gray-100', 'active');

            // Show corresponding content section
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
                section.classList.remove('active');
            });
            document.getElementById(sectionId).classList.remove('hidden');
            document.getElementById(sectionId).classList.add('active');
        });
    }
});

        
        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 26000, 31000, 38000, 35000, 42000],
                        backgroundColor: 'rgba(85, 107, 47, 0.1)',
                        borderColor: '#556b2f',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Category Chart
            // const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            // const categoryChart = new Chart(categoryCtx, {
            //     type: 'doughnut',
            //     data: {
            //         labels: ['Clothing', 'Shoes', 'Accessories'],
            //         datasets: [{
            //             data: [60, 25, 15],
            //             backgroundColor: [
            //                 '#556b2f',
            //                 '#6b8540',
            //                 '#809953'
            //             ],
            //             borderWidth: 0
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         plugins: {
            //             legend: {
            //                 position: 'bottom'
            //             }
            //         },
            //         cutout: '70%'
            //     }
            // });
        });
    
    </script>

    <!-- JavaScript -->
    {{-- <script>
        // Toggle mobile sidebar
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });
        
        // Close sidebar when clicking overlay
        document.getElementById('sidebar-overlay').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('-translate-x-full');
            this.classList.add('hidden');
        });
        
        // Toggle navigation dropdowns
        document.querySelectorAll('.nav-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const submenu = this.parentElement.querySelector('.nav-submenu');
                const icon = this.querySelector('.fa-chevron-down');
                
                submenu.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });
        
        // Toggle notifications dropdown
        document.getElementById('notifications-button').addEventListener('click', function() {
            document.getElementById('notifications-dropdown').classList.toggle('hidden');
        });
        
        // Toggle user dropdown
        document.getElementById('user-menu-button').addEventListener('click', function() {
            document.getElementById('user-dropdown').classList.toggle('hidden');
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#notifications-button')) {
                document.getElementById('notifications-dropdown').classList.add('hidden');
            }
            
            if (!event.target.closest('#user-menu-button')) {
                document.getElementById('user-dropdown').classList.add('hidden');
            }
        });
        
        // Navigation between sections
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Remove active class from all nav items
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('text-primary', 'bg-gray-100');
                    if (!navItem.classList.contains('nav-toggle')) {
                        navItem.classList.remove('active');
                    }
                });
                
                // Add active class to clicked nav item
                this.classList.add('text-primary', 'bg-gray-100', 'active');
                
                // Hide all content sections
                document.querySelectorAll('.content-section').forEach(section => {
                    section.classList.add('hidden');
                    section.classList.remove('active');
                });
                
                // Show the selected content section
                const sectionId = this.getAttribute('data-section');
                document.getElementById(sectionId).classList.remove('hidden');
                document.getElementById(sectionId).classList.add('active');
                
                // Close mobile sidebar after selection
                if (window.innerWidth < 1024) {
                    document.getElementById('sidebar').classList.add('-translate-x-full');
                    document.getElementById('sidebar-overlay').classList.add('hidden');
                }
            });
        });
        
        // Initialize charts
        document.addEventListener('DOMContentLoaded', function() {
            // Revenue Chart
            const revenueCtx = document.getElementById('revenueChart').getContext('2d');
            const revenueChart = new Chart(revenueCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue',
                        data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 26000, 31000, 38000, 35000, 42000],
                        backgroundColor: 'rgba(85, 107, 47, 0.1)',
                        borderColor: '#556b2f',
                        borderWidth: 2,
                        tension: 0.3,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
            
            // Category Chart
            // const categoryCtx = document.getElementById('categoryChart').getContext('2d');
            // const categoryChart = new Chart(categoryCtx, {
            //     type: 'doughnut',
            //     data: {
            //         labels: ['Clothing', 'Shoes', 'Accessories'],
            //         datasets: [{
            //             data: [60, 25, 15],
            //             backgroundColor: [
            //                 '#556b2f',
            //                 '#6b8540',
            //                 '#809953'
            //             ],
            //             borderWidth: 0
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         plugins: {
            //             legend: {
            //                 position: 'bottom'
            //             }
            //         },
            //         cutout: '70%'
            //     }
            // });
        });
    </script> --}}
</body>
</html>