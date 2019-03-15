# Installation
Score de présence
  
     
### Les principes
  
scorePrésence délivre un indicateur de présence (et d'absence) en fonction du statut des différents détecteurs de présence.  
Il peut également se baser sur des appareils actuellement allumés.  
Il indique également l'absence prolongée.    
   
### Ajout des périphériques
Cliquez sur "Configuration" / "Ajouter ou supprimer un périphérique" / "Store eedomus" / "scorePresence" / "Créer"  

  
*Voici les différents champs à renseigner:*

* [Obligatoire] - La résidence concernée
* [Obligatoire] - Le 1er périphérique détecteur
* [Optionnel]   - le 2nd périphérique détecteur
     
   
Les valeurs négatives indiquent une absence prolongée de 12h, 24h ou 48h.
La valeur 0 indique qu'il n'y a aucune présence détectée à cet instant précis, mais que la première valeur de l'absence prolongée n'a pas encore été atteinte.  
  
Après installation du plugin, vous pourrez rajouter manuellement autant de périphériques détecteurs (dans VAR1) ou de périphériques appareils (dans VAR2) que souhaités.  
En VAR3 sont indiqués la limite de valeur (par défaut 30), et le pas de détection pour un périphérique (5 par défaut).  
Une présence d'un détecteur/périphérique rajoutera donc la valeur du pas au score.  
Si la somme des détections dépassent la limite de valeur, alors le périphérique indiquera la valeur max (100).  
Vous pouvez rajouter autant de valeurs que souhaité dans le scorePresence, que ce soit en terme de score présence (en multiple du pas) ou d'absence prolongée (en heures).  
Si vous voulez par exemple indiquer une absence prolongée à partir de 2h, rajouter la valeur -2 dans le périphérique.  
  
  
En pré-requis, il faut que les détecteurs de présences conservent la valeur "Mouvement" au moins 2 mn de plus que le polling de scorePresence (1mn par défaut).  
Dans le cas contraire, des mouvements peuvent être omis.  
  
     
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  



 

 

  


