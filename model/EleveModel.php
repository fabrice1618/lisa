<?php 

class EleveModel extends Model
{
    const LISTE_CHAMPS = [
        'id' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'id_promotion' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'id_photo' => [ 
            'valid' => 'Valid::checkId',
            'default' => 0,
            'pdo_type' => PDO::PARAM_INT
        ],
        'nom' => [ 
            'valid' => 'Valid::checkStr',
            'default' => "",
            'pdo_type' => PDO::PARAM_STR
        ],
       'prenom' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'email' => [ 
        'valid' => 'Valid::checkEmail',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'mdp' => [ 
        'valid' => 'Valid::checkStr',
        'default' => "",
        'pdo_type' => PDO::PARAM_STR
       ],
       'actif' => [ 
        'valid' => 'EleveModel::checkActif',
        'default' => 0,
        'pdo_type' => PDO::PARAM_INT
    ],
];    

//    const QUERY_FIND = "SELECT * FROM device WHERE api_key = :api_key"; 
    const QUERY_INDEX = "SELECT * FROM eleve"; 
    const QUERY_CREATE = "INSERT INTO eleve(id_promotion, id_photo, nom, prenom, email, mdp, actif) VALUES (:id_promotion, :id_photo, :nom, :prenom, :email, :mdp, :actif)"; 

    public function __construct( )
    {
        parent::__construct( self::LISTE_CHAMPS );
    }



    function create() 
    {
            $stmt = $this->dbh->prepare( self::QUERY_CREATE );
            if (
                $stmt !== false &&
                $stmt->bindValue(':id_promotion', $this->nom, PDO::PARAM_INT) &&
                $stmt->bindValue(':id_photo', $this->nom, PDO::PARAM_INT) &&
                $stmt->bindValue(':nom', $this->nom, PDO::PARAM_STR) &&
                $stmt->bindValue(':prenom', $this->nom, PDO::PARAM_STR) &&
                $stmt->bindValue(':email', $this->nom, PDO::PARAM_STR) &&
                $stmt->bindValue(':mdp', $this->nom, PDO::PARAM_STR) &&
                $stmt->bindValue(':actif', $this->nom, PDO::PARAM_INT) &&
                $stmt->execute()
            ) {
                $this->id = intVal( $this->dbh->lastInsertId() ); 
            }
    }

    function index() 
    {
//        if ( $this->validate('api_key', $api_key) ) {
            $stmt = $this->dbh->prepare( self::QUERY_INDEX );
            if (
                $stmt !== false &&
                $stmt->execute()
            ) {
                $aRow = $stmt->fetchAll(PDO::FETCH_ASSOC); 
            }
//        }

        return $aRow;
    }

        // Controle si le parametre est un identifiant valide (entier positif)
        public static function checkActif( $val )
        {
            if (! is_int($val) || ( $val < 0 ) || ($val > 1) ) {
                throw new Exception("Erreur: parametre incorrect - attendu: entier positif");
            }
    
            return(true);
        }
    
}
