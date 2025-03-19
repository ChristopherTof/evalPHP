<?php
//MODEL POUR LA CLASS ModelPlayer
class PlayerModel implements InterfaceModel {
    //ATRIBUTS
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?int $score;
    private  ?string $password;
    private ?PDO $bdd;


    // CONSTRUCT
    public function __construct(?PDO $bdd) {
        $this->bdd = $bdd;
    }

    // GETTER SETTER

    public function getId(): ?int {
        return $this->id;
    }
    public function setId(?int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getPseudo(): ?string {
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): self {
        $this->pseudo = $pseudo;
        return $this;
    }


    public function getEmail(): ?string {
        return $this->email;
    }
    public function setEmail(?string $email): self {
        $this->email = $email;
        return $this;
    }


    public function getScore(): ?int {
        return $this->score;
    }
    public function setScore(?int $score): self {
        $this->score = $score;
        return $this;
    }


    public function getPassword(): ?string {
        return $this->password;
    }
    public function setPassword(?string $password): self {
        $this->password = $password;
        return $this;
    }

    //METHODS
    /**
     * Fonction d'enregistrement d'un jouer en BDD
     * @return string
     */
    public function add(): string {
        $pseudo = $this->pseudo;
        $email = $this->email;
        $score = $this->score;
        $password = $this->password;
        try {
            $req = $this->bdd->prepare(
                "INSERT INTO players (pseudo, email, score, pssword) VALUES(?,?,?,?)"
            );
            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $score, PDO::PARAM_INT);
            $req->bindParam(4, $password,  PDO::PARAM_STR);
            $req->execute();

            return $pseudo . " a été enregistré en BDD !";
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Function qui permet de recuperer tous les joueurs en BDD
     * @return array|string
     */
    public function getAll(): array|string {
        try {
            $req = $this->bdd->prepare(
                "SELECT pseudo, email, score FROM players"
            );
            $req->execute();
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Fonction qui permet de recuperer un joueur par son email
     * @return array|string
     */
    public function getByEmail(): array|string {
        $email = $this->email;
        try {
            $req = $this->bdd->prepare(
                "SELECT * FROM players WHERE email = ?"
            );
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
