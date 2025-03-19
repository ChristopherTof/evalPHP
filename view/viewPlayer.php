<?php
//LA VIEW POUR LA CLASS ViewPlayer
class viewPlayer {
    private ?string $signUpMessage = "";
    private ?string $playerList = "";


    //GETTER ET SETTER
    public function getSignUpMessage(): ?string {
        return $this->signUpMessage;
    }
    public function setSignUpMessage(?string $signUpMessage): self {
        $this->signUpMessage = $signUpMessage;
        return $this;
    }


    public function getPlayerList(): ?string {
        return $this->playerList;
    }
    public function setPlayerList(?string $playerList): self {
        $this->playerList = $playerList;
        return $this;
    }

    //METHODS
    public function displayView(): string {
        ob_start();
?>
        <h1>Accueil</h1>
        <h2>Inscription d'un Joueur</h2>

        <form action="" method="POST">

            <input type="text" name="pseudo" id="pseudo" placeholder='Votre Pseudo'>

            <input type="email" name="email" id="email" placeholder='Votre Email'>

            <input type="password" name="password" id="password" placeholder='Votre mot de passe'>

            <input type='number' name='score' id='score' placeholder='Votre score'>

            <button type='submit'>Envoyer</button>

        </form>
        <p><?= $this->signUpMessage ?></p>

        <section>
            Creer une boucle for pour afficher les joueurs
        </section>

<?php
        return ob_get_clean();
    }
}
