document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const pageTitle = document.querySelector('.page-title');

    // --- Sidebar Toggle for Mobile ---
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
    }

    // --- Page Navigation Logic ---
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
    const contentPages = document.querySelectorAll('.content-page');

    navLinks.forEach(link => {
        // Skip links that just open submenus
        if (link.dataset.bsToggle === 'collapse') return;

        link.addEventListener('click', function (e) {
            e.preventDefault();
            const pageId = this.dataset.page;

            // Hide all pages
            contentPages.forEach(page => page.style.display = 'none');

            // Show the target page
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.style.display = 'block';
            }

            // Update active state in sidebar
            navLinks.forEach(navLink => navLink.classList.remove('active'));
            this.classList.add('active');

            // Update header title
            if (pageTitle) {
                pageTitle.textContent = this.textContent.trim();
            }

            // Close sidebar on mobile after click
            if (window.innerWidth < 992) {
                sidebar.classList.remove('open');
            }

            // If the vault page is shown, fetch gold price
            if (pageId === 'vault') {
                fetchGoldPrice();
            }
        });
    });

    // --- Chart Initialization (remains the same) ---
    const chartOptions = {
        responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } },
        scales: { x: { display: false }, y: { display: false } },
        elements: { line: { tension: 0.4 }, point: { radius: 0 } }
    };

    const incomeCtx = document.getElementById('incomeChart');
    if (incomeCtx) new Chart(incomeCtx, { type: 'line', data: { labels: ['هفته ۱', 'هفته ۲', 'هفته ۳', 'هفته ۴'], datasets: [{ label: 'درآمد', data: [10, 15, 12, 40], borderColor: 'rgba(25, 135, 84, 0.8)', backgroundColor: 'rgba(25, 135, 84, 0.1)', fill: true, borderWidth: 2 }] }, options: chartOptions });

    const expenseCtx = document.getElementById('expenseChart');
    if (expenseCtx) new Chart(expenseCtx, { type: 'line', data: { labels: ['هفته ۱', 'هفته ۲', 'هفته ۳', 'هفته ۴'], datasets: [{ label: 'مخارج', data: [5, 3.5, 4, 15.5], borderColor: 'rgba(220, 53, 69, 0.8)', backgroundColor: 'rgba(220, 53, 69, 0.1)', fill: true, borderWidth: 2 }] }, options: chartOptions });

    // --- Gold Price Simulation ---
    function fetchGoldPrice() {
        const loader = document.getElementById('gold-price-loader');
        const content = document.getElementById('gold-price-content');
        const priceValue = document.getElementById('gold-price-value');
        const updateTime = document.getElementById('gold-price-update-time');

        // Show loader, hide content
        loader.style.display = 'block';
        content.classList.add('d-none');

        // Simulate an API call
        setTimeout(() => {
            // In a real application, you would use fetch() to an API endpoint
            const simulatedPrice = (Math.random() * (3450000 - 3300000) + 3300000).toFixed(0);

            priceValue.textContent = new Intl.NumberFormat('fa-IR').format(simulatedPrice);
            updateTime.textContent = `بروزرسانی در: ${new Date().toLocaleTimeString('fa-IR')}`;

            // Hide loader, show content
            loader.style.display = 'none';
            content.classList.remove('d-none');

        }, 1500); // Simulate 1.5 second delay
    }
});
