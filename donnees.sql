#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: IGN
#------------------------------------------------------------

CREATE TABLE IGN(
        id_IGN int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (id_IGN )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: notateur
#------------------------------------------------------------

CREATE TABLE notateur(
        id_notateur int (11) Auto_increment  NOT NULL ,
        is_admin    Bool NOT NULL ,
        nom         Varchar (25) ,
        prenom      Varchar (25) ,
        statut      Varchar (25) ,
        PRIMARY KEY (id_notateur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: externe
#------------------------------------------------------------

CREATE TABLE externe(
        id_externe int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (id_externe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: capDigital
#------------------------------------------------------------

CREATE TABLE capDigital(
        id_capDigital int (11) Auto_increment  NOT NULL ,
        PRIMARY KEY (id_capDigital )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: grilleEvaluation
#------------------------------------------------------------

CREATE TABLE grilleEvaluation(
        id_grilleEvaluation int (11) Auto_increment  NOT NULL ,
        noteEvaluation      Int NOT NULL ,
        is_marketing        Bool NOT NULL ,
        PRIMARY KEY (id_grilleEvaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: dossier
#------------------------------------------------------------

CREATE TABLE dossier(
        id_dossier         int (11) Auto_increment  NOT NULL ,
        nom_dossier        Varchar (25) NOT NULL ,
        complement_dossier Varchar (25) NOT NULL ,
        is_selectionne     Bool NOT NULL ,
        is_gagnant         Bool NOT NULL ,
        id_startUp         Int ,
        PRIMARY KEY (id_dossier )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: startUp
#------------------------------------------------------------

CREATE TABLE startUp(
        id_startUp  int (11) Auto_increment  NOT NULL ,
        nom_startUp Varchar (25) NOT NULL ,
        id_dossier  Int NOT NULL ,
        PRIMARY KEY (id_startUp )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etre
#------------------------------------------------------------

CREATE TABLE etre(
        id_notateur   Int NOT NULL ,
        id_externe    Int NOT NULL ,
        id_IGN        Int NOT NULL ,
        id_capDigital Int NOT NULL ,
        PRIMARY KEY (id_notateur ,id_externe ,id_IGN ,id_capDigital )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: evaluer
#------------------------------------------------------------

CREATE TABLE evaluer(
        id_evaluation       int (11) Auto_increment  ,
        question_evaluation Varchar (25) ,
        reponse_evaluation  Varchar (25) ,
        type_evaluation     Varchar (25) ,
        id_grilleEvaluation Int NOT NULL ,
        id_IGN              Int NOT NULL ,
        id_externe          Int NOT NULL ,
        id_capDigital       Int NOT NULL ,
        PRIMARY KEY (id_grilleEvaluation ,id_IGN ,id_externe ,id_capDigital )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: contient
#------------------------------------------------------------

CREATE TABLE contient(
        id_dossier          Int NOT NULL ,
        id_grilleEvaluation Int NOT NULL ,
        PRIMARY KEY (id_dossier ,id_grilleEvaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: attribuer
#------------------------------------------------------------

CREATE TABLE attribuer(
        id_startUp  Int NOT NULL ,
        id_notateur Int NOT NULL ,
        PRIMARY KEY (id_startUp ,id_notateur )
)ENGINE=InnoDB;

ALTER TABLE dossier ADD CONSTRAINT FK_dossier_id_startUp FOREIGN KEY (id_startUp) REFERENCES startUp(id_startUp);
ALTER TABLE startUp ADD CONSTRAINT FK_startUp_id_dossier FOREIGN KEY (id_dossier) REFERENCES dossier(id_dossier);
ALTER TABLE etre ADD CONSTRAINT FK_etre_id_notateur FOREIGN KEY (id_notateur) REFERENCES notateur(id_notateur);
ALTER TABLE etre ADD CONSTRAINT FK_etre_id_externe FOREIGN KEY (id_externe) REFERENCES externe(id_externe);
ALTER TABLE etre ADD CONSTRAINT FK_etre_id_IGN FOREIGN KEY (id_IGN) REFERENCES IGN(id_IGN);
ALTER TABLE etre ADD CONSTRAINT FK_etre_id_capDigital FOREIGN KEY (id_capDigital) REFERENCES capDigital(id_capDigital);
ALTER TABLE evaluer ADD CONSTRAINT FK_evaluer_id_grilleEvaluation FOREIGN KEY (id_grilleEvaluation) REFERENCES grilleEvaluation(id_grilleEvaluation);
ALTER TABLE evaluer ADD CONSTRAINT FK_evaluer_id_IGN FOREIGN KEY (id_IGN) REFERENCES IGN(id_IGN);
ALTER TABLE evaluer ADD CONSTRAINT FK_evaluer_id_externe FOREIGN KEY (id_externe) REFERENCES externe(id_externe);
ALTER TABLE evaluer ADD CONSTRAINT FK_evaluer_id_capDigital FOREIGN KEY (id_capDigital) REFERENCES capDigital(id_capDigital);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_dossier FOREIGN KEY (id_dossier) REFERENCES dossier(id_dossier);
ALTER TABLE contient ADD CONSTRAINT FK_contient_id_grilleEvaluation FOREIGN KEY (id_grilleEvaluation) REFERENCES grilleEvaluation(id_grilleEvaluation);
ALTER TABLE attribuer ADD CONSTRAINT FK_attribuer_id_startUp FOREIGN KEY (id_startUp) REFERENCES startUp(id_startUp);
ALTER TABLE attribuer ADD CONSTRAINT FK_attribuer_id_notateur FOREIGN KEY (id_notateur) REFERENCES notateur(id_notateur);
