
<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerutilisateurArticle extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM utilisateurArticle WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$utilisateurArticle = new utilisateurArticle($array);

		return $utilisateurArticle;
    }
    
    public function getAllutilisateurArticle() {
		$utilisateurArticle = $this->db->query("SELECT * FROM utilisateurArticle");

		return $utilisateurArticle->fetchAll(PDO::FETCH_ASSOC);
	}

	public function add( $data) {
		//bloc try/catch pour g�rer les exceptions
		//provenant de commentaire
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		// debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		// debug($data);
		try {
			$utilisateurArticle = new utilisateurArticle( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO categorie (id_utilisateur)VALUES(:id_utilisateur)');
		$req->bindValue('id_utilisateur', $utilisateurArticle->getId_utilisateur(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$utilisateurArticle->setId($id);
		return $utilisateurArticle;
	}

	public function update($data){
        $req = $this->db->prepare('UPDATE utilisateurArticle SET id_utilisateur WHERE id =:id');
		$req->bindValue('id', $data->getId(), PDO::PARAM_INT);
		$req->bindValue('id_utilisateur', $data->utilisateurArticle(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
	}


	public function delete($id) {
		$req = "DELETE FROM utilisateurArticle WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}