<?php
class Moteur{
	private $variables = array();
    
	public function assigner($parametre, $valeur){
		$this->variables[$parametre] = $valeur;
    }
    
	public function afficher($template){
		$repertoire = "app/template/";
		if(file_exists($repertoire.$template)){
			$contenu = file_get_contents($repertoire.$template);
			
			foreach ($this->variables as $parametre => $valeur){
				$contenu = preg_replace("/\{\{\s".$parametre."\s\}\}/", $valeur, $contenu);
            }
            
			echo $contenu;
		}else{
			exit('<h1 style="color: red;">Erreur cette template n\'existe pas.</h1>');
		}
	}
}
?>