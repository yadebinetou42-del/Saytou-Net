DROP DATABASE IF EXISTS INFRASTRUCTURES;
/*efface l'ancienne base je m'étais trompé */ 
CREATE DATABASE INFRASTRUCTURES;
USE INFRASTRUCTURES;
/*force mysql a creer des tables dans la base mentionnée*/
CREATE TABLE ADMINISTRATEUR(
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    username VARCHAR(50),
    mdp VARCHAR(200)
)ENGINE=innoDB; 
/*'avais mis la table administration tout en bas mais equipement
ne pourra pas se créer puisqu'il a la cle d'administration donc on 
remonte la table ADMIN l'ordre compte */
CREATE TABLE EQUIPEMENT(
    id_equipement INT AUTO_INCREMENT PRIMARY KEY,
    ad_ip VARCHAR (50),
    ad_mac VARCHAR (50),
    type_eq VARCHAR(100),
    localisation_eq VARCHAR (100),
    id_admin INT,
    FOREIGN KEY(id_admin)REFERENCES ADMINISTRATEUR(id_admin)
)ENGINE=innoDB;
/*FOREIGN KEY (...)REFERENCES dit à la base cette colonne est liée 
à une autre table */
CREATE TABLE JOURNAL(
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    date_log DATETIME DEFAULT CURRENT_TIMESTAMP,
    priorite VARCHAR(50),
    msg_log TEXT,
    id_equipement INT,
    FOREIGN KEY(id_equipement)REFERENCES EQUIPEMENT(id_equipement) 
)ENGINE=innoDB;
/*le type TEXT est mieux pour les longs messages
le  DATETIME en plus de l'année, le mois,
le jour(que fait DATE)enregistre les min, secondes et heures
DEFAULT c'est la valeur par défaut CURRENT_TIMESTAMP fonction de MySQL qui récupére l'heure 
précise du serveur wamp */
CREATE TABLE SANTE(
    id_sante INT AUTO_INCREMENT PRIMARY KEY,
    etat VARCHAR(50),
    date_verif DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_equipement INT,
    FOREIGN KEY(id_equipement)REFERENCES EQUIPEMENT(id_equipement) 
)ENGINE=innoDB;