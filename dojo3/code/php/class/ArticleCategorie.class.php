<?php

class ArticleCategorie {


	private $id;
	private $id_categorie;

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
         * Get the value of id_categorie
         */ 
        public function getId_categorie()
        {
            return $this->id_categorie;
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
     * Set the value of id_categorie
     *
     * @return  self
     */ 
    public function setId_categorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;

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