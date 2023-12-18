const highestCity = document.getElementById('highestCity');
const highestBook = document.getElementById('highestBook');

const API_URL = ''

async function initialRender() {
    // const rawData = await fetch(API_URL);
    // const data = await rawData.json();

    // const city = "Denpasar";
    // const quantity = 12;
    const form = new FormData();
    form.append('email', 'admin@gmail.com');
    form.append('password', 'admin');

    const response = fetch('http://localhost:8081/api/highestBooked', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: form
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            highestCity.innerHTML = data.city;
            highestBook.innerHTML = `${data.quantity} Customers`;
        });
}

initialRender();