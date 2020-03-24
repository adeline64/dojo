<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerArticleCategorie extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM ArticleCategorie WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$ArticleCategorie = new ArticleCategorie($array);

		return $ArticleCategorie;
    }
    
    public function getAllArticleCategorie() {
		$ArticleCategorie = $this->db->query("SELECT * FROM ArticleCategorie");

		return $ArticleCategorie->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getArticleCategorie($id) {
		$article = "SELECT * FROM ArticleCategorie WHERE id=:id";
		//preparation == protection des donn�es � venir
		$articles = $this->db->prepare($article);
		//liaison des marqueur :toto aux donnees
		$articles->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		$articles->execute();
		return $articles;
	}

	public function add( $data) {
		//bloc try/catch pour g�rer les exceptions
		//provenant de commentaire
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		// debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		// debug($data);
		try {
			$ArticleCategorie = new ArticleCategorie( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO ArticleCategorie (id_categorie)VALUES(:id_categorie)');
		$req->bindValue('id_categorie', $ArticleCategorie->getId_categorie(), PDO::PARAM_INT);
		$req->execute();
		$id = $this->db->lastInsertId();
		$ArticleCategorie->setId($id);
		return $ArticleCategorie;
	}

	public function update($data){
        $req = $this->db->prepare('UPDATE ArticleCategorie SET id_categorie WHERE id =:id');
		$req->bindValue('id', $data->getId(), PDO::PARAM_INT);
		$req->bindValue('id_categorie', $data->getId_categorie(), PDO::PARAM_INT);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
	}


	public function delete($id) {
		$req = "DELETE FROM ArticleCategorie WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}