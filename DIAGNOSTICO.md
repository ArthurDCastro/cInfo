# Diagnóstico do cInfo

Revisão inicial em 11/11/2026. Objetivo: preservar o trabalho de 2018, corrigindo
impedimentos de instalação e pequenos erros de execução, sem trocar o framework,
o layout, o banco ou as bibliotecas da interface.

## Escopo examinado

- Entrada `index.php`, regras Apache, configuração e scripts de importação/exportação.
- Controllers de páginas e AJAX, engine de views, modelos e cinco classes CRUD.
- Views, JavaScripts/CSS próprios, referências a arquivos locais e bibliotecas incluídas.
- Seis coleções JSON, CSV histórico e raspador Python.
- Estrutura do repositório e dependências de execução. As bibliotecas de terceiros
  foram identificadas, sem uma auditoria linha a linha de seu código.

A aplicação é PHP sem framework externo, com uma organização MVC própria. Usa a
extensão nativa MongoDB, GD no upload e bibliotecas de interface já versionadas.
O raspador e o CSV não são necessários para executar o site com os JSON existentes.

## Correções aplicadas

| Problema encontrado | Ajuste |
| --- | --- |
| Modelos ignoravam URI e nome de banco configurados | Conexão e nomes de coleções passam por `config/Database.php`, inclusive no AJAX. |
| Configuração exigia alterar valores versionados | Arquivo local opcional, exemplo e variáveis de ambiente; padrões originais preservados. |
| Roteamento dependia literalmente de `http://localhost` | Caminho da requisição separado do host e da query string, respeitando a base configurada. |
| Métodos internos podiam ser tratados como páginas | Despacho limitado aos métodos públicos de página declarados no Controller; remoção do `eval` de despacho. |
| Rotas desconhecidas não respondiam HTTP 404 | Resposta 404 efetiva mantendo a view original. |
| Servidor PHP local sem roteador explícito | Adicionado `router.php`, sem alterar o fluxo do Apache. |
| Views sem dados recebiam string e falhavam no PHP 8 | Padrão alterado para array. |
| Variáveis de views eram montadas com `eval` | Uso de `extract` com proteção das variáveis locais. |
| Includes dependiam do diretório corrente | Entradas, engine e includes dos endpoints usam caminhos a partir de `__DIR__`. |
| `crypt()` sem salt impedia cadastro/troca de senha no PHP 8 | Novas senhas usam `password_hash`; verificação usa `password_verify`, compatível com hashes crypt reconhecidos pelo PHP. |
| Saída de depuração no cadastro quebrava redirecionamentos | Removida impressão de e-mails pelo CRUD. |
| Cadastro dependia do nome do botão no POST e tinha regra JS incompleta | Cadastro processado pelo método POST, validação JS corrigida e validação de campos no servidor. |
| Cadastro duplicado mostrava confirmação de sucesso | Exibe erro, preserva nome/e-mail e só redireciona após criar a conta. |
| Login desconhecido e formulário vazio geravam avisos | Retorno nulo explícito e valores opcionais protegidos. |
| Feed vazio retornava null e quebrava `count()` | Retorno de lista vazia. |
| Função sem gastos tentava acessar item inexistente | Retorno de lista vazia e inicialização da lista de funções. |
| Ordenadores retornavam booleanos | Retorno inteiro, evitando avisos de depreciação que contaminavam JSON. |
| Cabeçalho JSON escrito `Conten-type` | Corrigido para `Content-Type`; consumidores JS aceitam a resposta já decodificada pelo jQuery. |
| Iteração do seletor incluía propriedades de HTMLCollection | Iteração limitada aos elementos da coleção. |
| Link `perfil` sem identificador gerava aviso | Usa o usuário conectado quando não há identificador na rota. |
| Imagem padrão apontava para PNG ausente | Referências passam a usar `image.jpg`, já presente. |
| Referências a JS/CSS inexistentes na página inicial/head | Removidas as chamadas a `assets/charts/inicio.js` e `rodape.css`. |
| Importação apagava banco sem proteção | Validação prévia de todos os JSON, recusa de banco preenchido sem `--force`, banco configurável e escrita em lote. |
| Importação/exportação acessíveis via navegador | Restritas ao terminal; resposta HTTP 403 no navegador. |
| Exportação sobrescrevia snapshots sem indicação explícita | Exige `--force`, verifica erros de escrita e remove `_id` técnico antes de exportar. |
| Propriedade dinâmica no importador | Propriedade de conexão declarada para PHP moderno. |

## Validação realizada

Ambiente isolado: PHP 8.3 CLI com extensão MongoDB e servidor MongoDB 8.0,
conectados em uma rede Docker temporária. O projeto foi montado somente para
leitura. Foi usado um nome de banco diferente do padrão para testar se a
configuração era respeitada. Nenhum banco local existente foi acessado.

