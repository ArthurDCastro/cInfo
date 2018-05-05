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
            nome_exib: {
                identifier: 'nome_exib',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor insira um login!'
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
            cadastro: {
                identifier: 'cadastro',
                rules: [
                    {
                        prompt : '...'
                    }
                ]
            },
            password: {
                identifier: 'password',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor insira uma senha'
                    },
                    {
                        type   : 'minLength[6]',
                        prompt : 'Sua senha deve ter no mínimo {ruleValue} caracteres'
                    }
                ]
            }
        }
    })
;