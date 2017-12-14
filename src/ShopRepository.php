<?php


namespace Itb;


class ShopRepository
{
    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function dropTable()
    {
        $sql = "DROP TABLE IF EXISTS shop";
        $this->connection->exec($sql);
    }

    public function createTable()
    {


        $this->dropTable();

        $sql = "
            CREATE TABLE IF NOT EXISTS shop (
            id integer not null primary key auto_increment,
            description VARCHAR (255),
            price float(5,2))
        ";

        $this->connection->exec($sql);
    }


    public function insert($description, $price)
    {

        $sql = 'INSERT INTO shop (description, price,) 
			VALUES (:description, :price)';

        $stmt = $this->connection->prepare($sql);

        // Bind parameters to statement variables
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);


        // Execute statement
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM shop';

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Shop');

        $menus = $stmt->fetchAll();

        return $menus;
    }


    public function getOne($id)
    {
        $sql = 'SELECT * FROM shop WHERE id = :id';

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':id', $id);

        // Execute statement
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'Itb\\Shop');

        $shop = $stmt->fetch();

        return $shop;


    }


    public function deleteAll()
    {
        $sql = 'DELETE * FROM shop';

        $stmt = $this->connection->exec($sql);

        $stmt->execute();
    }





}