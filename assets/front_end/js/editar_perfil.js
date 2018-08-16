
    $('.ui.form')
        .form({
            fields: {
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