<?php

class Client {
    public $nom;
    public $email;
    public $sold;

    public function __construct($nom,$email,$sold){
         $this->nom = $nom;
         $this->email =$email;
        $this->sold = $sold;
    }

    public function ajoterSold($noveauSole){
          $this->sold += $noveauSole;
          return "sold ajouter ".$this->sold;
    }

    public function debiter($soldsorter){
         if($sold >= $soldsorter){
            $this->sold -= $soldsorter;
         }else{
            echo"votre compter pas suffiant";
         }
    }


}


$zakaria= new Client("zakaria","zakaria@",100);

$ajouter = $zakaria->ajoterSold(10);
echo $ajouter;

?>