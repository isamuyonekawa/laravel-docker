import { Chart, registerables } from 'chart.js';
Chart.register(...registerables);

console.log('Hello, Blade!');

const nameForm = document.getElementById('nameForm');
if (nameForm) {
    nameForm.onsubmit = function() {
        const name = (document.querySelector('input[name="name"]') as HTMLInputElement).value;
        const nickname = (document.querySelector('input[name="nickname"]') as HTMLInputElement).value;
        return confirm(`Name: ${name}\nNickname: ${nickname}\n送信しますか？`);
    };
}

const ctx = document.getElementById('myChart') as HTMLCanvasElement;
if (ctx) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}
