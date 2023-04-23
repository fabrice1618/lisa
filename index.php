<?php 

require_once("autoload.php");

date_default_timezone_set('Europe/Paris');

if ( !isset($_SERVER['DOCUMENT_ROOT'])) {
    throw new \Exception("Fatal error: This application must be run in a web environnement.", 1);
}

$sBasepath=$_SERVER['DOCUMENT_ROOT'].'/';   // Chemin de la base de l'application avec un slash final

$promo = new PromotionModel();

echo html_head() . html_eleve_ajout($promo->index()) . html_endbody();



function html_eleve_ajout($aPromos)
{
/*
    $aPromos = array( 
        [ "id" => "1", "desc" => "BTS SN21" ],
        [ "id" => "2", "desc" => "BTS SN22" ],
    );
*/
    $page_template = <<<END
        <div class="container">
        <fieldset>
        <legend>Ajouter élève</legend>

        <form action="ajout_user.php" method="post">

            <div class="row mb-3 mt-5">
            <div class="col-2">
                <label for="nom" class="form-label text-left">Nom</label>
            </div>
            <div class="col-5">
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-2">
                <label for="prenom" class="form-label">Prenom</label>
            </div>
            <div class="col-5">
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-2">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-5">
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-2">
                <label for="password" class="form-label">Password</label>
            </div>
            <div class="col-5">
                <input type="password" class="form-control" id="password" name="password" minlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
            <div class="col-2">
                <label for="promotion" class="form-label">Promotion</label>
            </div>
            <div class="col-5">
                %s
            </div>
            <div class="col"></div>
            </div>

            <div class="row mb-3">
                <div class="col-2">
                </div>
                <div class="col-5">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                <div class="col"></div>
            </div>

        </form>
        </fieldset>


      </div>
END;

    $page = sprintf($page_template, html_select_promo( $aPromos ));

    return $page;

}

function html_select_promo( $aPromos )
{


    $html = <<<END
    <select class="form-select" name="promotion" id="promotion">
    <option selected>Choisir une promotion</option>
END;

    $select_template_line = PHP_EOL.'<option value="%s">%s</option>'.PHP_EOL;

    foreach($aPromos as $aPromo) {
//        print_r($aPromo);
        $html .= sprintf($select_template_line, $aPromo['id'], $aPromo['nom']);
    }


    $html .= "</select>".PHP_EOL;

    return($html);    
}

function html_head()
{
    $html = <<<END
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lisa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      </head>
      <body>
END;

    return($html);
}

function html_endbody()
{
    $html = <<<END
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>        
  </body>
</html>
END;

    return($html);
}    
