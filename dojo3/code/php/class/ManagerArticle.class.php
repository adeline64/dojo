<?php
/**
 * Created by PhpStorm.
 * User: Adeline
 * Date: 23/02/2019
 * Time: 09:45
 */

class ManagerArticle extends Manager{

	public function construct($mode='prod') {
		parent::__construct( $mode );
	}

	public function read($id){
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		$req = $this->db->prepare('SELECT * FROM article WHERE id =:id');
		$req->bindValue('id', $id, PDO::PARAM_INT);
		$req->execute();
		$array = $req->fetch(PDO::FETCH_ASSOC);
		$article = new article($array);

		return $article;
    }
    
    

	public function getAllArticle() {
        $stmt = $this->db->query("SELECT * FROM article ");
        $articles = array();
        while ($data = $stmt->fetch()) {
            $article = new article($data);
            $articles[$article->getId()] = $article;
        }
        return $articles;
    }

	public function getArticle($id) {
		$article = "SELECT * FROM article WHERE id=:id";
		//preparation == protection des donn�es � venir
		$articles = $this->db->prepare($article);
		//liaison des marqueur :toto aux donnees
		$articles->bindValue('id',$id,PDO::PARAM_INT);
		//execution de la requete sur le serveur SQL
		if ($articles->execute() == true) {
			return new article($articles->fetch());
		}  else {
			return FALSE;
		}
	}

	public function add( $data) {
		//bloc try/catch pour g�rer les exceptions
		//provenant de commentaire
		// echo '<br>[debug]Dans "'.__FUNCTION__.'" [/debug]';
		// debug('<br>[debug]Dans "'.__CLASS__."::".__FUNCTION__.'" [/debug]');
		// debug($data);
		try {
			$article = new article( $data);
		} catch (LengthException $lengthException) {
			//cas longueur == 0
			throw new Exception($lengthException->GetMessage(),$lengthException->GetCode());
		} catch (Exception $exception) {
			//autre cas (mais pour nous invalide)
			throw new Exception($exception->GetMessage(),$exception->GetCode());
		}
		$req = $this->db->prepare('INSERT INTO article (titre,contenu,image,datePublication,statut)VALUES(:titre,:contenu,:image,:datePublication,:statut)');
		$req->bindValue('titre', $article->getTitre(), PDO::PARAM_STR);
        $req->bindValue('contenu', $article->getContenu(), PDO::PARAM_STR);
        $req->bindValue('image', $article->getImage(), PDO::PARAM_STR);
		$req->bindValue('datePublication', $article->getDatePublication(), PDO::PARAM_STR);
		$req->bindValue('statut', $article->getStatut(), PDO::PARAM_STR);
		$req->execute();
		$id = $this->db->lastInsertId();
		$article->setId($id);
		return $article;
	}

	public function update($data){
        $req = $this->db->prepare('UPDATE article SET titre=:titre,contenu=:contenu,image=:image,datePublication=:datePublication,statut=:statut WHERE id =:id');
		$req->bindValue('id', $data->getId(), PDO::PARAM_INT);
		$req->bindValue('titre', $data->getTitre(), PDO::PARAM_STR);
		$req->bindValue('contenu', $data->getContenu(), PDO::PARAM_STR);
		$req->bindValue('image', $data->getImage(), PDO::PARAM_STR);
		$req->bindValue('datePublication', $data->getDatePublication(), PDO::PARAM_STR);
		$req->bindValue('statut', $data->getStatut(), PDO::PARAM_STR);
        if (! $req->execute()) {
	        echo "<br>[debug] Erreur";
        }
	}


	public function delete($id) {
		$req = "DELETE FROM article WHERE id=:id";
		$stmt = $this->db->prepare($req);
		$stmt->execute();
		if ($stmt->rowCount() == 1) {
			echo '[debug]OK 1 ligne inseree';
		} else {
			echo 'Erreur insertion donnees';
		}

	}



}