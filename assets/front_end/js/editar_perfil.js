
    $('.ui.form')
        .form({
            fields: {
                senha_nova: 'empty',
                nome: {
                    identifier: 'nome',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Por favor insira um nome!'
                        }
                    ]
                },
                email: {
                    identifier: 'email',
                    rules: [
                        {
                            type   : 'empty',
                            prompt : 'Por favor insira um email!'
                        }
                    ]
                },
                salvar: {
                    identifier: 'salvar',
                    rules: [
                        {
                            prompt : '...'
                        }
                    ]
                }
            }
        })
    ;
    if( $('.ui.form').form('is valid', 'senha_nova') < 1) {
        alert('aa')
    }