<?php

class article {


	private $id;
	private $titre;
	private $contenu;
	private $image;
    private $datePublication;
    private $statut;

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
    
    public function getImage()
	{
		return $this->image;
    }
    
    /**
         * Get the value of datePublication
         */ 
        public function getDatePublication()
        {
            return $this->datePublication;
        }

    /**
	 * Get the value of statut
	 */ 
	public function getStatut()
	{
		return $this->statut;
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
	 * Set the value of image
	 *
	 * @return  self
	 */ 
	public function setImage($image)
	{
		$this->image = $image;

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
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = $statut;

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