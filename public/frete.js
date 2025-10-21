// Função para listar os fretes
        async function listarFretes() {
            const response = await fetch('http://localhost:3000/api/fretes');
            const fretes = await response.json();
            
            const tableBody = document.querySelector("#fretesTable tbody");
            tableBody.innerHTML = "";
            
            fretes.forEach(frete => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${frete.origem}</td>
                    <td>${frete.destino}</td>
                    <td>${frete.valor}</td>
                    <td>${frete.prazo}</td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Função para cadastrar um frete
        document.getElementById("freteForm").addEventListener("submit", async (e) => {
            e.preventDefault();

            const origem = document.getElementById("origem").value;
            const destino = document.getElementById("destino").value;
            const valor = parseFloat(document.getElementById("valor").value);
            const prazo = document.getElementById("prazo").value;

            const response = await fetch('http://localhost:3000/api/fretes', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ origem, destino, valor, prazo })
            });

            const result = await response.json();
            if (response.ok) {
                alert("Frete cadastrado com sucesso!");
                listarFretes();  // Atualiza a lista de fretes
            } else {
                alert("Erro ao cadastrar frete!");
            }

            // Limpa o formulário
            document.getElementById("freteForm").reset();
        });

        // Carrega os fretes na primeira vez
        listarFretes();