- Os 52 arquivos PHP passaram na verificação de sintaxe.
- Os 16 JavaScripts próprios passaram em `node --check`.
- Os seis JSON foram decodificados e importados: 4079 documentos originais.
- Testes HTTP: início com os gráficos de exemplo, Sobre, cadastro, login,
  confirmação de cadastro, query string e caminho antigo `index.php/sobre`.
- Cadastro e login reais de uma conta temporária, cookie de login e logout.
- Feed vazio, perfil com/sem identificador e página de criação autenticados.
- Rotas desconhecidas e métodos internos retornam 404; scripts de manutenção
  retornam 403 quando acessados por HTTP; arquivo estático continua acessível.
- Busca AJAX retorna JSON; função inexistente retorna lista vazia.
- Função histórica real carrega gastos; prévia de gráfico retorna JSON; salvar
  gráfico, abrir sua edição e publicar duas vezes funciona sem avisos PHP.
- Feed e perfil com publicações renderizam sem avisos de ordenação.
- Importação repetida sem `--force` foi recusada sem substituir dados.
- Exportação sem `--force` foi recusada. Exportação com `--force` foi testada com
  os destinos substituídos por memória temporária, sem sobrescrever os JSON originais.
- `git diff --check` sem problemas de espaços.

Os testes HTTP não substituem uma revisão visual no navegador. Não foram
validados o Apache/XAMPP, o upload com GD, a raspagem externa, todos os fluxos
sociais nem todas as versões de PHP/MongoDB. O ambiente de teste não tinha GD.

## Pendências para próximas mudanças pequenas

1. **Autenticação e autorização.** O sistema confia no cookie `login` como
   identidade. Ele pode ser alterado pelo cliente. É necessário usar sessão de
   servidor e conferir autorização nos endpoints de escrita. Esta revisão mantém
   o fluxo original; não torna o sistema adequado para publicação aberta.
2. **Validação e saída HTML.** Há dados de usuários renderizados sem escape,
   validação concentrada no JavaScript e ausência de proteção CSRF nos formulários.
3. **Fotos de perfil.** O upload aceita PNG/GIF, mas tenta decodificar tudo como
   JPEG. Também pode emitir saída antes de redirecionar. Revisar formatos, nomes,
   diretório e limites; manter JPEG nos testes manuais iniciais.
4. **Exclusão de usuário.** `UserCrud::delete` insere um documento em vez de
   removê-lo. Não foi alterado porque o fluxo de exclusão não foi validado nesta etapa.
5. **Registros inexistentes/inconsistentes.** Alguns métodos assumem que dados,
   gráficos e publicações sempre existem. Tratar retornos vazios antes de usar
   propriedades, especialmente nos endpoints de escrita.
6. **Arquivos/links ausentes.** `assets/files/img/sobre.jpeg` não está no
   repositório. A tela de login aponta para a rota `transparencia`, inexistente.
   A imagem original não foi substituída por uma imagem diferente.
7. **Importação/exportação.** Sem transação entre coleções; falhas podem deixar
   trabalho parcial. `--force` é destrutivo. Uso concorrente não é suportado.
8. **Raspador Python.** Usa `null` em vez de `None`, acumula referências da própria
   lista e tem tratamentos de exceção que podem deixar laços sem avanço. Depende
   do HTML/endereço do portal usado em 2018. Mantido como artefato histórico;
   precisa ser revisado separadamente antes de execução.
9. **Bibliotecas antigas.** jQuery, Semantic UI e Chart.js foram preservados.
    Atualizações devem ser avaliadas separadamente para não alterar comportamento
    e aparência. Não houve auditoria de vulnerabilidades dessas dependências.
10. **Artefatos históricos.** DLL antiga do MongoDB e `documents/csv/teste.php`
    permanecem. Esse script de teste tem conexão fixa e insere funções, podendo
    duplicar dados; não faz parte da instalação documentada. Há também código
    legado com `eval` em `GetClass` e métodos de engine que não são usados pelo
    novo despacho de rotas.

## Próxima verificação manual

Seguir [INSTALACAO.md](INSTALACAO.md), abrir o navegador e conferir aparência,
interação dos gráficos e upload JPEG. Depois, priorizar sessões/autorização,
validação de uploads, em alterações separadas para facilitar a revisão.

## Correção adicional do cadastro

O envio programático pelo Semantic UI não inclui necessariamente o nome do
botão. O Controller antes exigia esse nome no POST e apenas reapresentava o
formulário. Agora reconhece o método POST e valida nome, nome de exibição, e-mail
e senha no servidor. A regra incompleta do botão foi removida do JavaScript.
Duplicidades exibem uma mensagem, mantendo os campos preenchidos (exceto senha).

Regressão executada com PHP 8.5.4 local, numa cópia temporária e banco exclusivo:
cadastro sem o campo do botão, login com a nova conta, duplicidade de e-mail e
login, escape dos valores reapresentados, campos inválidos e POST vazio. Todos
passaram; banco temporário removido ao final. A interação visual no navegador
ainda deve ser conferida após recarregar o JavaScript.
