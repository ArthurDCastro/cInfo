$('.ui.form')
    .form({
        fields: {
            email: {
                identifier: 'email',
                rules: [
                    {
                        type   : 'empty',
                        prompt : 'Por favor insira um email!'
                    }
                ]
            },
            login: {
                identifier: 'login',
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
                        type   : 'minLength[4]',
                        prompt : 'Sua senha deve ter no mínimo {ruleValue} caracteres'
                    }
                ]
            }
        }
    })
;