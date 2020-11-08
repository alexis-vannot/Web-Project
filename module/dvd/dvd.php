<!DOCTYPE html>
<html>

    <head>
        <title>Cin3-iL - DVD</title>
        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <!-- Links -->
        <?php include "../../module/base/link.php"; ?>

    </head>

    <body>
        <!-- Include header -->
        <?php
            include "../../module/base/header.php";
            include '../../includes/database.php';
            global $db;
        ?>

        <!-- Script modification/suppression element -->
        <script>
            function deleteItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=movie&action=delete&id=" + str, true);
                xmlhttp.send();
            }

            function updateItem(str) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "../../model.php?model=movie&action=update&id=" + str, true);
                xmlhttp.send();
            }
        </script>

        <section>
            <a href="/module/dvd/create_dvd.php" class="create_line_link">
                <div class="create_line">
                    <h2>Ajouter un DVD</h2>
                </div>
            </a>
        </section>

        <section>
            <div class="list_items">
                <?php
                    $query = $db->query("SELECT id, lastname, firstname, birthday_date, biography from `movie`");
                    while ($producer = $query->fetch())
                    { ?>
                    <div class="item">
                        <div class="item_image">
                            <?php echo '<img src="data:image/jpg;base64,' . base64_encode($donnees['image']) . '" height="" width="" alt="mon image" title="image"/>';?>
                        </div>
                        <div class="item_description">
                            <div><span class="item_label">Nom :</span><?php echo $producer['lastname']; ?></div>
                            <div><span class="item_label">Prénom :</span><?php echo $producer['firstname']; ?></div>
                            <div><span class="item_label">Date de naissance :</span><?php echo $producer['birthday_date']; ?></div>
                            <div><span class="item_label">Biographie :</span><?php echo $producer['biography']; ?></div>
                            <div class="item_buttons">
                                <a onclick="updateItem(<?php echo $producer['id']; ?>)">Modifier</a>
                                <a onclick="deleteItem(<?php echo $producer['id']; ?>)">Supprimer</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        
        <!-- Include footer -->
        <?php include "../../module/base/footer.php"; ?>
    </body>

</html>


