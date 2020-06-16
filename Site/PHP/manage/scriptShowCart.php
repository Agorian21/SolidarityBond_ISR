<?php
    $id = $_SESSION['id'];
    include('bdd.php');
    // Check connection
    $result = $bdd->prepare("SELECT * FROM basket WHERE userID = $id");
    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $rowOrder) {
        $search = $bdd->prepare("SELECT * FROM product WHERE productID = :productId");
        $search->bindValue(':productId', $rowOrder['productID'], PDO::PARAM_STR);
        $search->execute();

        foreach($search->fetchAll(PDO::FETCH_ASSOC) as $rowProduct){ // iterate over all the results
          $price = $rowProduct["productPRICE"] * $rowOrder["basketQUANTITY"];
          
            echo "<tr><td>" . $rowProduct['productNAME'] . "</td><td>" . $rowOrder["basketQUANTITY"] . "</td><td>" . $price . "€" . "</td><td>" . $rowProduct["productSTOCK"] . "</td></tr>";
        }
    };
    echo "</table>";
    echo '<form action="basketRecap.php" method="POST">
        <input type="submit" class="btn btn-md" value="Commander">
        </form>';
?>