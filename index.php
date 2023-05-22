<?php
session_start();
require_once 'admin/backend/config.php';
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>

    <?php require_once 'header.php'; ?>
    <div class="container content">
        <?php 
        require_once 'admin/backend/conn.php';
        $query = "SELECT * FROM rides";
            $statement = $conn->prepare($query);
            $statement->execute();
            $rides = $statement->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia modi dolore magnam! Iste libero voluptatum autem, sapiente ullam earum nostrum sed magnam vel laboriosam quibusdam, officia, esse vitae dignissimos nulla?
        </aside>
        <main>
            <?php foreach($rides as $ride): 
                if($ride['fast_pass'] = false):?>
                <div class="card">
                    <img src="img/attracties/<?php echo $ride['img_file'];?>" alt="img">
                    <div class="cardText">
                        <h2><?php echo strtoupper($ride['themeland']); ?></h2>
                        <h4><?php echo $ride['title']; ?></h1>
                        <p><?php echo $ride['description']; ?></p>
                        <h3><b><?php if($ride['min_length'] == NULL){
                            echo "Geen";} 
                        else{
                            echo $ride['min_length'] . "cm";} ?></b> minimale lengte</h3>
                            <p><?php echo $ride['fast_pass']; ?></p>
                    </div>
                </div>
                <?php
                elseif($ride['fast_pass'] = true):?>
                <div class="card large">
                    <img src="img/attracties/<?php echo $ride['img_file'];?>" alt="img">
                    <div class="cardText">
                        <h2><?php echo strtoupper($ride['themeland']); ?></h2>
                        <h4><?php echo $ride['title']; ?></h1>
                        <p><?php echo $ride['description']; ?></p>
                        <h3><b><?php if($ride['min_length'] == NULL){
                            echo "Geen";} 
                        else{
                            echo $ride['min_length'] . "cm";} ?></b> minimale lengte</h3>
                             <p><?php echo $ride['fast_pass']; ?></p>
                    </div>
                </div>
                <?php endif;?>
            <?php  endforeach; ?>
        </main>
    </div>

</body>

</html>
