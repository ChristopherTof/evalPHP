<?php
//LA CLASSE ABSTRAITE AbstractController.php
abstract class AbstractController {
    //ATTRIBUTS
    private ?viewHeader $header;
    private ?viewFooter $footer;
    private ?InterfaceModel $model;

    //CONSTRUCT
    public function __construct(?viewHeader $header, ?viewFooter $footer, ?InterfaceModel $model) {
        $this->header = $header;
        $this->footer = $footer;
        $this->model = $model;
    }
    //GETTER SETTER
    public function getHeader(): ?viewHeader {
        return $this->header;
    }

    public function setHeader(?viewHeader $header): self {
        $this->header = $header;
        return $this;
    }

    public function getFooter(): ?viewFooter {
        return $this->footer;
    }
    public function setFooter(?viewFooter $footer): self {
        $this->footer = $footer;
        return $this;
    }

    public function getModel(): ?InterfaceModel {
        return $this->model;
    }
    public function setModel(?InterfaceModel $model): self {
        $this->model = $model;
        return $this;
    }

    //METHODS
    public abstract function render(): void;
}
