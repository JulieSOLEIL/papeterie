<?php

class Article {

    private int $id_art;
    private string $libelle_art;
    private string $code_art;
    private float $prixHT_art;
    private int $promo_art;

    public function __construct(int $idArt = 0, string $libelleArt = '', string $codeArt = '', float $prixHTArt = 0.0, int $promoArt = 0)
    {
        $this->id_art = $idArt;
        $this->libelle_art = $libelleArt;
        $this->code_art = $codeArt;
        $this->prixHT_art = $prixHTArt;
        $this->promo_art = $promoArt;
    }

    public function getIdArt() {
        return $this->id_art;
    }
    public function getLibelleArt() {
        return $this->libelle_art;
    }
    public function getCodeArt() {
        return $this->code_art;
    }
    public function getPrixHTArt() {
        return $this->prixHT_art;
    }
    public function getPromoArt() {
        return $this->promo_art;
    }
    
}
