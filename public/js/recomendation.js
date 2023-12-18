const highestCity = document.getElementById('highestCity');
const highestBook = document.getElementById('highestBook');

const API_URL = ''

async function initialRender() {
    // const rawData = await fetch(API_URL);
    // const data = await rawData.json();

    // const city = "Denpasar";
    // const quantity = 12;

    const response = fetch('https://smart-travel-app.000webhostapp.com/api/highestBooked', {
        method: 'POST',
        // headers: {
        //     'Content-Type': 'application/json'
        // }
    }).then(response => response.json())
        .then(data => {
            console.log(data);
            highestCity.innerHTML = data.city;
            highestBook.innerHTML = `${data.quantity} Customers`;
        });
}

initialRender();