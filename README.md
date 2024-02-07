# Estrutura de pesquisa em banco de dados <br> 

Este projeto é uma aplicação de pesquisa em banco de dados, desenvolvida em PHP, HTML,CSS e JAVASCRIPT com o uso de um banco de dados MySQL para armazenamento de informações..
<br>
Este projeto foi desenvolvido para proporcionar uma solução abrangente e eficiente para a pesquisa ao banco de dados, incorporando a operação leitura e filtragem de dados específicos 

## Ferramentas Utilizadas

**Linguagem de Programação:**
   - PHP
**Banco de Dados:**
   - MySQL

**Front-end:**
   - HTML
   - CSS
   
**Servidor Web:**
   - XampServer

**Controle de Versão:**
   - Git

## Instruções de Configuração

**Ambiente de Desenvolvimento:**
   - Instale um servidor web local (WAMP, XAMPP).
   - Certifique-se de ter o PHP e o MySQL instalados.

**Banco de Dados:**
   - Importe o arquivo config/conexao.php para criar as tabelas necessárias.
     
**Configuração do Banco de Dados:**
   - Edite `config/conexao.php` com as configurações do seu banco de dados.

**Acesso à Aplicação:**
   - Acesse a aplicação via navegador, usando o endereço do servidor local

## Funcionamento do Projeto

1. Painel de Entrada:
<p>
USUÁRIO: Costalis
<br>
SENHA: 12345
</p>
O projeto inicia com um painel de entrada que requer um nome de usuário e senha. O acesso é exclusivo para o usuário "Costalis" com a senha "12345". Essa medida visa garantir maior segurança no acesso ao sistema.
<p></p>
2. Painel Central - Gerenciamento:
<br>

Após a autenticação bem-sucedida, os usuários autorizados serão direcionados para o Painel Central, o núcleo do sistema onde todas as operações de leitura,filtragem e inserção de  novos arquivos é feita
<p></p>

3. Segurança:

A implementação de uma autenticação rigorosa, com a usuária o usuário "Costalis" com a senha "12345", visa garantir que apenas usuários autorizados tenham acesso ao sistema. Isso contribui para a segurança dos dados armazenados no gerenciador de biblioteca, Tambem com a implementação de arrays que mostram o bloqueio de entrada previnindo contra  XSS e SQL Injection
 
