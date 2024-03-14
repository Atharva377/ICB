<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (!(isset($_SESSION['partner_logged_in']) && $_SESSION['partner_logged_in']==true)){
    header("Location: ./dashboard.php");
  }
  if (!isset($_SESSION['type'])){
    header("Location: ../login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/root-partner.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/bottomNav.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/components/company-details.css">
    <link rel="stylesheet" href="../css/components/product_card.css">
    <link rel="stylesheet" href="../css/myproducts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        <?php include "../css/myproducts.css";?>
    </style>
    <script src="../js/fet" defer></script>
    <script src="../js/sliderAccordian.js" defer></script>
    <script src="../js/sideBar.js" defer></script>
    <script src="./js/myproducts/fetch_products.js" defer></script>

    <title>Dashboard: I Care for Bharat</title>
</head>
<body>
    <!-- Header -->
    <?php
        include "./header.php";
    ?>
    <header>
        <?php 
        include "./components/company-details.php";
        ?>
        <div class="search_bar">
            <?php 
                include "../components/searchBar.php";
            ?>
        </div>
    </header>

<main>
    <section class="products" id="products_catalog">
         <?php 
            // for($i=0;$i<10;$i++){
            //     include "./components/product-card.php";
            // }
        ?> 
    </section>
</main>

<?php
    include "./bottomNav.php"
?>
<script>
    var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    data = this.responseText;
    try{
        const data_json =JSON.parse(data);
        console.log(data_json);
        const product_catalog = document.getElementById("products_catalog");
        console.log(Object.keys(product_catalog));
        Object.keys(data_json).forEach(key => {
            // console.log(key);
            product_catalog.innerHTML+=`
                        <div class="product_card">
                <img src="../../${data_json[key]["productImg"]}" class="product_card__image" alt="">
                <div class="product_card__description">
                    <div class="product_card__description__title">${data_json[key]["name"]} : ${data_json[key]["id"]}</div>
                    <div class="product_card__description__details">
                        <div class="product_card__description__details__bought"></div>
                        <a href="./product.php?pid=${data_json[key]["id"]}"><button class="product_card__description__details__view">View <i class="fa-solid fa-circle-arrow-right"></i></button></a>
                        <div class="product_card__description__details__rating"></div>
                    </div>
                </div>
            </div>
            `;
        })
    }catch(e){
        console.log(e);
    }
  }
};
xmlhttp.open("GET", `./database/myproducts_get_data.php`, true);
xmlhttp.send();

</script>
</body>
</html> 