#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: categorie
#------------------------------------------------------------

CREATE TABLE categorie(
        id_cat      Int  Auto_increment  NOT NULL ,
        libelle_cat Varchar (255) NOT NULL
	,CONSTRAINT categorie_PK PRIMARY KEY (id_cat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: articles
#------------------------------------------------------------

CREATE TABLE articles(
        id_art      Int  Auto_increment  NOT NULL ,
        code_art    Varchar (10) NOT NULL ,
        libelle_art Varchar (255) NOT NULL ,
        prix_ht     Float NOT NULL ,
        promo_art   Bool NOT NULL ,
        id_cat      Int NOT NULL
	,CONSTRAINT articles_PK PRIMARY KEY (id_art)

	,CONSTRAINT articles_categorie_FK FOREIGN KEY (id_cat) REFERENCES categorie(id_cat)
)ENGINE=InnoDB;

