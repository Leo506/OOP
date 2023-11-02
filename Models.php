<?php
abstract class ShopProduct {
    public int $id = -1;
    public string $title;
    public float $price;
    public string $producer;

    function __toString(): string {
        return "Product \"" . $this->title . "\" from " . $this->producer . " for " . $this->price . "$";
    }

    function actionCreate(PDO $pdo): int {
        $stmt = $pdo->prepare("INSERT INTO Product (price, producer, title) VALUES (?, ?, ?);");
        $stmt->execute([$this->price, $this->producer, $this->title]);
        $id = $this->getLastAddedProductId($pdo, 'Product');
        $this->id = $id;
        return $id;
    }

    protected function getLastAddedProductId(PDO $pdo, string $tableName): int {
        $stmt = $pdo->query("SELECT id FROM $tableName ORDER BY id DESC LIMIT 1");
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0]["id"] ?? throw new Exception("Failed to get last added product id");
    }

    function delete(PDO $pdo): void {
        if ($this->id <= 0)
            return;
        $stmt = $pdo->prepare("DELETE FROM Product WHERE id = ?");
        $stmt->execute([$this->id]);
    }
}


class CDProduct extends ShopProduct {

    public int $tracksNumber;

    function __toString(): string {
        return parent::__toString() . " and with " . $this->tracksNumber . " tracks on it";
    }

    function actionCreate(PDO $pdo): int {
        $productId = parent::actionCreate($pdo);
        $stmt = $pdo->prepare("INSERT INTO Cd(id, tracksNumber)  VALUES (?, ?)");
        $stmt->execute([$productId, $this->tracksNumber]);
        return $this->getLastAddedProductId($pdo, 'Cd');
    }
}

class BookProduct extends ShopProduct {

    public int $pagesCount;

    function __toString(): string {
        return parent::__toString() . " and with " . $this->pagesCount . " pages in it";
    }

    function actionCreate(PDO $pdo): int {
        $productId = parent::actionCreate($pdo);
        $stmt = $pdo->prepare("INSERT INTO Book(id, pagesCount)  VALUES (?, ?)");
        $stmt->execute([$productId, $this->pagesCount]);
        return $this->getLastAddedProductId($pdo, 'Book');
    }
}