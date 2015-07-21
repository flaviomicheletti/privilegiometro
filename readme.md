# Privilegiômetro

Algumas pessoas nascem em famílias que tem que andar quilômetros para pegar água.

Eu só tenho que abrir a torneira.

Isso é privilégio.

--------------------------------------------------------------------------------


Baseado no vídeo [Whats is Privilege](https://www.facebook.com/empodereduasmulheres/videos/888694507871205/)
e inspirado no trabalho de [Lucas Davila](http://lucasdavila.github.io/privilegiometro/).



### Front end

Feito em [backbone](http://backbonejs.org/).


### Back end

Feito em [PHP](http://php.net/) (minha hospedagem é PHP!).

Crie uma base qualquer com a seguinte tabela de dados...

    CREATE TABLE IF NOT EXISTS `privilegios` (
      `posicao` int(11) NOT NULL,
      `quando` datetime NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

... e configure os dados de seu banco no arquivo `backend/banco.php`.

Para rodar os testes execute os comandos abaixo no terminal 
(imaginado que vc tenha o [phpunit](https://phpunit.de/) instalado).

  cd backend/
  phpunit test-funcoes.php 
  phpunit test-bacno-de-dados.php 