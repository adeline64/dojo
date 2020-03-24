<?php

class utilisateurArticle {


	private $id;
	private $id_utilisateur;

	public function __construct( array $array =[] )
	{
		$this->hydrate($array);
	}

// LES GETTERS
/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
    }

    /**
	 * Get the value of id_utilisateur
	 */ 
	public function getId_utilisateur()
	{
		return $this->id_utilisateur;
	}

    /**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}
	
	/**
	 * Set the value of id_utilisateur
	 *
	 * @return  self
	 */ 
	public function setId_utilisateur($id_utilisateur)
	{
		$this->id_utilisateur = $id_utilisateur;

		return $this;
	}
	
	// HYDRATATION

	public function hydrate($array){
		foreach ($array as $key => $value) {
			$methodName = 'set'.ucfirst($key);
			if(method_exists($this, $methodName)){
				$this->$methodName($value);
			}
		}
	}

}