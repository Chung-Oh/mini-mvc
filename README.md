# mini-mvc-1
Criando um mini-framework MVC, esse repositório é apenas para estudo.

# Informações importantes
Para o mini-framework MVC funcionar conforme esperado, deve-se ter o conhecimento das PSRs 1, 4 e 12. Desenvolvido e testado nas seguintes versões:
- PHP 7.3.11
- Composer 1.9.0

# Sobre arquitetura
Na raiz se tem dois diretórios para se trabalhar com as camadas, sendo eles:
>- App - onde ficarão as regras de negócio da aplicação
>- Src - toda abstração e automação da aplicação

# App/
Onde será adicionado arquivos, ficará também a maior parte dos códigos. Sua estrutura e definições são:

* **Controller/**
  >Aqui deve-se implementar as ações, deve extender de **Src/Controller/Action** para utilizar um layout padrão caso deseje e
  renderizar as Views de acordo com ações definidas em **App/Router**, e interagirá com **Src/DI/Container** na qual se tem um
  método **static** onde obtemos as **Models** já instânciadas.

* **Model/**
  >Deve-se implementar recursos/métodos interessantes para aplicação(ex: create, list, update, etc) e atribuir nome da Tabela ao
  atributo que será herdado de **Src/Model/Table**.
  
* **public/**
  >Somente esse que não precisa implementar nada, a não ser que deseje. Aqui ficarão arquivos **index.php** e **.htaccess**.

* **View/**
  >A extensão aqui usada foi **.phtml**. E em sua raíz se tem **layout.phtml** onde é um template padrão podendo reaproveitar
  elementos como navbar ou um footer. Para melhor organização é interessante criar um diretório para cada Controller dentro de View.
    - Exemplo: para ```UserController``` podemos criar ```View/user/home.phtml``` e ```View/user/favorites.phtml```
    
* **Router.php**
  >Onde se define todas as Rotas da aplicação, essa classe extende de Src/Init/Bootstrap.
  
# Src/
Essa camada se tem toda a abstração e automação para o MVC funcionar corretamente.

* **Controller/**
  >Encontra-se classe abstrata Action, responsável por renderizar as Views. São nas classes em App/Controller/ que decidi-se
  em não utilizar template padrão passando 2º parâmetro no método herdado **render()** como **false**, por default está **true**.
  
* **DI/**
  >Encontra-se classe Container, onde é a única com acessa a conexão ao banco de dados. Utilizada como **Dependency Injection**,
  sua única responsabilidade é retornar uma instância de Model.
  
* **Init/**
  >Encontra-se classe abstrata Bootstrap, onde é tratado e armazenado: Rotas, Controllers e Ações definidas em Route.php.
  Sua responsabilidade é de armazernar e automatizar todo o sistema de rotas.
  
* **Model/**
  >Encontra-se classe abstrata Table, tem a responsabilidade de manter a conexão ao banco de dados no momento de sua instância pela
  classe **Container** e nome da Tabela na qual irá se referenciar.
  
* **Conn.php**
  >Classe principal de conexão ao banco, nele retornamos uma instância de \PDO.
