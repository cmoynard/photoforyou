# PhotoForYou : site pour la vente et l'achat de photos d'Artistes

## Présentation générale

PhotoForYou est un site de banque d'images en ligne. Il permet à des visiteurs lamba de voir les images proposées. 
Les clients connectés peuvent acheter des photos avec leur soldes et les photographes peuvent en plus poster des photos sur le site 
et toucher une commission sur chaque vente.
---

## Expression fonctionelle du besoin

### Description du contenu

- Enregistrement sur le site en tant que photographe ou client.
- La désinscription (cela entraine la perte des crédits et pour un photographe et le retrait de toutes ses photos du catalogue)
- Gestion du caddie
- Les photos achetées sont archivées chez le client et téléchargeables à tous moments
- Le photographe fixe le prix de vente en nombre de crédit. (minimum 2 crédits-maximum 100 crédits)
- Les photos sont en vente de manière exclusive (un seul achat après retrait du catalogue)
- L’achat se fait à partir de crédits que l’on doit acheter. (1 crédit = 5 euros)

## Exigences fonctionnelles

1. Principales composantes
- Gestion des utilisateurs
- Identification des utilisateurs
- Gestion de l'espace client/photographe
- Gestion des commandes
- Gestion de paiements
- Gestion du catalogue

2. Fonctionnalités en "front office"
- Identification
- Gestion de l'espace photographe
- Gestion de l'esapce client
- Gestion des commandes
- Catalogue des photos

3. Fonctionnalités en "back-office"
- Gestion des utilisateurs
- Gestion du contenu informationnel
- Gestion du catalogue

## MLD

- Users (<ins>id</ins>, nom, prenom, email, type, mdp, credit, photo);
- Client (<ins>#idClient</ins>, dateNaissance);
- Photographe (<ins>#idPhotographe</ins>, site, siret);

## SCD

![Alt](SCD.svd)
