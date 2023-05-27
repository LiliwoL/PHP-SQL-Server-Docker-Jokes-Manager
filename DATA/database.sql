USE gestionnaire_blagues;

CREATE TABLE blagues (
                         id INT PRIMARY KEY IDENTITY(1,1),
                         contenu NVARCHAR(MAX),
                         categorie NVARCHAR(255),
                         date_ajout DATETIME
);
