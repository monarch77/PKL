document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("klaimChart").getContext("2d");
    var klaimLabels = JSON.parse(document.getElementById("klaimLabels").value);
    var klaimData = JSON.parse(document.getElementById("klaimData").value);
    var gradient = ctx.createLinearGradient(0, 0, 0, 400);

    gradient.addColorStop(0, "rgba(255, 99, 132, 0.9)");
    gradient.addColorStop(1, "rgba(54, 162, 235, 0.9)");

    var klaimChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: klaimLabels,
            datasets: [
                {
                    label: "Total Klaim per Jenis",
                    data: klaimData,
                    backgroundColor: gradient,
                    borderColor: [
                        "rgba(255, 99, 132, 1)",
                        "rgba(54, 162, 235, 1)",
                    ],
                    borderWidth: 0.5,
                    borderRadius: 10,
                    hoverBackgroundColor: "rgba(255, 99, 132, 0.9)",
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                x: {
                    position: "bottom",
                    grid: {
                        display: false,
                    },
                    ticks: {
                        color: "#555",
                    },
                },
                y: {
                    grid: {
                        color: "rgba(200, 200, 200, 0.2)",
                    },
                    ticks: {
                        color: "#555",
                        beginAtZero: true,
                    },
                },
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#333", 
                        font: {
                            size: 14, 
                            family: "'Poppins', sans-serif", 
                        },
                    },
                },
                tooltip: {
                    backgroundColor: "rgba(0, 0, 0, 0.7)", 
                    titleFont: {
                        family: "'Poppins', sans-serif",
                        size: 14,
                    },
                    bodyFont: {
                        family: "'Poppins', sans-serif",
                        size: 12,
                    },
                    cornerRadius: 8, 
                },
            },
            animation: {
                duration: 1500, 
                easing: "easeInOutQuart", 
            },
        },
    });
});
