<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerCategorie extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM categorie WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$categorie = new categorie($array);

		return $categorie;
    }
    
    public function getAllCategorie() {
		$categorie = $this->db->query("SELECT * FROM categorie");

		return $categorie->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getCategorie($id) {
		$categorie = "SELECT * FROM categorie WHERE id=:id";
		//preparation == protection des donn�es � venir
		$categories = $this->db->prepare($categorie);
		//liaison des marqueur :toto aux donnees
		$categories->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		$categories->execute();
		return $categories;
	}

	public function add( $data) {
		//bloc try/catch pour g�rer les exceptions
		//provenant de commentaire
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		// debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		// debug($data);
		try {
			$categorie = new categorie( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO categorie (nom)VALUES(:nom)');
		$req->bindValue('nom', $categorie->getNom(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$categorie->setId($id);
		return $categorie;
	}

	public function update($data){
        $req = $this->db->prepare('UPDATE categorie SET nom WHERE id =:id');
		$req->bindValue('id', $data->getId(), PDO::PARAM_INT);
		$req->bindValue('nom', $data->getNom(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
	}


	public function delete($id) {
		$req = "DELETE FROM categorie WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}