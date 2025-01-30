// Define multiple canvas contexts
let inventoryCtx, salesCtx, categoryCtx;

function initDashboard() {
    // Initialize contexts
    inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
    salesCtx = document.getElementById('salesChart').getContext('2d');
    categoryCtx = document.getElementById('categoryChart').getContext('2d');

    // Fetch data
    fetch("/Letsers/Assets/Php/dashboard-data.php")
    .then(response => response.json())
    .then(data => {
        createInventoryChart(inventoryCtx, data);
        createSalesChart(salesCtx, data);
        createCategoryChart(categoryCtx, data);
    })
    .catch(error => console.error('Error:', error));
}

function createInventoryChart(ctx, data) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => item.ProductName),
            datasets: [{
                label: 'Current Stock',
                data: data.map(item => item.StockLevel),
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Current Inventory Levels'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Stock Level'
                    }
                }
            }
        }
    });
}

function createSalesChart(ctx, data) {
    // Group sales by date
    const salesByDate = {};
    data.forEach(item => {
        const date = new Date(item.SaleDate).toLocaleDateString();
        salesByDate[date] = (salesByDate[date] || 0) + item.Quantity;
    });

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(salesByDate),
            datasets: [{
                label: 'Daily Sales',
                data: Object.values(salesByDate),
                borderColor: 'rgba(255, 99, 132, 1)',
                tension: 0.1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Sales Trend'
                }
            }
        }
    });
} 