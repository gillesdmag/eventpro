<?php

if (!function_exists("date_formater")) {
    function date_formater($date){
       
       $m=date('n',strtotime($date));
       $jourMois=date('j',strtotime($date));
       $annee=date('Y',strtotime($date));
       $heure=date('H',strtotime($date));
       $minutes=date('i',strtotime($date));
       $lundi=date('w',strtotime($date));

       $Mois=["Jan","Fre","Mar","Avr","Mai","Jui","Juil","Aou","Sep","Oct","Nov","Dec"];
       $mois=$Mois[$m-1];
       $Jours=["Dim","Lun","Mar","Mer","Jeu","Ven","Sam"];
       $jour=$Jours[$lundi];

       return array("jour"=>$jour,"mois"=>$mois,"jourMois"=>$jourMois,"heure"=>$heure,"minutes"=>$minutes,"annee"=>$annee);
       

    }
}


?>