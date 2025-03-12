/*
Algoritmo para a API de CEP
*/

var CEP = document.getElementById('CEP')

function consultarCEP() {    
    axios.get('https://viacep.com.br/ws/' + CEP.value + '/json/')
    .then(response => {
        const bairro = response.data.bairro || "Não informado";
        const rua = response.data.logradouro || "Não informado";
        const cidade = response.data.localidade || "Não informado";
        const complemento = response.data.complemento || "Não informado";
        const estado = response.data.uf || "Não informado";

        const resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `
        <p><strong>CEP:</strong> ${CEP.value}</p>
        <p><strong>Estado:</strong> ${estado}</p>
        <p><strong>Cidade:</strong> ${cidade}</p>
        <p><strong>Bairro:</strong> ${bairro}</p>
        <p><strong>Rua:</strong> ${rua}</p>
        <p><strong>Complemento:</strong> ${complemento}</p>
        `;
    })
    .catch(error => {
        console.log("Erro ao buscar CEP: ", error)
    })
}