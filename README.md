# cInfo — Plataforma de visualização de gastos públicos

O cInfo é um **projeto final de curso, entregue e defendido em 2018**, do curso
Técnico em Informática do **Instituto Federal Catarinense — Câmpus Araquari**.
Foi desenvolvido para facilitar a exploração de gastos públicos por meio de
gráficos. A plataforma permite consultar dados,
criar e compartilhar visualizações e interagir com outros usuários por meio de
perfis, publicações, comentários e seguidores.

Em **2026**, o projeto foi retomado apenas para receber **pequenos ajustes de
compatibilidade, configuração e execução**, para que a plataforma rode melhor
nos ambientes atuais. A proposta, a estrutura, o visual e as bibliotecas de
interface do trabalho de 2018 foram preservados. Esta revisão não representa
uma reescrita nem uma nova versão funcional da plataforma.

## Projeto final de curso — 2018

O trabalho foi apresentado em Araquari (SC), com o título *Plataforma de
informação e interação acerca de informações de gastos públicos fornecidas pelo
governo*, pelos autores:

- Arthur Dias Viana de Castro
- João Pedro Lazarim de Souza
- Vinícius Peres

A proposta acadêmica era melhorar a apresentação dos dados de gastos públicos
obtidos do Portal da Transparência federal e oferecer um espaço de interação
entre usuários, com criação e compartilhamento de gráficos.

O [documento original entregue e defendido](documents/Projeto.pdf) está
preservado neste repositório. Ele registra a justificativa, os objetivos, os
materiais e métodos, o desenvolvimento, os requisitos e a conclusão do trabalho.
Seu conteúdo corresponde ao contexto de **2018**; os ajustes de execução de
**2026** são descritos separadamente abaixo.

## O que é de 2018

- A ideia da plataforma e suas funcionalidades de visualização e compartilhamento.
- A aplicação em PHP, organizada em uma estrutura MVC própria, com MongoDB.
- A interface em HTML, CSS e JavaScript, com jQuery, Semantic UI e Chart.js.
- Os dados e exemplos históricos presentes no repositório, incluindo o CSV
  `2018_OrcamentoDespesa.csv` e os arquivos JSON do MongoDB.
- O raspador Python e os demais artefatos usados no desenvolvimento original.

Os dados incluídos são históricos: **a revisão de 2026 não atualizou os gastos
públicos nem implementou coleta automática de informações atuais**. Textos e
referências temporais nas telas também fazem parte do contexto original.

## O que foi ajustado em 2026

Foram feitos ajustes pontuais para facilitar a instalação e corrigir problemas
de execução encontrados ao rodar o código antigo hoje:

- Configuração local de URL e banco, com suporte a variáveis de ambiente.
- Correções de rotas, caminhos de arquivos e conexão com o MongoDB.
- Compatibilidade com PHP atual em pontos como cadastro, senhas, listas vazias
  e respostas JSON.
- Pequenas correções em formulários, scripts e referências a arquivos.
- Roteador para o servidor local do PHP e proteções contra sobrescrita acidental
  nas rotinas de importação e exportação.
- Documentação de instalação, verificações realizadas e pendências conhecidas.

O detalhamento técnico está em [DIAGNOSTICO.md](DIAGNOSTICO.md).

## Como executar

É necessário ter PHP com as extensões `mongodb` e `gd`, além de um servidor
MongoDB acessível. As bibliotecas de interface já estão no repositório; não é
necessário instalar dependências com Composer ou npm para abrir o site.

Com esses requisitos disponíveis, execute na raiz do projeto:

```bash
cp config/config.local.example.php config/config.local.php
```

Edite `config/config.local.php` com a URL e a conexão do seu ambiente. Para usar
o servidor local, mantenha a URL `http://localhost:8000/`. Depois, com o MongoDB
em execução e um banco de destino vazio:

```bash
php inciarProjeto.php
php -S localhost:8000 router.php
```

Abra <http://localhost:8000/>. O nome `inciarProjeto.php` mantém a grafia do
arquivo original. A importação carrega os exemplos históricos e recusa um banco
que já contenha dados nas coleções de destino.

Consulte [INSTALACAO.md](INSTALACAO.md) para os requisitos completos,
configuração do MongoDB, uso com Apache/XAMPP e solução de problemas.

## Estado atual

Este repositório preserva um trabalho de 2018 com manutenção pontual em 2026.
As bibliotecas antigas e limitações do sistema original continuam presentes,
incluindo pendências de autenticação, autorização e validação de dados. Os
ajustes permitem retomar a execução local, mas não tornam a aplicação pronta
para publicação aberta em produção.

O raspador Python permanece como artefato histórico e precisa de revisão
própria antes de ser executado. Ele não é necessário para rodar a plataforma
com os dados incluídos.

Veja as verificações já realizadas e as limitações em
[DIAGNOSTICO.md](DIAGNOSTICO.md).
