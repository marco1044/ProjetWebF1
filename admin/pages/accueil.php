<h2 class="txtRouge">Bienvenue chez Berlioz Délices</h2>

<?php
$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("accueil");
?>
<div class="row">
    <div class="col-sm-8">
        <div id="gt_carousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators : qui indiquent l'image affichée -->
            <ol class="carousel-indicators">
                <li data-target="#gt_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#gt_carousel" data-slide-to="1"></li>
                <li data-target="#gt_carousel" data-slide-to="2"></li>
                <li data-target="#gt_carousel" data-slide-to="3"></li>
                <li data-target="#gt_carousel" data-slide-to="4"></li>
            </ol>   
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="./admin/images/gt_dia1.jpg" alt="First Slide">
                </div>
                <div class="item">
                    <img src="./admin/images/gt_etalage.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="./admin/images/gt_tasse_cake.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="./admin/images/gt_birthday.jpg" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="./admin/images/gt_tea_time.jpg" alt="Third Slide">
                </div>
            </div>
            <!-- Carousel controls -->

            <a class="carousel-control left" href="#gt_carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#gt_carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div class="col-sm-4"><br/>
<?php
print "<span class='txt150 txtGras'>" . utf8_encode($texte[0]->texte) . "</span>";
?>
        </p> 
    </div>
</div>

