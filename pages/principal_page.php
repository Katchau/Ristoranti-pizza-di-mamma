<?php include_once('header.php'); ?>

<link rel="stylesheet" href="../css/principal_page.css">

<div id="middle">
    <img src="../res/backgroundPhoto.jpg"/>
    <div id="middle-elements">
        <div id="search-bar">
            <img  src="../res/logo.png"/>
            <form action="" method="post">
                <input id="searchLocal" type="text" name="local_search" placeholder="Pesquisar por local..."/>
                <input id="searchRestaurant" type="text" name="restaurant_search" placeholder="Pesquisar por restaurante..."/>
                <ul id="txtHint">
				</ul>
            </form>
        </div>
    </div>
    <div id="quick-search">
        <input id="fast-food" type="submit" value="" name="quick"/>
        <input id="pastelaria" type="submit" value="" name="quick"/>
        <input id="cafe" type="submit" value="" name="quick"/>
        <input id="gourmet" type="submit" value="" name="quick"/>
        <input id="beber" type="submit" value="" name="quick"/>
    </div>
</div>

<?php include_once('footer.php'); ?>
