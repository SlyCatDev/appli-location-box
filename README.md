# appli-location-box

## Logs de connexion par defaut

[URL de prod](http://sylvain.raveneau.angers.mds-project.fr/)

Email :test@test.com
Password :gwN6ELwwY4ZmqFi

-----------------

Réalisation d'une application de gestion de locations de box de stockage à destination des propriétaires. Les locataires n'ont aucune connaissance de cet outil 😶‍🌫️ .

## Les fonctionnalités

- Authentification
- Gestion de box (chaque compte utilisateur (= proprio de box) peut gérer ses propres box)
- Gestion de locataires (nom, tel,mail, adresse, compte banciare...)
- Gestion de modèles de contrats
- Gestion des contrats automatisée : l'utilisateur peut créer un modèle de contrat, en y incluant des variables (nom, prenom, adresse, etc...) qui seront par la suite automatiquement remplacées lors de la constitution d'un contrat.
- Gestion des suivis de paiement au mois par mois (ex: cases à cocher, champs date, etc...)
- Gestion des impots : Renseigner le montant total qu'une personne doit mettre dans sa déclaration d'impôts, et dans quelle case.
    - Régime micro-foncier : 
        - doit être inférieur à 15.000€ annuel
        - case 4 BE déclaration n°2042
        - Quel montant total je doit mettre dans cette case
        - Sur quel montant serais-je imposé ? (abattement de 30%) => doit faire le calcul et affiché 70% des revenus
    - Régime réel : 
        - obligatoire si supérieur à 15.000€ annuel
        - case 4 BA déclaration n°2044
        - Quel montant total je doit mettre dans cette case
        - Sur quel montant serais-je imposé ? => 100% des revenus
- Gestion des factures