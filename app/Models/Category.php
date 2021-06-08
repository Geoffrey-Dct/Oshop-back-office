<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Category extends CoreModel {

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $subtitle;
    /**
     * @var string
     */
    private $picture;
    /**
     * @var int
     */
    private $home_order;

    /**
     * Get the value of name
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param  string  $name
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHomeOrder()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     */ 
    public function setHomeOrder($home_order)
    {
        $this->home_order = $home_order;
    }

    /**
     * Méthode permettant de récupérer un enregistrement de la table Category en fonction d'un id donné
     * 
     * @param int $categoryId ID de la catégorie
     * @return Category
     */
    public static function find($categoryId)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = 'SELECT * FROM `category` WHERE `id` =' . $categoryId;

        // exécuter notre requête
        $pdoStatement = $pdo->query($sql);

        // un seul résultat => fetchObject
        $category = $pdoStatement->fetchObject('App\Models\Category');

        // retourner le résultat
        return $category;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table category
     * 
     * @return Category[]
     */
    public function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `category`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
        
        return $results;
    }

    /**
     * Récupérer les 5 catégories mises en avant sur la home
     * 
     * @return Category[]
     */
    public function findAllHomepage()
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM category
            WHERE home_order > 0
            ORDER BY home_order ASC
        ';
        $pdoStatement = $pdo->query($sql);
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
        
        return $categories;
    }

    public function findForHomeBackOffice()
    {
        $pdo= Database::getPDO();
        $sql='SELECT * FROM `category` LIMIT 3';
        $pdoStatement=$pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
        return $results; 
    }

    /**
     * Méthode permettant d'insérer une nouvelle catégorie dans la table category
     * 
     * @return Category[]
     */
    public function insert()
    {
        $pdo = Database::getPDO();
        $sql = "INSERT INTO `category`(name, subtitle, picture, home_order, created_at, updated_at)
        VALUES ('{$this->name}', '{$this->subtitle}', '{$this->picture}', 0, now(), NULL)";
        
       // Execution de la requête d'insertion (exec, pas query)
       $insertedRows = $pdo->exec($sql);

       // Si au moins une ligne ajoutée
       if ($insertedRows > 0) {
           // Alors on récupère l'id auto-incrémenté généré par MySQL
           $this->id = $pdo->lastInsertId();

           // On retourne VRAI car l'ajout a parfaitement fonctionné
           return true;
           // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
       }
       
       // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
       return false;
        
    }

    public function update($id)
    {
        
        $pdo = Database::getPDO();

        $sql = "
        UPDATE `category`
        SET `name` = :name,
        `subtitle`= :subtitle,
        `picture`= :picture,
        `home_order`= :home_order
        WHERE `id`= :id";

        $pdoStatement = $pdo->prepare($sql);
        //dd($pdoStatement);
        
        $pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);
        //dd($l);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        
        $pdoStatement->bindValue(':subtitle', $this->subtitle, PDO::PARAM_STR);
        $pdoStatement->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        
        $pdoStatement->bindValue(':home_order', $this->home_order, PDO::PARAM_INT);
        

        $requeteOk = $pdoStatement->execute();
        //dd($requeteOk);
        
        return $requeteOk;
    }
}
