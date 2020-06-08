<?php
    $id = $_SESSION['id'];
    include('bdd.php');
    // Check connection
    $result = $bdd->prepare("SELECT * FROM shop_orders WHERE id_Site_Users = $id AND status = 0");
    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $rowOrder) {
        $search = $bdd->prepare("SELECT * FROM shop_products WHERE id = :productId");
        $search->bindValue(':productId', $rowOrder['products'], PDO::PARAM_INT);
        $search->execute();

        foreach($search->fetchAll(PDO::FETCH_ASSOC) as $rowProduct){ // iterate over all the results
            echo "<tr><td>" . $rowProduct['name'] . "</td><td>" . $rowOrder["quantity"] . "</td><td>"
.           $rowProduct["price"] . "x" . $rowOrder["quantity"] . "</td><td>" . $rowProduct["stock"] ."</td></tr>";
        }
    };
    echo "</table>";
    echo '<form action="../PHP/manage/scriptFinalizeOrder.php" method="POST">
        <input type="submit" class="btn btn-md" value="Commander">
        </form>';
?>