function createCategoryChart(chartData) {
    const categoryData = {};
    chartData.forEach(product => {
        categoryData[product.Category] = (categoryData[product.Category] || 0) + 1;
    });

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(categoryData),
            datasets: [{
                label: 'Products per Category',
                data: Object.values(categoryData),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Number of Products'
                    }
                }
            }
        }
    });
} 