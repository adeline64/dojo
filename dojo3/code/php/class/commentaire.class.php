<?php

class commentaire {


	private $id;
	private $titre;
	private $contenu;
	private $datePublication;
	private $id_article;

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
	 * Get the value of titre
	 */ 
	public function getTitre()
	{
		return $this->titre;
    }

    /**
	 * Get the value of contenu
	 */ 
	public function getContenu()
	{
		return $this->contenu;
	}
    
    /**
         * Get the value of datePublication
         */ 
        public function getDatePublication()
        {
            return $this->datePublication;
        }

    /**
	 * Get the value of id_article
	 */ 
	public function getId_article()
	{
		return $this->id_article;
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
	 * Set the value of titre
	 *
	 * @return  self
	 */ 
	public function setTitre($titre)
	{
		$this->titre = $titre;

		return $this;
	}

	/**
	 * Set the value of contenu
	 *
	 * @return  self
	 */ 
	public function setContenu($contenu)
	{
		$this->contenu = $contenu;

		return $this;
	}

	/**
	 * Set the value of datePublication
	 *
	 * @return  self
	 */ 
	public function setDatePublication($datePublication)
	{
		$this->datePublication = $datePublication;

		return $this;
	}

	/**
	 * Set the value of id_article
	 *
	 * @return  self
	 */ 
	public function setId_article($id_article)
	{
		$this->id_article = $id_article;

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