<?php
$samlfile = '/var/simplesaml/lib/_autoload.php';
$landesverband = 0;
$is_berlin = false;

if (file_exists($samlfile)) {
    require_once($samlfile);
    $as = new SimpleSAML_Auth_Simple('default-sp');
    $as->requireAuth();

    $attributes = $as->getAttributes();
    $landesverband = (int) substr($attributes['membershipOrganizationKey'][0], 1, 2);

    if( $landesverband == 3){
        $is_berlin = true;
    }
}

if (file_exists('log/do.php')){
    require_once('log/do.php');
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8"/>
    <title>Logogenerator</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center pt-4 pb-3">
            <h1 class="text-uppercase h6">Logogenerator</h1>
        </div>
        <div class="col-12 col-md-4 offset-md-4 mb-5 cockpit">
            <input type="text" name="subline" id="subline" value="" placeholder="Deine Stadt" class="form-control">
            <div class="message bg-danger text-white small p-2">
                Die Worte Kreisverband, Ortsverband, KV und OV sind nicht 
                nötig im Logo. Überlege bitte, ob Du sie wirklich brauchst.
            </div>
        </div>
    </div>
    <div class="row">
        <?php for($i = 1; $i <= 3; $i++){ ?>
            <div class="col-12 col-md-4 mb-5 text-center">
                <div id="canvas<?php echo $i;?>" class="canvas <?php if(in_array($i,array(2,5))) echo 'bg-chess'; ?>"></div>
                    <button class="btn btn-secondary btn-sm mt-3 download" data-canvas="<?php echo $i;?>" data-format="png">
                        <i class="fas fa-download"></i> png
                    </button>
                    <button class="btn btn-secondary btn-sm mt-3 download" data-canvas="<?php echo $i;?>" data-format="svg">
                        <i class="fas fa-download"></i> svg
                    </button>
            </div>
        <?php } ?>
    </div>

    <div class="row <?php if( !$is_berlin) echo 'd-none'?>">
        <div class="col-12 text-center pt-4 pb-3">
            <h1 class="text-uppercase h6">Logovariante Berlin</h1>
        </div>

        <?php for($i = 4; $i <= 6; $i++){ ?>
            <div class="col-12 col-md-4 mb-5 text-center">
                <div id="canvas<?php echo $i;?>" class="canvas <?php if(in_array($i,array(2,5))) echo 'bg-chess'; ?>"></div>
                    <button class="btn btn-secondary btn-sm mt-3 download" data-canvas="<?php echo $i;?>" data-format="png">
                        <i class="fas fa-download"></i> png
                    </button>
                    <button class="btn btn-secondary btn-sm mt-3 download" data-canvas="<?php echo $i;?>" data-format="svg">
                        <i class="fas fa-download"></i> svg
                    </button>
            </div>
        <?php } ?>

    </div>
    
</div>

<footer class="row bg-primary p-2 text-white">
    <div class="col-12 col-lg-8">
        <a href="https://github.com/codeispoetry/logogenerator" target="_blank">Quellcode auf
            github.com</a>
    </div>
    <div class="col-12 col-lg-5 d-none">
        <a href="#" class="persistentsave">Als Vorlage speichern</a>

        <?php foreach (glob("persistent/*.json") as $filename) { ?>
            | <a href="#" class="persistentpic" data-pic="<?php echo $filename;?>"><?php echo ucfirst(basename($filename, '.json'));?></a>
        <?php } ?>
    </div>
    <div class="col-12 col-lg-4 text-lg-right">
        Programmiert mit <i class="fas fa-heart text-danger"></i> von Tom Rose.
    </div>
</footer>





<script src="./vendor/jquery-3.4.1.min.js"></script>
<script src="./vendor/svg.min.js"></script>

<script src="./assets/js/main.min.js"></script>
</body>
</html>