const form = document.querySelector("#form");

form.addEventListener("submit", event => {
    event.preventDefault();

    const nome = document.querySelector("#Nome");

    const email = document.querySelector("#Email");
    const senha = document.querySelector("#Senha");
    const ConfirmSenha = document.querySelector("#ConfirmSenha");

    // Limite de senha
    function limitSenha(senha, min) {
        return senha.length >= min;
    }

    // Apenas letras no nome
    function onlyletrasInName(nome) {
        const regex = /^[A-Za-zá-úÁ-Ú\s]+$/g;  // Aceita letras e espaços, incluindo acentos
        return regex.test(nome);
    }

    // Regex para validar email
    function validemail(email) {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
        return regex.test(email);
    }

    // Exibindo o limite de senha
    if (!limitSenha(senha.value, 8)) {
        alert("A senha precisa ter no mínimo 8 dígitos");
        return;
    }

    // Apenas letras no nome
    if (nome.value === "" || !onlyletrasInName(nome.value)) {
        alert("Por favor, coloque apenas letras no nome");
        return;
    }

    // Apenas letras no último nome

    // Validando o email
    if (email.value === "" || !validemail(email.value)) {
        alert("Por favor, digite seu email corretamente!");
        return;
    }

    // Verificação de senha e confirmação de senha
    if (senha.value !== ConfirmSenha.value) {
        alert("As senhas devem ser iguais");
        return;
    }

    // Se passar por todas as validações, o formulário pode ser submetido
    form.submit(); // O submit do formulário será disparado se tudo estiver certo
});
