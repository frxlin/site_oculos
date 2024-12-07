const form = document.querySelector("#form"); // aqui eu crio uma constante na qual ela vai pegar um id do html( form)

form.addEventListener("submit", (event) => {
    event.preventDefault(); // aqui eu crio uma funçao que vai pegar o evento de enviar executa ja  o preventDefault ( Evita que a página seja recarregada ou redirecionada, permitindo que você controle manualmente o que acontecerá após o usuário tentar enviar o formulário.)


    const Email = document.querySelector("#email"); // vou receber esse campo
    const Senha = document.querySelector("#senha");// vou receber esse campo


    //crio uma funçao dando um limite minimo de caracter dde senha
    function validSenha(senha, min) {
        return senha.length >= min
    }

    // aqui eu utilizo o regex para fazxxer a validaçao do email
    function validEmail(Email) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}/g
        return regex.test(Email)
    }

    // crio um if no qual informo ao usaruio que se a senha tiver menos de 8 digitos, nao ira funfa
    if (!validSenha(Senha.value, 8)) {
        alert("A senha precisa ter no minimo 8 digitos!")
        return
    }
    // aqui eu falo que se o campo email for vazio e o email valido  for diferente do que foi registrado ele ira de F
    if (Email.value === "" || !validEmail(Email.value)) {
        alert("Por gentileza, coloque o email correto!")
        return;

    }
}) 

