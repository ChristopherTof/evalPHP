<?php
//LE CONTROLLER pour la class PlayerController
class PlayerController extends AbstractController {
    // ///ATTRIBUTS
    private ?viewPlayer $player;

    // //CONSTRUCT
    public function __construct(?viewHeader $header, ?viewFooter $footer, ?InterfaceModel $model, ?viewPlayer $player) {
        parent::__construct($header, $footer, $model);
        $this->player = $player;
    }

    /// GETTER SETTER
    public function getPlayer(): ?viewPlayer {
        return $this->player;
    }
    public function setPlayer(?viewPlayer $player): self {
        $this->player = $player;
        return $this;
    }

    public function render(): void {
        echo $this->getHeader()->displayView();
        echo $this->getPlayer()->displayView();
        echo $this->getFooter()->displayView();
    }
}
