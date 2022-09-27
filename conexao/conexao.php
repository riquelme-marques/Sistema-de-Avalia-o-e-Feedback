<?php


class Usuario
{

    private $pdo;
    public $msgErro;

    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=" . $nome . ";host=" . $host, $usuario, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrar($nome, $email, $telefone, $senha)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO usuario(nome, email, telefone, senha) VALUE (:n, :e, :t, :s)");

            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":t", $telefone);
            $sql->bindValue(":s", $senha);
            $sql->execute();
            return true;
        }
    }

    public function logar($email5, $senha5)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT idusuario FROM usuario WHERE email = :e AND senha = :s");

        $sql->bindValue(":e", $email5);
        $sql->bindValue(":s", $senha5);
        $sql->execute();
        if ($sql->rowCount() > 0)
        {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['idusuario'] = $dado['idusuario'];
            return true;
        }
        else
        {
            return false;
        }
    }

    public function cadastrarProduto($usuariopro, $email,  $nomeproduto, $presso, $qtd, $categoria, $link)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT idprodutos FROM produtos WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 100000) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO produtos(usuariopro, email, nomeproduto, presso, qtd, categoria, link) VALUE (:u, :e, :n, :p, :q, :c, :l)");

            $sql->bindValue(":u", $usuariopro);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":n", $nomeproduto);
            $sql->bindValue(":p", $presso);
            $sql->bindValue(":q", $qtd);
            $sql->bindValue(":c", $categoria);
            $sql->bindValue(":l", $link);
            $sql->execute();
            return true;
        }



    }

    public function cadastrarAva($nomeusuario, $avaliacao, $nomepro, $email)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT idavaliacao FROM avaliacao WHERE email = :e");
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            return false;
        } else {
            $sql = $pdo->prepare("INSERT INTO avaliacao(nomeusuario, avaliacao, nomepro, email) VALUE (:n, :a, :p, :e)");

            $sql->bindValue(":n", $nomeusuario);
            $sql->bindValue(":a", $avaliacao);
            $sql->bindValue(":p", $nomepro);
            $sql->bindValue(":e", $email);
            $sql->execute();
            return true;
        }
    }
}


