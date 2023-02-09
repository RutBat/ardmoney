<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 0!important; padding-bottom: 0;">
  



<div class="container" style = "display: initial;">
  <div class="row">
    <div class="col-9">
    <a class="navbar-brand" href="/">
        <img src="img/logo.png?123" alt="ArdMoney" height="90px">
    </a>
    </div>
    <div class="col-3">









          <?php
    if (!empty(htmlentities($_COOKIE['user']))) {
        ?>      

            <a href="user.php">
                <img src="img/user.png?123" class="rounded mx-auto d-block" alt="Аватарка">            
            </a>















        
                <?php
    } ?>
        </div>
  </div>

</div>

    </nav>