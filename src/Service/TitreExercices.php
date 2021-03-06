<?php

namespace App\Service;

use PDO;

class TitreExercices
{
    public static function titreExercices(array $exercices): array
    {
        $pdo = new PDO('mysql:host=jouer-collectif.com;dbname=jouer_collectif', 'wcs', '8AM2dkGx');
        $resultat = [];
        foreach ($exercices as $k => $temp) {
            foreach ($temp as $key => $id) {
                $requete = $pdo->prepare('SELECT id, titre FROM contenu WHERE id =:id');
                $requete->bindValue(':id', $id, PDO::PARAM_INT);
                $requete->execute();
                $temp = $requete->fetch();
                array_push($resultat, $temp);
            }
        }
        return $resultat;
    }

    public static function tableauTitresExercices(array $exercices): array
    {
        $pdo = new PDO('mysql:host=jouer-collectif.com;dbname=jouer_collectif', 'wcs', '8AM2dkGx');
        $tabExercices = [];
        foreach ($exercices as $id) {
            $requete = $pdo->prepare('SELECT id, titre FROM contenu WHERE id =:id');
            $requete->bindValue(':id', $id, PDO::PARAM_INT);
            $requete->execute();
            $data = $requete->fetch();

            if(isset($data['titre'])){
                $tab_temp = [
                    $id => $data['titre']
                ];
                array_push($tabExercices, $tab_temp);
            }
            $tab_temp = null;
        }
        return $tabExercices;
    }

    public static function unTitre(int $id): string
    {
        $pdo = new PDO('mysql:host=jouer-collectif.com;dbname=jouer_collectif', 'wcs', '8AM2dkGx');
        $requete = $pdo->prepare('SELECT titre FROM contenu WHERE id =:id');
        $requete->bindValue(':id', $id, PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        $titre = $resultat['titre'];
        if (strlen($titre) >= 60) {
            $titre = substr($titre, 0, 38) . '...';
        }
        return $titre;
    }
}
