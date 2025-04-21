 // async function fetchData() {
//   const tableBody = document.getElementById('people-table');
//   tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Carregando dados...</td></tr>';
//   try {
//     const response = await axios.get('https://dummyjson.com/users');
//     const users = response.data.users; // A lista de usuários vem no atributo 'users'
//     tableBody.innerHTML = '';
//     users.forEach(user => {
//       const row = `
//         <tr>
//           <td>${user.id}</td>
//           <td>${user.firstName} ${user.lastName}</td>
//           <td>${user.email}</td>
//           <td><img src="${user.image}" alt="Avatar" class="img-thumbnail" style="max-width: 50px;"></td>
//         </tr>
//       `;
//       tableBody.innerHTML += row;
//     });
//   } catch (error) {
//     tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Erro ao carregar os dados.</td></tr>';
//     console.error(error);
//   }
// }

// document.getElementById('reload').addEventListener('click', fetchData);

// // Carregar dados inicialmente
// fetchData();

/*

async function fetchData() {
  const tableBody = document.getElementById('people-table');
  tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Carregando dados...</td></tr>';
  try {
    const response = await fetch('https://dummyjson.com/users');
    if (!response.ok) {
      throw new Error('Erro ao carregar os dados');
    }
    const data = await response.json();
    const users = data.users; // A lista de usuários vem no atributo 'users'
    tableBody.innerHTML = '';
    users.forEach(user => {
      const row = `
        <tr>
          <td>${user.id}</td>
          <td>${user.firstName} ${user.lastName}</td>
          <td>${user.email}</td>
          <td><img src="${user.image}" alt="Avatar" class="img-thumbnail" style="max-width: 50px;"></td>
        </tr>
      `;
      tableBody.innerHTML += row;
    });
  } catch (error) {
    tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Erro ao carregar os dados.</td></tr>';
    console.error(error);
  }
}

document.getElementById('reload').addEventListener('click', fetchData);

// Carregar dados inicialmente
fetchData();

*/

async function fetchData() {
  const tableBody = document.getElementById('people-table');
  tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Carregando dados...</td></tr>';
  
  try {
      const response = await fetch('http://127.0.0.1:8000/api/user');
      if (!response.ok) {
          throw new Error('Erro ao carregar os dados');
      }
      
      const data = await response.json();
      const users = data.users; // A lista de usuários vem no atributo 'users'
      tableBody.innerHTML = '';
      console.log(data);
      

      users.forEach(function(user) {
          const row = `
              <tr>
                  <td>${user.id}</td>
                  <td>${user.name}</td>
                  <td>${user.email}</td>
                  <td>${user.updated_at}</td>
              </tr>
          `;
          tableBody.innerHTML += row;
      });

  } catch (error) {
      tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Erro ao carregar os dados.</td></tr>';
      console.error(error);
  }
}

document.getElementById('reload').addEventListener('click', fetchData);

// Carregar dados inicialmente
fetchData();


