
APPLICATION PROPAR

	L'application Propar est une application de gestion pour une société
	de nétoyage, vous avez à disposition 3 roles utilisateurs différents

	Lorsque l’utilisateur s’est connecté, selon son rôle, un menu est proposé :

	l'apprenti => ajout d'une opération
		   => prendre une opération à la fois
		   => terminer une opération
		   => lister son opération en cours

	le sénior  => ajout d'une opération
	 	   => prendre 3 opérations à la fois
		   => terminer une opération
		   => lister ses opérations en cours

	l'expert   => ajout d'une opération   
		   => prendre 5 opérations à la fois
		   => terminer une opération
		   => lister ses opérations en cours
		   => lister toutes opérations en cours
		   => lister toutes opérations terminées
		   => créer / modifier / supprimer un identifiant pour un employé
		   => voir le chiffre d’affaire de l’entreprise

	Lorsque qu'un utilisateur ajoute une opération, l'application demande : 

		   => Le type de l’opération 
		   => Le nom, prénom et l’adresse du client
		   => Une description de l’opération


	Une opération peut avoir l’un de ces 3 types : 

		   => Grosse (10000€), 
		   => Moyenne (2500€) 
		   => Petite manœuvre (1000€)


Pré-requis:

	=> PHP 7.4
	=> Symfony 5.1
	=> MySQL
	

INSTALLATION:

	=> configurer la base de donée dans le fichier .env
	=> créer la base de donnée avec à la commande -> php bin/console doctrine:database:create
	=> faire la migration des entités avec la commande -> php bin/console doctrine:migrations:migrate
	=> envoyer des données fictives -> php bin/console doctrine:fixtures:load

USAGE:

	Lancer le serveur et accédez ensuite à l'application dans votre navigateur à l'url indiquée
	( https://localhost:8000 )

	exemple d'utilisateur pour se connecter -> iherve@lemaire.fr
	Tous les utilisateurs ont le mot de passe " password "