import requests
import json
from bs4 import BeautifulSoup
from pymongo import MongoClient

def convertFloat(string):
    novaString = ''
    for letra in string:
        if (letra != "."):
            if (letra == ","):
                novaString = novaString + "."
            else:
                novaString = novaString + letra

    return float(novaString)

def raspaPagina(url, valores, pai):
    page = requests.get(url).content
    soup = BeautifulSoup(page, 'html.parser')
    tables = soup.table

    listagem = soup.find(id='listagem')

    table = listagem.table

    if (table.th.get_text() != 'Grupo de Despesa'):

        linhas = table.find_all('tr')

        for linha in linhas:
            valor = {}
            dados = list(linha.find_all('td'))

            if(len(dados) == 3):
                valor = {'codigo':dados[0].get_text().strip(), 'nome':dados[1].get_text().strip(), 'gasto':convertFloat(dados[2].get_text().strip()), 'link':linha.a['href'], 'pai':pai}
                print(dados[1].get_text().strip())

            valores.append(valor)

        return valores

    else:
        return null


def descobrePag(url):
    page = requests.get(url).content
    soup = BeautifulSoup(page, 'html.parser')
    paginas = soup.find(id="paginacao").p.get_text()

    barra = 0
    totalPag = ''

    for pagina in paginas:
        if (pagina == '/'):
            barra = 1
        if (barra and pagina != '/'):
            totalPag = totalPag + str(pagina)

    return totalPag


def raspaTodasPag(url, valores, pai):
    inicialPag = 1
    finalPag = int(descobrePag(url))

    while (inicialPag <= finalPag):
        try:
            urlAtual = url + '&Pagina=' + str(inicialPag)
            valores.append(raspaPagina(urlAtual, valores, pai))
            inicialPag = inicialPag + 1

        except: NameError

    try:
        for valor in valores:
            if (len(valor) != 5):
                valores.remove(valor)

    except: NameError

    return valores

def rapaTudo(dados):

    urlPadrao = 'http://www.portaltransparencia.gov.br/'


    try:
        for dado in dados:
            if(dado['link'].find('CodigoUG') < 0):
                valor = raspaTodasPag(urlPadrao + dado['link'], dados, dado['codigo'])
                dados.append(valor)
            else:
                print('\n --- fail --- \n')
            print(dado['nome'])


        for dado in dados:
            if(dado['link'].find('CodigoUG') < 0):
                filho = 0
                for i in dados:
                    if(i['pai'] == dado['codigo']):
                        filho = filho + 1
                if (filho == 0):
                    valor = raspaTodasPag(urlPadrao + dado['link'], dados, dado['codigo'])
                    dados.append(valor)
    except: NameError
    try:
        for valor in dados:
            if (len(valor) != 5):
                dados.remove(valor)

    except: NameError


    return dados

def insertDB(valores):
    client = MongoClient('localhost:27017')
    db = client.db_cinfo

    for valor in valores:
        documento = json.dumps(valor, separators=(',',':'))
        try:
            db.dados.insert_one({
                "codigo": valor['codigo'],
                "nome": valor['nome'],
                "gasto": valor['gasto'],
                "link": valor['link'],
                "pai": valor['pai']
            })

        except: NameError


urlPadrao = 'http://www.portaltransparencia.gov.br/'
urlInicial = 'PortalComprasDiretasOEOrgaoSuperior.asp?Ano=2017'

dados = raspaTodasPag(urlPadrao + urlInicial, [], 'brasil')

valores = rapaTudo(dados)