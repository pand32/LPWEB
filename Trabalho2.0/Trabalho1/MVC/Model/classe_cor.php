<?php

class Cor {

    private int $id_cor;
    private string $desc_cor;

    function __construct(){
        $this->id_cor = 0;
        $this->desc_cor = "";

        echo "Criei um objeto da classe Cor "._CLASS_;
    }
    function GetId_cor(){
        return $this->id_cor;
    }

    function SetId_cor(int $pId_cor){
        $this->id_cor = $pId_cor;
    }

    function GetDesc_cor(){
        return $this->desc_cor;
    }

    function SetDesc_cor(string $pDesc_cor){
        $this->desc_cor = $pDesc_cor;
    }
}
    $Cor1 = new Cor;
