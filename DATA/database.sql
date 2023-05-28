-- Création de la base de données
CREATE DATABASE gestionnaire_blagues;
GO

-- Création de l'utilisateur
USE gestionnaire_blagues;
GO

CREATE LOGIN gestionnaire_user WITH PASSWORD = 'YourUserPassword@2023';
GO

CREATE USER gestionnaire_user FOR LOGIN gestionnaire_user;
GO

-- Attribution des droits à l'utilisateur sur la base de données
USE gestionnaire_blagues;
GO

-- Donner tous les droits à l'utilisateur sur la base de données
EXEC sp_addrolemember 'db_owner', 'gestionnaire_user';
GO

-- Révoquer les droits par défaut
REVOKE ALTER, DELETE, INSERT, REFERENCES, SELECT, UPDATE, VIEW DEFINITION ON SCHEMA::dbo FROM PUBLIC;
GO


USE gestionnaire_blagues;

CREATE TABLE blagues (
                         id INT PRIMARY KEY IDENTITY(1,1),
                         contenu NVARCHAR(MAX),
                         categorie NVARCHAR(255),
                         date_ajout DATETIME
);