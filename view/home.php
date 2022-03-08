<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/phpmotors/stylesheet/Index.css">
    
    <title>Enhancement 1 | PHP Motors</title>
<body>
<header>
<?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/header.php'; ?>
</header>
<nav>
<?php //include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/nav.php';
 echo $navList; ?>
</nav>
    <main>
        <h1>Welcome to PHP Motors</h1>
        <div class="headerContainer">  
            <section class="features">
                <div class="feature">
                    <h2>DMC Delorean</h2>
                    <p>3 cup holders</p>
                    <p>Superman doors</p>
                    <p>Fuzzy dice!</p>
                </div>
            </section>
            <div class="button">
                <button class="call2Action">Own Today</button>
            </div>
            <section class="vehicle">
                
            
                <img src="/phpmotors/images/site/delorean.jpg" alt="Delorean Vehicle image">
                
            </section>
        </div>
        <div class="regrades">
            <section class="reviews">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast its almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly." (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's living and i love it." (5/5)</li>
                </ul>
            </section>
            <section class="upgrades">
                <h2>Delorean Upgrades</h2>
                <div class="upgradeContainer">
                    <div class="upgrade1">
                        <div class="img">
                            <img src="/phpmotors/images/site/flux-cap.png" alt="flux-cap upgrade image" />
                        </div>
                        <p>Flux Capacitor</p>
                    </div>
                    <div class="upgrade2">
                        <div class="img">
                            <img src="/phpmotors/images/site/flame.jpg" alt="flame upgrade image" />
                        </div>
                        <p>Flame Decals</p>
                    </div>
                    <div class="upgrade3">
                        <div class="img">
                            <img src="/phpmotors/images/site/bumper_sticker.jpg" alt="bumper sticker upgrade image" />
                        </div>
                        <p>Bumper Sticker</p>
                    </div>
                    <div class="upgrade4">
                        <div class="img">
                            <img src="/phpmotors/images/site/hub-cap.jpg" alt="hub caps upgrade image" />
                        </div>
                        <p>Hub Caps</p>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <hr>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']. '/phpmotors/snippets/footer.php'; ?>    
    </footer>
   
</body>