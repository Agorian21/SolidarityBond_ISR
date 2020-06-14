<?php
    $id = $_SESSION['id'];
    include('bdd.php');
    // Check connection
    $result = $bdd->prepare("SELECT * FROM basket WHERE userID = $id");
    $result->execute();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $rowOrder) {
        $search = $bdd->prepare("SELECT * FROM product WHERE productID = :productId");
        $search->bindValue(':productId', $rowOrder['productNAME'], PDO::PARAM_INT);
        $search->execute();

        foreach($search->fetchAll(PDO::FETCH_ASSOC) as $rowProduct){ // iterate over all the results
            echo "<tr><td>" . $rowOrder['productNAME'] . "</td><td>" . $rowOrder["basketQUANTITY"] . "</td><td>" . $rowProduct["stock"] ."</td></tr>";
        }
    };
    echo "</table>";
    echo '<form action="../PHP/manage/scriptFinalizeOrder.php" method="POST">
        <input type="submit" class="btn btn-md" value="Commander">
        </form>';
?>