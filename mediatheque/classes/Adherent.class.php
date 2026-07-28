<?php

namespace Mediatheque;

// ================================================================
//  CLASSE Adherent
// ================================================================

class Adherent
{
    private ?int   $id     = null;
    private string $nom;
    private string $prenom;
    private string $email;

    public function __construct(string $nom, string $prenom, string $email)
    {
        $this->nom    = $nom;
        $this->prenom = $prenom;
        $this->email  = $email;
    }

    public function getId(): ?int       { return $this->id;     }
    public function getNom(): string    { return $this->nom;    }
    public function getPrenom(): string { return $this->prenom; }
    public function getEmail(): string  { return $this->email;  }

    public function setId(int $id): void       { $this->id     = $id;    }
    public function setNom(string $n): void    { $this->nom    = $n;     }
    public function setPrenom(string $p): void { $this->prenom = $p;     }
    public function setEmail(string $e): void  { $this->email  = $e;     }
}

// ================================================================
//  CLASSE AdherentDAO
//  Hérite de DAO : les 5 méthodes CRUD sont déjà là.
//  On écrit uniquement hydrate() et dehydrate().
// ================================================================

class AdherentDAO extends DAO
{
    protected string $table = 'adherent';

    protected function hydrate(array $row): object
    {
        $a = new Adherent($row['nom'], $row['prenom'], $row['email']);
        $a->setId((int) $row['id']);
        return $a;
    }

    protected function dehydrate(object $entite): array
    {
        return [
            'nom'    => $entite->getNom(),
            'prenom' => $entite->getPrenom(),
            'email'  => $entite->getEmail(),
        ];
    }
}