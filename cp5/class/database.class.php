<?php

/**
 * Mini-framework :
 * Connexion à une base de données MySQL ou MariaDB
 * et exploitation
 */
class Database
{
    // Attributs privés
    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $cnn; // généré par le constructeur
    private $connected = false; // généré par le constructeur

    // Constructeur
    public function __construct(string $newHost, string $newDbname, string $newUser, string $newPass)
    {
        // Assigne la valeur des paramètres aux attributs 
        $this->setHost($newHost);
        $this->setDbname($newDbname);
        $this->setUser($newUser);
        $this->setPass($newPass);

        // Tente une connexion à la BDD
        try {
            // Connexion
            $this->cnn = new PDO('mysql:host=' . $this->getHost() . ';dbname=' . $this->getDbname() . ';charset=utf8', $this->getUser(), $this->getPass());
            // Options de connexion : erreur + type de renvoi
            $this->cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->cnn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->connected = true;
        } catch (PDOException $err) {
            throw new Exception(__CLASS__ . ' : ' . $err->getMessage());
        }
    }

    // Accesseurs/Mutateurs
    public function setHost(string $newHost)
    {
        $this->host = $newHost;
    }

    public function getHost(): string
    {
        return $this->host;
    }

    public function setDbname(string $newDbname)
    {
        $this->dbname = $newDbname;
    }

    public function getDbname(): string
    {
        return $this->dbname;
    }

    public function setUser(string $newUser)
    {
        $this->user = $newUser;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setPass(string $newPass)
    {
        $this->pass = $newPass;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * Méthode qui renvoie le résultat d'une requête dont l'instruction est passée en paramètre 
     * @param string $sql - instruction SQL préparée de type SELECT
     * @param array $params - valeurs des paramètres pour la requête préparée
     * @return array
     */
    public function getResult(string $sql, array $params = array()): array
    {
        try {
            // Prépare la requête
            $qry = $this->cnn->prepare($sql);
            $qry->execute($params);
            return $qry->fetchAll();
        } catch (PDOException $err) {
            throw new Exception(__CLASS__ . ' : ' . $err->getMessage());
        }
    }

    public function getJSON(string $sql, array $params = array()): string
    {
        $data = $this->getResult($sql, $params);
        return json_encode($data);
    }
}
