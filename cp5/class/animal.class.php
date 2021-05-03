<?php

/**
 * Initiation à la POO en PHP
 * Classe Animal
 */
class Animal
{
    // Attributs publics
    public $name;
    public $type;

    // Attributs privés 
    private $dob;
    private $weight;
    private $female;

    // Constructeur
    public function __construct(string $newName, string $newType, string $newDob, float $newWeight, bool $newFemale)
    {
        $this->name = $newName;
        $this->type = $newType;
        $this->setDob($newDob);
        $this->setWeight($newWeight);
        $this->setFemale($newFemale);
    }

    // Accesseurs et mutateurs
    public function getDob()
    {
        return $this->dob;
    }

    public function setDob(string $newDob)
    {
        // teste si param est une date
        if ((bool) strtotime($newDob)) {
            $this->dob = $newDob;
        } else {
            throw new Exception(__CLASS__ . ' : Le paramètre doit être une date.');
        }
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight(float $newWeight)
    {
        // teste si le poids est cohérent
        if ($newWeight < .2 || $newWeight > 1000) {
            throw new Exception(__CLASS__ . ' : Le poids doit être compris entre 200g et 1t.');
        } else {
            $this->weight = $newWeight;
        }
    }

    public function getFemale()
    {
        return $this->female;
    }

    public function setFemale(bool $newFemale)
    {
        $this->female = $newFemale;
    }
}
