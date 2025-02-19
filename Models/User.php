<?php

class User
{
    private $id_users;


    private $nom;
    private $prenom;
    private $mail;
    private $password;
    private $avatar;
    private $droits;



    /**
     * @param $nom
     * @param $prenom
     * @param $mail
     */
    public function __construct($nom, $prenom, $mail)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }
    public function getDroits()
    {
        return $this->droits;
    }

    public function setDroits($droits)
    {
        $this->droits = $droits;
    }
    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function setIdUsers($id_users)
    {
        $this->id_users = $id_users;
    }
}

class UserManager
{
    private function dbConnect()
    {
        $user = 'root';
        $password = '';
        $dsn = 'mysql:host=localhost;dbname=test_exam;charset=utf8';
        $dbh = new PDO($dsn, $user, $password);
        return $dbh;
    }
    public function add(User $user)
    {
        $req = $this->dbConnect()->prepare('INSERT INTO users(nom, prenom, mail, password) VALUES(:nom,:prenom, :mail,:password)');
        $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':mail', $user->getMail());
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $bool_result = $req->execute();
        if($bool_result) {
           return self::getByEmail($user->getMail());
        }  else {
            return "Unhandled error creating user";
        }
    }

    public function delete(User $user)
    {
        $this->dbConnect()->exec('DELETE FROM users WHERE id_users = ' . $user->id_users());
    }

    public function get($id)
    {
        $id = (int)$id;
        $req = $this->dbConnect()->prepare('SELECT * FROM users WHERE id_users = ?');
        $req->execute(array($id));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $user = new User($donnees['nom'], $donnees['prenom'], $donnees['mail']);
        return $user;
    }

    public function getAll()
    {
        $users = [];

        $req = $this->dbConnect()->query('SELECT * FROM users');

        while ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($donnees['nom'], $donnees['prenom'], $donnees['mail']);
            $user->setIdUsers($donnees['id_users']);
            $user->setDroits($donnees['droits']);
            $users[] = $user;
        }
        return $users;
    }

    public function getByEmail($email){
        $req = $this->dbConnect()->prepare('SELECT * FROM users WHERE mail = ?');
        $req->execute(array($email));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);
        $user = new User($donnees['nom'], $donnees['prenom'], $donnees['mail']);
        return $user;
    }

    public function update(User $user)
    {
        $req = $this->dbConnect()->prepare('UPDATE users SET pseudo = :pseudo, mail = :mail, password = :password WHERE id_users = :id');
        $req->bindValue(':id', $user->getIdUsers(), PDO::PARAM_INT);
        $req->bindValue(':prenom', $user->getPrenom(), PDO::PARAM_STR);
        $req->bindValue(':nom', $user->getNom(), PDO::PARAM_STR);
        $req->bindValue(':mail', $user->getMail());
        $req->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);

        $req->execute();
    }

    public function login($mail)
    {
        $req = $this->dbConnect()->prepare('SELECT * FROM users WHERE mail = ?');
        $req->execute(array($mail));
        if ($donnees = $req->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($donnees['nom'], $donnees['prenom'], $donnees['mail']);
            $user->setIdUsers($donnees['id_users']);
            $user->setDroits($donnees['droits']);
            return $user;
        } else {
            return false;
        }
    }
}


?>