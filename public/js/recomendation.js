const highestCity = document.getElementById('highestCity');
const highestBook = document.getElementById('highestBook');

async function initialRender() {
    const form = new FormData();
    form.append('email', 'admin@gmail.com');
    form.append('password', 'admin');
    const rawData = await fetch('http://localhost:8080/api/highestBooked', {
        method: "post",
        body: form
    });
    const data = await rawData.json();

    if (data) {
        highestCity.innerHTML = data.city;
        highestBook.innerHTML = `${data.quantity} Customers`;
    }
}

initialRender();