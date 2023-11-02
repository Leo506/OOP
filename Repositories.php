<?php
require_once('Models.php');

abstract class ShopProductRepository
{

    function __construct(protected PDO $pdo)
    {
    }

    function create(ShopProduct $shopProduct): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO Product (price, producer, title) VALUES (?, ?, ?);");
        $stmt->execute([$shopProduct->price, $shopProduct->producer, $shopProduct->title]);
        $id = $this->getLastAddedProductId($this->pdo, 'Product');
        return $id;
    }

    protected function getLastAddedProductId(PDO $pdo, string $tableName): int
    {
        $stmt = $pdo->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["id"];
    }

    abstract function get(int $id): ShopProduct;

    abstract function getAll(): array;

    function update(ShopProduct $shopProduct): void
    {
        if ($shopProduct->id <= 0)
            throw new Exception("Can not update object with id " . $shopProduct->id);

        $stmt = $this->pdo->prepare("UPDATE Product SET title = ?, price = ?, producer = ? WHERE id = ?");
        $stmt->execute([$shopProduct->title, $shopProduct->price, $shopProduct->producer, $shopProduct->id]);
    }

    function delete(ShopProduct $shopProduct): void
    {
        if ($shopProduct->id <= 0)
            throw new Exception("Can not update object with id " . $shopProduct->id);
        $stmt = $this->pdo->prepare("DELETE FROM Product WHERE id = ?");
        $stmt->execute([$shopProduct->id]);
    }

    function exists(int $id): bool
    {
        $stmt = $this->pdo->prepare("SELECT 1 FROM Product WHERE id = ?");
        $stmt->execute([$id]);
        return !empty($stmt->fetchAll());
    }
}

class CdProductRepository extends ShopProductRepository
{

    function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    function create(ShopProduct $shopProduct): int
    {
        $productId = parent::create($shopProduct);
        $stmt = $this->pdo->prepare("INSERT INTO Cd(id, tracksNumber)  VALUES (?, ?)");
        $stmt->execute([$productId, $shopProduct->{'tracksNumber'}]);
        return $this->getLastAddedProductId($this->pdo, 'Cd');
    }

    function get(int $id): CDProduct
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Cd c INNER JOIN Product p ON c.id = p.id WHERE p.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject("CdProduct");
    }

    function update(ShopProduct $shopProduct): void
    {
        parent::update($shopProduct);
        $stmt = $this->pdo->prepare("UPDATE Cd SET tracksNumber = ? WHERE id = ?");
        $stmt->execute([$shopProduct->{'tracksNumber'}, $shopProduct->id]);
    }

    function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM Cd c INNER JOIN Product p ON c.id = p.id");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'CdProduct');
    }
}

class BookRepository extends ShopProductRepository
{

    function __construct(PDO $pdo)
    {
        parent::__construct($pdo);
    }

    function create(ShopProduct $shopProduct): int
    {
        $productId = parent::create($shopProduct);
        $stmt = $this->pdo->prepare("INSERT INTO Book(id, pagesCount)  VALUES (?, ?)");
        $stmt->execute([$productId, $shopProduct->{'pagesCount'}]);
        return $this->getLastAddedProductId($this->pdo, 'Book');
    }

    function get(int $id): BookProduct
    {
        $stmt = $this->pdo->query("SELECT * FROM Book c INNER JOIN Product p ON c.id = p.id");
        return $stmt->fetchObject("BookProduct");
    }

    function update(ShopProduct $shopProduct): void
    {
        parent::update($shopProduct);
        $stmt = $this->pdo->prepare("UPDATE Book SET pagesCount = ? WHERE id = ?");
        $stmt->execute([$shopProduct->{'pagesCount'}, $shopProduct->id]);
    }

    function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM Book c INNER JOIN Product p ON c.id = p.id");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'BookProduct');
    }
}
