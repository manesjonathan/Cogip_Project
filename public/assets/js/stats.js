const ctx = document.getElementById('stats');

getData().catch((error) => {
    ctx.fillText("Something went wrong...");   
    console.error(error);
});

async function getData() {
    const data = {};

    await fetch('https://cogip.jonathan-manes.be/get-invoices')
            .then(res => res.json())
            .then(values => {
                data['invoices'] = values['invoices'].length;
            });

    await fetch('https://cogip.jonathan-manes.be/get-contacts')
            .then(res => res.json())
            .then(values => {
                data["contacts"] = values['contacts'].length;
            });

    await fetch('https://cogip.jonathan-manes.be/get-companies')
            .then(res => res.json())
            .then(values => {
                data["companies"] = values['companies'].length;
            });

    new Chart(ctx, {
        type: 'bar',
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                },
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
        data: {
        labels: ['Invoices', 'Contacts', 'Companies'],
        datasets: [{
                data: [data["invoices"], data["contacts"], data['companies']],
                borderWidth: 1,
                backgroundColor: ["rgb(59 130 246)", "rgb(191 219 254)", "rgb(254 202 202)"]
            }]
        },
    });
}
