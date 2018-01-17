<?php

function afficheMontant($montant = 0){
    if (0 == $montant)
        return 'GRATUIT';
    else
        return $montant.' DA';
}