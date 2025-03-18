async function fetchData() {
    const tableBody = document.getElementById('car-table');
    tableBody.innerHTML = '<tr><td colspan="5" class="text-center">Carregando carros...</td></tr>'

    try {
        const response = await fetch('https://carangas.herokuapp.com/cars')

        const data = await response.json();
        const cars = data;
        console.log(cars);

        tableBody.innerHTML = '';

        cars.reverse().forEach(function(car) {
            const fuelText = getFuelName(car.gasType);
            
            const row = `
            <tr data-id="${car._id}">
                <td>${car.brand}</td>   
                <td>${car.name}</td>   
                <td>${car.price}</td>   
                <td>${fuelText}</td>
                <td>
                <button class="btn btn-danger btn-sm" id="delete-btn" data-id="${car._id}">Deletar</button>
                </td>
            `;
            tableBody.innerHTML += row;
        })
        



    } catch (error) {
        
    }

}

function getFuelName(value) {
    const fuelTypes = {
        "0" : "Desconhecido",
        "1" : "Gasolina",
        "2" : "Etanol + Gasolina",
        "3" : "Eletricidade",
        "4" : "Etanol",
    };
    return fuelTypes[value] || " - ";
}


async function addCar() {
    // event.preventDefault();

    var data = {
            "brand": "Volvo",
            "gasType": 2,
            "name": "XC 60",
            "price": 150000
    }

    try {
        const response = await fetch('https://carangas.herokuapp.com/cars' ,{
            method: "POST",
            headers: {
                "Content-Type": "application/json"
        },
            body: JSON.stringify(data)
    });

    console.log("Carro adicionado com sucesso");

    fetchData();

    } catch (error) {
        console.error(error);
    }

}

document.getElementById("carForm").addEventListener("submit", addCar())

document.addEventListener('click', function(event) {
    if (event.target.id.startsWith('delete-btn')) {
        const carId = event.target.getAttribute('data-id');

        deleteCar(carId);
    }
})

async function deleteCar(carId) {
    try {
        const response = await fetch(`https://carangas.herokuapp.com/cars/${carId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json"
            }
        });

        if (!response.ok) {
            throw new Error("Erro ao Deletar o carro");
        }

        console.log("Carro deletado com sucesso!");
        
        location.reload()

    } catch (error) {
        console.error(error);
    }
}


fetchData()