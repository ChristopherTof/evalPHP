<?php
//FICHIER D'EXECUTION
include 'utils/utils.php';
include 'view/header.php';
include 'view/footer.php';
include 'view/viewPlayer.php';
include 'interface/interfaceModel.php';
include 'model/playerModel.php';
include 'abstract/abstractController.php';
include 'controller/playerController.php';

try {
    $display = new PlayerController(new viewHeader(), new viewFooter(), new playerModel($bdd), new viewPlayer());
    $display->render();
} catch (\Throwable $th) {
    echo $th;
}
