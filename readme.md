Application Suivi Stages
=============

<img src="build/public/img/gradient_icon.png" alt="Icon SIO" style="height:64px;"/>

> Chaque année les étudiants de BTS SIO doivent effectuer une période de stage en
entreprise. Ces stages sont obligatoires pour valider leur première année ainsi que leur
diplôme en seconde année. Mais, au-delà du diplôme, les stages en entreprise permettent
aux étudiants de se confronter au monde de l’entreprise et de progresser dans leurs
pratiques professionnelles. C’est donc un élément essentiel de leur formation. Nous
constatons cependant un manque d’application dans la recherche des stages...(recherches
peu actives, recherches tardives, pas de relance, pas de suivi...)
Afin d’accompagner la recherche de stage, nous souhaitons proposer une application de
suivi de recherche de stage. Il s’agira de permettre aux étudiants de renseigner les
démarches effectuées auprès d’une entreprise (mail, appel, visite, courrier, envoi ...). Le
fait de remplir sérieusement les actions effectuées permettra aux étudiants de bien suivre
à quelle étape ils en sont avec telle ou telle entreprise. Un accès en lecture sur les
recherches de tous les étudiants sera donné aux enseignants, afin qu’ils puissent suivre les
recherches.

-  Version 2<sub>1002</sub>

## Fonctionnalités accessibles aux étudiants

-  ### Authentification
   L’application doit être accessible par chaque acteur du BTS SIO (enseignants et
   étudiants)

- ### Renseigner une recherche de stage
  Cette fonctionnalité consiste à indiquer le nom de l’entreprise, du contact éventuel -
  la session pour laquelle le stage est recherché devra être sélectionnée 
  Une recherche de stage devra avoir un état (en cours, terminé, refus, attente
  réponse...) avec une date de l’état
  
- ### Renseigner une action sur une recherche en cours
  Cette fonctionnalité permet d’indiquer l’action de recherche (appel téléphonique -
  nom du contact, mail, courrier)
  
- ### Lister les actions sur une recherche en cours
  Ajouter des pièces jointes aux actions (CV, mail, lettre de motivation, lettre/mail de
  refus)

- ### Lister les recherches de stages

## Fonctionnalités accessibles aux enseignants

- ### Authentification
  L’application doit être accessible par chaque acteur du BTS SIO (enseignants et
  étudiants)
  
- ### Initialiser une session de stage
  Il s’agit de créer une session de stage, portant les informations suivantes :
   
  - Niveau de la session de stage (BTS-1, BTS-2)
  - Année du stage
  - Dates de la session (début et fin de stage)
    
- ### Créer une Cohorte
    Créer une cohorte d’étudiant, lui affecter une session de stage
    Une cohorte est un ensemble d’étudiants (Nom, Prénom) auquel on affecte une session
    de stage

- ### Lister les cohortes

- ### Logging
  Les enseignants ont accès à toutes les recherches et actions de tous les étudiants, en
  lecture
  
- ### Statistiques
    Accès à un écran de statistique montrant le nombre d’étudiants ayant un stage et ceux
    qui n’en n’ont pas encore
  
## Travail demandé

- ### Analyse
    - Schéma de cas d’utilisation de l’application
      
    - Proposition de plan de site et maquette
      
    - Modèle conceptuel de données
      Dans votre analyse, il faut penser aux éventuelles évolutions que nous pourrions apporter
      à l’application...par exemple aujourd'hui nous développons en vue de l’utilisation en BTS
      SIO mais qui sait si d’autres BTS ne voudront pas l’utiliser ?

- ### Développement
    - L’application sera développée en PHP et la base de données Mysql.
    - Vous pouvez faire des propositions de visuel.

## Proposition de planning 
- [x] `17 février` livraison d’un document contenant les documents d’analyse
- [x] `10 mars` livraison écran authentification
- [ ] `17 mars` livraison écran CRUD gestion des cohortes
- [ ] `24 mars` livraison écran CRUD gestion de recherche de stage

*Le planning sera révisé selon l’avancement et les évolutions éventuelles.*
