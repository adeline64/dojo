<?php

class categorie {


	private $id;
	private $nom;

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
	 * Get the value of nom
	 */ 
	public function getNom()
	{
		return $this->nom;
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
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom($nom)
        {
            $this->nom = $nom;

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