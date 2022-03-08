<div id="logo">
    <img src="/phpmotors/images/site/logo.png" alt="Logo image">
</div>
<div id="account">
    <?php
    if (isset($_SESSION['loggedin'])) {
        echo "<a href='/phpmotors/accounts/' class='welcome' > Welcome " . $_SESSION['clientData']['clientFirstname']  ." | </a>"
    ?>

        <a href="/phpmotors/accounts/?action=logout" class="acc">logout</a>
    <?php } else { ?>
        <a href="/phpmotors/accounts/?action=deliverLoginView" title="Login.or.Register.with.PHP.Motors" id="acc">My Account</a>
    <?php

    }




    ?>
</div>

<!-- /phpmotors/view/registeration.php -->
<!-- /phpmotors/accounts/index.php?action=<?php echo urlencode("deliverLoginView"); ?> -->