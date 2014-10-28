<?php

class Articles {

    public function fetch() {
        global $pdo;
        if (!empty($_POST['id_of_article']) && !empty($_POST['name_of_article'])) {
            $query = $pdo->prepare("SELECT * FROM mnarudzbe_".$_SESSION['logged_in_user']."_artikli WHERE ID_Artikla=? and Naziv_Artikla=?");
            $query->bindValue(1, $_POST['id_of_article']);
            $query->bindValue(2, $_POST['name_of_article']);
            $query->execute();
            } elseif (!empty($_POST['id_of_article']) && empty($_POST['name_of_article'])) {
            $query = $pdo->prepare("SELECT * FROM mnarudzbe_".$_SESSION['logged_in_user']."_artikli WHERE ID_Artikla=?");
            $query->bindValue(1, $_POST['id_of_article']);
            $query->execute();
        } elseif (empty($_POST['id_of_article']) && !empty($_POST['name_of_article'])) {
            $query = $pdo->prepare("SELECT * FROM mnarudzbe_".$_SESSION['logged_in_user']."_artikli WHERE Naziv_Artikla=?");
            $query->bindValue(1, $_POST['name_of_article']);
            $query->execute();
        } 

        $query->execute();

        return $query->fetchAll();
    }

}
?>

<table style="border-collapse: collapse; text-align: center" border="1" align="center">
    <tr style="font-weight: bold">
        <td>Article ID</td>
        <td>Name</td>
        <td>Type</td>
        <td>Price</td>
    </tr>

    <?php
    $articles = (new Articles)->fetch();
    foreach ($articles as $article) {
        ?>
        <tr>
            <td><?php echo $article['ID_Artikla'] ?></td>
            <td><?php echo $article['Naziv_Artikla'] ?></td>
            <td><?php echo $article['Skupina_Artikla'] ?></td>
            <td><?php echo $article['Cijena_Artikla'] ?></td>
        </tr>

    <?php }
    ?>

</table>
