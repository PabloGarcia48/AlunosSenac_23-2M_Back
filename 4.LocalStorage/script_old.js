document.addEventListener("DOMContentLoaded", () => {
    const carForm = document.getElementById("car-form");
    const carList = document.getElementById("car-list");

    // Carregando os carros do LocalStorage
    const loadCars = () => {
        const cars = JSON.parse(localStorage.getItem("cars")) || [];
        carList.innerHTML = "";
        cars.forEach((car, index) => addCarToList(car, index));
    };

    // Salvar os carros no Local Storage
    const saveCars = (cars) => {
        localStorage.setItem("cars", JSON.stringify(cars));
    };

    // Adicionar uma linha na tabela, com o carro criado
    const addCarToList = (car, index) => {
        const li = document.createElement("li")
        li.className = "list-group-item d-flex justify-content-between align-itens-center";
        li.innerHTML = `
        <span>
            <strong>${car.model}</strong> - ${car.year} - R$ ${car.price}
            </span>
            <button class="btn btn-danger btn-sm" onclick="deleteCar(${index})">Excluir</button>
        `;
        carList.appendChild(li)
    };

    // adicionar um carro novo

    carForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const model = document.getElementById("model").value;
        const year = parseInt(document.getElementById("year").value);
        const price = parseFloat(document.getElementById("price").value);

        const cars = JSON.parse(localStorage.getItem("cars")) || [];
        cars.push({model, year, price});
        saveCars(cars);
        loadCars();
        carForm.reset();
    })

    //Deletar um carro
    window.deleteCar = (index) => {
        const cars = JSON.parse(localStorage.getItem("cars")) || [];
        cars.splice(index, 1);
        saveCars(cars);
        loadCars();
    }

    loadCars();

})