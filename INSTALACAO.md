# cInfo — instalação e execução local

Projeto de 2018 de visualização de gastos públicos, com PHP, MongoDB, jQuery,
Semantic UI e Chart.js. A estrutura e as bibliotecas de interface originais foram
mantidas. Veja também [o diagnóstico do projeto](DIAGNOSTICO.md).

## 1. Requisitos

- PHP com extensões `mongodb` e `gd`; esta última é usada nas fotos de perfil.
- Um servidor MongoDB acessível.
- Navegador. Para o servidor Apache, `mod_rewrite` e leitura de `.htaccess`.

A referência de teste desta revisão é PHP 8.3. O código original usa recursos do
PHP 7.1, mas isso não significa que versões antigas sejam recomendadas nem que
todas as versões posteriores tenham sido testadas.

Não é necessário executar Composer, npm, Bower ou o raspador Python para abrir o
site: as bibliotecas de interface e os dados históricos já estão no repositório.

### PHP no Ubuntu/Debian

Nos sistemas que oferecem estes pacotes:

```bash
sudo apt update
sudo apt install php-cli php-mongodb php-gd
php -v
php --ini
php -r 'foreach (["mongodb", "gd"] as $e) { echo $e, ": ", extension_loaded($e) ? "OK" : "AUSENTE", PHP_EOL; }'
```

