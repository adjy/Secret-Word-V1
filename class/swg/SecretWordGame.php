<?php

namespace swg;


class SecretWordGame{
    private array $motSecret ;
    public array $resultFinal;
    public array $avanceJoueur;
    public function __construct(string $secret){
        $this->motSecret = str_split($secret);
        $this->avanceJoueur = $this->motSecret;

        foreach ($this->motSecret as $key =>$value)
            if($value != " ")
                $this->avanceJoueur[$key] = "?";

        $this->resultFinal = array(
            'word'  => $this->motSecret,
            'win' => false,
            'result' => join($this->avanceJoueur),
        );
    }
    public function try(?array $word=null): array{
			
        if($word == $this->motSecret)
            $this->resultFinal['win'] = true;

        foreach ($this->motSecret as $key =>$value) {
            if(array_key_exists($key, $word) && $word[$key] == $this->motSecret[$key]) {
                $this->avanceJoueur[$key] = $value;
            }
        }

        $this->resultFinal['result'] =  join($this->avanceJoueur);
        return $this->resultFinal;
    }

    public function generateInput(?array $response): void{?>

        <div class="motCache">
            <?php echo $response['result']?>
        </div>

        <form action="index.php" method="post" class="form">
            <input type="text" name="mot" id="mot" value="<?php
            if (isset($_POST['mot']))
                echo $_POST['mot'];
            else
                echo ''; ?>">
            <input type="submit" value="TRY!" class="btn">
        </form>

        <?php }
        public function generateWin() : void{?>

            <div class="motCache">
                <?php echo join($this->motSecret)?>
            </div>
            <div class="gagne">
                !!! YOU WIN !!!
            </div>
        <?php }
}

