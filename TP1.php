<!-- TP PHP
Héritage possible entre une classe mère et les classes "étudiant" et "professeur".

Un étudiant n'est inscrit que dans une université et pour un seul cursus.
un professeur est attaché à une ville mais peut enseigner dans plusieurs villes. Il peut éventuellement enseigner plusieurs matières.

 -->

<?php


class personne
{
	protected $nom;
	protected $prenom;
	protected $adresse;
	protected $age;
	
	public function __construct($nom,$prenom,$adresse,$age)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
		$this->age=$age;
	}
	
	public function get($prop)
	{
		return $this->$prop; 
	}

	public function set($prop,$val)
	{
		$this->$prop=$val;
	}

}






class etudiant extends personne
{
	private $coeff;
	private $frais;
	private $ufr;
	private $ville;
	private $idE;
	
	private static $id=0;




	public function __construct(personne $pers,$c,$f,$u,$v)
	{
		parent:: __construct($pers->get('nom'),$pers->get('prenom'),$pers->get('adresse'),$pers->get('age'));
		$this->coeff=$c;
		$this->frais=$f;
		$this->ufr=$u;
		$this->ville=$v;
		
		$this->idE=self::$id++;

	}

	public function get($prop)
	{
		return $this->$prop; 
	}
}

class prof extends personne
{
	private $salaire;
	private $ufr;
	private $ville;
	private $idP;

	private static $id=0;

	
	public function __construct(personne $pers,$s,$u,$v)
	{
		parent::__construct($pers->get('Nom'),$pers->get('Prenom'),$pers->get('Adresse'),$pers->get('age'));
		$this->salaire=$s;
		$this->ufr=$u;
		$this->ville=$v;

		$this->idP=self::$id++;
	}
	
}

class cours
{
	private $theme;
	private $ufr;
	private $tabcours = array();

	public function __construct($t,$u)
	{
		$this->theme=$t;
		$this->ufr=$u;
	}


}

$pers = new personne('Norris', 'Chuck', "21 rue de la soif Rennes", '51');

// echo $pers->get('nom')."</br>";


// $moi1 = new personne('Fleury','Arnaud','1Ter rue de la blandinière Le Fuilet','37');

// echo $moi1->get('nom')."</br>";
// echo $moi1->get('age')."</br>";


$moi = new etudiant(new personne('Fleury','Arnaud','1Ter rue de la blandinière Le Fuilet','37'),'12000','100E','sciences de la vie', 'Nantes');
echo $moi->get('age')."</br>";
echo $moi->get('nom')."</br>";
echo $moi->get('ville')."</br>";



?>