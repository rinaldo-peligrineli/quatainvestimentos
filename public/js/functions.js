function redirect() {
    $('body').on('click', '.alert-confirm', function(evt) {
        window.location.href = '/'; 
    });
}
function cadastrarUsuario(){
    var token = $("input[name='_token']").val();
    
    fetch('/usuarios/store', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify({
                id: $('#id').val(),
                nome: $('#nome').val(),
                email: $('#email').val(),
                senha: $('#senha').val(),
                nivel_acesso: $('#nivel_acesso').val(),
                status: $('#status').val(),
                idade: $('#idade').val(),
                saldo: $('#saldo').val(),
                observacao: $('#observacao').val(),
            })
        }).then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
            
        })
        .catch(function(error) {
            console.log(error);
    });
}

function deletarRegistro(usuarioId){
    var token = $("input[name='_token']").val();
    
    fetch('/usuarios/delete/' + usuarioId , {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'post',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: usuarioId,
               
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
        }).catch(function(error) {
            console.log(error);
    });
}

function atualizarUsuario(){
    var token = $("input[name='_token']").val();
    fetch('/usuarios/update', {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
                },
            method: 'put',
            redirected: 'follow',
            credentials: "same-origin",
            body: JSON.stringify({
                id: $('#id').val(),
                nome: $('#nome').val(),
                email: $('#email').val(),
                senha: $('#senha').val(),
                nivel_acesso: $('#nivel_acesso').val(),
                status: $('#status').val(),
                idade: $('#idade').val(),
                saldo: $('#saldo').val(),
                observacao: $('#observacao').val(),
            })
        })
        .then((response) => response.json()) 
        .then((text) => {
            $('#modal-msg-info #txt-info').text(text.data);
            $('#modal-msg-info').modal('show');
            redirect();  
            
        }).then(response => {
                            
        })
        .catch(function(error) {
            console.log(error);
    });
}