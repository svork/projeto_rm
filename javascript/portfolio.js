// Esta função recebe uma imagem pequena como parâmetro e exibe a imagem grande
function mostrar_foto(foto_pequena){
  // Variável para receber a foto grande
  var foto = document.getElementById("foto_grande");

  // Variável para guardar a legenda da foto
  var legenda = document.getElementById("legenda_foto");

  // Foto Grande recebe o endereço da foto pequena
  foto.src = foto_pequena.src;

  // Legenda da foto grande recebe a legenda da foto pequena
  legenda.innerHTML = foto_pequena.alt;

  // Exibir a foto grande como um elemento em bloco
  foto.parentElement.style.display = "block";
}
