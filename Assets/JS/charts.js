// Define ctx in the global scope
let ctx;

// Wrap the initialization code in a function
function initChart() {
    ctx = document.getElementById('myChart');

    if (!ctx) {
        console.error('Canvas element not found');
        return;
    }

    fetch("/Letsers/Assets/Php/chart.php")
    .then((response)=>{
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then((data) => {
        if (data && data.length > 0) {
            createChart(data, 'line');
        } else {
            console.error('No data received');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function createChart(chartData, type) {
    try {
        new Chart(ctx, {
            type: type,
            data: {
                // Use product names as labels
                labels: chartData.map(row => row.ProductName),
                datasets: [{
                    label: 'Product Quantity',
                    data: chartData.map(row => row.Status || 0),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Quantity'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Products'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Product Inventory'
                    }
                }
            }
        });
    } catch (error) {
        console.error('Error creating chart:', error);
    }
}

function createStatusChart(chartData) {
    const statusCounts = {};
    chartData.forEach(product => {
        statusCounts[product.Status] = (statusCounts[product.Status] || 0) + 1;
    });

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: Object.keys(statusCounts),
            datasets: [{
                label: 'Product Status Distribution',
                data: Object.values(statusCounts),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Product Status Distribution'
                }
            }
        }
    });
}

// Call the initialization function when the document is ready
document.addEventListener('DOMContentLoaded', initChart);