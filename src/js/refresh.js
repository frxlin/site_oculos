
function redirecionarParaPagina(url) {
  window.location.href = url; 
}

// Adiciona o evento de clique para cada card
document.getElementById("card1").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos1.php"); 
});

document.getElementById("card2").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos2.php"); 
});

document.getElementById("card3").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos3.php"); 
});

document.getElementById("card4").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos4.php"); 
});

document.getElementById("card5").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos5.php"); 
});

document.getElementById("card6").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos6.php"); 
});

document.getElementById("card7").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos7.php"); 
});

document.getElementById("card8").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos8.php"); 
});

document.getElementById("card9").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos9.php"); 
});

document.getElementById("card10").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos10.php"); 
});

document.getElementById("card11").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos11.php"); 
});

document.getElementById("card12").addEventListener("click", function () {
  redirecionarParaPagina("../oculos/oculos12.php"); 
});
 

//animacao

const myObserver = new IntersectionObserver(entries => {
 
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('show');
    } else {
      entry.target.classList.remove('show');
    }
  });
});

const elements = document.querySelectorAll('.hidden');

elements.forEach((element) => myObserver.observe(element));





  








