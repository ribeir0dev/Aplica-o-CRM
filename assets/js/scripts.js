//Códigos para trocar as tabelas da tela de login
document.getElementById('btn-login').onclick = function() {
    this.classList.add('active');
    document.getElementById('btn-criar').classList.remove('active');
    document.getElementById('form-login').style.display = '';
    document.getElementById('form-criar').style.display = 'none';
};
document.getElementById('btn-criar').onclick = function() {
    this.classList.add('active');
    document.getElementById('btn-login').classList.remove('active');
    document.getElementById('form-login').style.display = 'none';
    document.getElementById('form-criar').style.display = '';
};
////////////////////////////////////

//Código ajax para se manter na página após um cadastro bem sucedido
document.getElementById('form-criar').onsubmit = async function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    let caixa = document.getElementById('msg-criar-conta');

    caixa.innerHTML = '<div class="alert alert-info">Processando, aguarde...</div>';

    try {
        let res = await fetch('actions/criar_conta.php', {method: 'POST', body: formData});
        let data = await res.json();

        if (data.success) {
            caixa.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            form.reset();
        } else {
            let erros = (data.errors || ["Erro desconhecido."]).map(e => `<li>${e}</li>`).join('');
            caixa.innerHTML = `<div class="alert alert-danger"><ul>${erros}</ul></div>`;
        }
    } catch (erro) {
        caixa.innerHTML = '<div class="alert alert-danger">Erro ao conectar ao servidor!</div>';
    }
};
///////////////////////////////////////

//Código ajax para login
document.getElementById('form-login').onsubmit = async function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    let caixa = document.getElementById('msg-login');
    caixa.innerHTML = '<div class="alert alert-info">Validando...</div>';

    try {
        let res = await fetch('actions/login.php', {method: 'POST', body: formData});
        let data = await res.json();

        if (data.success) {
            caixa.innerHTML = '<div class="alert alert-success">Login realizado! Redirecionando...</div>';
            setTimeout(() => { window.location.href = data.redirect; }, 1000);
        } else {
            let erros = (data.errors || ["Erro desconhecido."]).map(e => `<li>${e}</li>`).join('');
            caixa.innerHTML = `<div class="alert alert-danger"><ul>${erros}</ul></div>`;
        }
    } catch (erro) {
        caixa.innerHTML = '<div class="alert alert-danger">Erro ao conectar ao servidor!</div>';
    }
};
///////////////////////////////////////