Verifique a versão instalada pelo sistema. Em outros sistemas ou se o pacote não
estiver disponível, siga a [instalação oficial da extensão MongoDB](https://www.php.net/mongodb.installation).
O projeto usa diretamente `MongoDB\Driver`, sem a biblioteca de alto nível do Composer.

### Windows/XAMPP

Use um PHP compatível e habilite `gd` e `mongodb` no `php.ini` correspondente ao
Apache e ao terminal. A DLL deve corresponder à versão do PHP, arquitetura e
modalidade TS/NTS. Não reutilize automaticamente a DLL de 2018 que está em
`documents/mongoDB/dll/`. Reinicie o Apache após alterar extensões. Use `php --ini`
para conferir qual configuração o terminal está usando.

## 2. Preparar o MongoDB

Se você já tem um MongoDB local, use sua URI na próxima etapa. Como alternativa,
com Docker instalado e funcionando, crie um banco local persistente:

```bash
docker run -d --name cinfo-mongo -p 127.0.0.1:27017:27017 -v cinfo-mongo-data:/data/db mongo:8.0
```

Se a porta 27017 estiver ocupada, aproveite o serviço existente ou escolha outra
porta e ajuste a URI. Para parar e iniciar esse contêiner depois:

```bash
docker stop cinfo-mongo
docker start cinfo-mongo
```

Esse exemplo destina-se ao desenvolvimento local e não configura autenticação.
Se PHP também estiver em um contêiner, `localhost` aponta para o próprio
contêiner; use uma rede compartilhada e o nome do serviço MongoDB na URI.

## 3. Configurar o projeto

Na raiz do projeto:

```bash
cp config/config.local.example.php config/config.local.php
```

No Windows, faça a cópia pelo explorador de arquivos. Edite a cópia:

```php
<?php
$config['base_url'] = 'http://localhost:8000/';
$config['banco']['uri'] = 'mongodb://localhost:27017';
$config['banco']['nomeDB'] = 'db_cinfo';
```

Para XAMPP/Apache com o projeto na pasta `htdocs/cInfo`, use
`http://localhost/cInfo/`. A URL precisa corresponder ao protocolo, porta e
subpasta utilizados no navegador. A barra final é normalizada automaticamente.
O arquivo local é ignorado pelo Git.

Também são aceitas as variáveis de ambiente `CINFO_BASE_URL`,
`CINFO_MONGODB_URI` e `CINFO_DB_NAME`. Os valores de `config.local.php`, quando
presentes, têm prioridade sobre as variáveis e sobre os padrões históricos.
O projeto não carrega arquivos `.env` automaticamente.

## 4. Importar os dados históricos

Com o MongoDB iniciado e a extensão PHP habilitada:

```bash
php inciarProjeto.php
```

O nome `inciarProjeto.php` contém a grafia histórica e foi preservado.
A importação lê seis listas JSON em `documents/mongoDB/db/`:

| Coleção | Documentos originais |
| --- | ---: |
| user | 7 |
| grafico | 16 |
| dados | 3987 |
| funcoes | 25 |
| seguidores | 43 |
| postagem | 1 |

Os exemplos da página inicial dependem dos gráficos dessa importação.
Nenhum dado foi importado automaticamente no seu banco durante a revisão.
Crie uma conta pela tela de cadastro para testar; não há senha de demonstração
documentada para os usuários históricos.

O script recusa a importação se alguma coleção de destino já contiver dados.
Para substituir dados deliberadamente, faça um backup antes e use:

```bash
php inciarProjeto.php --force
```

**Esse comando apaga o conteúdo das seis coleções configuradas antes de
reinseri-lo.** A importação valida todos os JSON antes da primeira escrita,
mas não é uma transação: uma falha de conexão pode deixar importação parcial.
Não execute importações concorrentes nem com o site recebendo escritas.

## 5. Iniciar o site

### Servidor PHP local

Execute na raiz do projeto, com `base_url` em `http://localhost:8000/`:

```bash
php -S localhost:8000 router.php
```

Abra <http://localhost:8000/>. Use Ctrl+C para parar.
O `router.php` encaminha as rotas para `index.php` e deixa arquivos existentes,
inclusive os endpoints AJAX, serem servidos normalmente.
O [servidor embutido do PHP](https://www.php.net/commandline.webserver) é destinado
a desenvolvimento e demonstrações em ambientes controlados.

### Apache/XAMPP

Coloque o projeto no diretório servido pelo Apache e ajuste `base_url`.
Habilite `mod_rewrite` e permita as regras do `.htaccess` no diretório, por
exemplo com `AllowOverride FileInfo` na configuração do Apache. No Ubuntu,
`sudo a2enmod rewrite` habilita o módulo; reinicie o Apache após configurar.
O servidor Apache não usa `router.php`.

## 6. Conferir o funcionamento

1. Abra a página inicial e confira os três gráficos históricos.
2. Visite `sobre`, `cadastro` e `login`.
3. Cadastre uma conta e entre com o e-mail e senha escolhidos.
4. Abra `feed`, `perfil` e `crie`.
5. Selecione uma função e gastos, visualize e salve um gráfico.
6. Confira a busca de usuários e, opcionalmente, publicação e comentários.

O upload precisa da extensão GD e de permissão de escrita do processo PHP na
pasta `assets/files/img/perfil/`. Crie essa pasta se necessário. Evite permissão
`777`; dê acesso apenas ao usuário/grupo do servidor. O processamento original
assume JPEG mesmo aceitando outras extensões; prefira JPEG nesta revisão.

## 7. Exportar o banco

`finalizarProjeto.php` exporta as coleções para os **mesmos JSON históricos**.
Copie `documents/mongoDB/db/` para outro local antes de executar:

```bash
php finalizarProjeto.php --force
```

Sem `--force`, o script recusa a sobrescrita. Importação e exportação só podem
ser executadas pelo terminal. Para backup operacional do banco, use as
ferramentas próprias do MongoDB; essa exportação é a rotina histórica do projeto
e pode ficar parcial se houver erro no meio.

## 8. Problemas comuns

| Sintoma | Verificação |
| --- | --- |
| `php: command not found` | Instale PHP CLI ou configure seu caminho no PATH. |
| Extensão MongoDB ausente / classe Manager não encontrada | Confira `php --ini`, `php -m` e a instalação de `mongodb` no PHP usado. |
| Connection refused / server selection timeout | Confira se MongoDB está iniciado e se URI, porta e autenticação estão corretas. |
| Página aparece sem estilo, links levam à pasta errada | Corrija `base_url`, incluindo porta, protocolo e subpasta. |
| Rotas dão 404 no Apache | Habilite `mod_rewrite` e leitura do `.htaccess`. |
| Rotas dão 404 no servidor PHP local | Inicie com `php -S localhost:8000 router.php` na raiz. |
| Gráficos iniciais sem dados | Importe os JSON e confira o nome do banco em todos os processos PHP. |
| Banco já contém dados | Não repita a importação; use o banco existente ou faça backup antes de `--force`. |
| Falha no upload | Confira GD, tamanho até 500000 bytes, JPEG e permissão na pasta de perfil. |
| Imagem da página Sobre ausente | O arquivo `assets/files/img/sobre.jpeg` não veio no repositório. |

O raspador em `assets/back_end/python/interno/raspagem.py` é uma ferramenta
histórica separada. Depende de `requests`, `beautifulsoup4` e `pymongo`, usa
endereços e estrutura HTML antigos e tem erros próprios. Ele não é parte da
instalação do site. O CSV também não é importado por essa rotina PHP.
