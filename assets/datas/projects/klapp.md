---
name: Klapp.io
year: 2016 à 2018
technologies: [Symfony 4, Doctrine, Vue.Js, Bootstrap, API Rest]
url:
image: klapp.png
---

### Présentation du projet
Le projet Klapp.io est né du constat qu' il était difficile pour les entrepreneurs et indépendants de s’équiper convenablement
de logiciels professionnels, par manque de budget ou méconnaissance des outils correspondant à leur activité.

C'est en 2017 que la première version de Klapp.io voit le jour avec l'objectif de **proposer aux entrepreneurs d'accéder
à un catalogue d'applications SaaS à prix réduit, et cela au sein d'un abonnement mensuel centralisé.** Klapp est le Netflix du
logiciel. 😉

Le projet Klapp.io intrigue pas mal d'entrepreneurs par son modèle innovant de distribution et très vite une communauté d'utilisateurs
se créée autour du projet. Séduit par le concept, la Banque Publique d'Investissement française investit dans le projet
afin de l'accompagner dans son développement.


### Ma contribution au projet
En tant que fondateur, j'ai pu concevoir le projet dans sa globalité, **de son idéation à sa commercialisation en passant par sa conception
technique & graphique**. Le projet est organisé en **plusieurs briques applicatives** : le site web public (Symfony 3), le blog (Wordpress), le
Backend/API Rest (Symfony 4) et l'espace client (VueJs). L'ensemble est déployé dans des containers Docker sur un serveur dédié.

Pour gérer **les abonnements** aux logiciels et leur facturation, je me suis appuyé sur le **compsant Workflow de Symfony** afin de déclencher
des actions bien précises en fonction de l'avancé de l'abonnement. Ce workflow était connecté au **sytème de paiement Stripe**
via son API et ses webhooks.

**Un moteur de recherche**, basé sur **Elasticsearch**, a été dévelopé afin de permettre aux utilisateurs de rechercher des logiciels dans
le catalogue de Klapp selon des critères bien précis.
