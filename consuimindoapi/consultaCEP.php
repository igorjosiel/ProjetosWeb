
<html>
  <head>
    <title></title>
  </head>

  <body>

    <button id="button" name="button">Buscar CEP</button>
    <input id="cep" name="cep" placeholder="Digite seu cep..." />
    <input id="logradouro" name="logradouro" placeholder="Logradouro..." />
    <input id="bairro" name="bairro" placeholder="Bairro..." />
    <input id="localidade" name="localidade" placeholder="Localidade..." />
    <input id="uf" name="uf" placeholder="UF..." />

  </body>

  <script type="text/javascript">

        document.getElementById('button').addEventListener('click', () => {
        var cep = document.getElementById("cep").value;

        var url = 'requisicao.php?cep='+cep;

        fetch(url, {  method: 'GET'  })
          .then(response => response.json())
          .then(json => {
               document.getElementById('cep').value = json.cep;
               document.getElementById('logradouro').value = json.logradouro;
               document.getElementById('bairro').value = json.bairro;
               document.getElementById('localidade').value = json.localidade;
               document.getElementById('uf').value = json.uf;
          })
     });

    </script>
</html>