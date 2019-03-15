# Installation
Score de pr�sence
  
     
### Les principes
  
scorePr�sence d�livre un indicateur de pr�sence (et d'absence) en fonction du statut des diff�rents d�tecteurs de pr�sence.  
Il peut �galement se baser sur des appareils actuellement allum�s.  
Il indique �galement l'absence prolong�e.    
   
### Ajout des p�riph�riques
Cliquez sur "Configuration" / "Ajouter ou supprimer un p�riph�rique" / "Store eedomus" / "scorePresence" / "Cr�er"  

  
*Voici les diff�rents champs � renseigner:*

* [Obligatoire] - La r�sidence concern�e
* [Obligatoire] - Le 1er p�riph�rique d�tecteur
* [Optionnel]   - le 2nd p�riph�rique d�tecteur
     
   
Les valeurs n�gatives indiquent une absence prolong�e de 12h, 24h ou 48h.
La valeur 0 indique qu'il n'y a aucune pr�sence d�tect�e � cet instant pr�cis, mais que la premi�re valeur de l'absence prolong�e n'a pas encore �t� atteinte.  
  
Apr�s installation du plugin, vous pourrez rajouter manuellement autant de p�riph�riques d�tecteurs (dans VAR1) ou de p�riph�riques appareils (dans VAR2) que souhait�s.  
En VAR3 sont indiqu�s la limite de valeur (par d�faut 30), et le pas de d�tection pour un p�riph�rique (5 par d�faut).  
Une pr�sence d'un d�tecteur/p�riph�rique rajoutera donc la valeur du pas au score.  
Si la somme des d�tections d�passent la limite de valeur, alors le p�riph�rique indiquera la valeur max (100).  
Vous pouvez rajouter autant de valeurs que souhait� dans le scorePresence, que ce soit en terme de score pr�sence (en multiple du pas) ou d'absence prolong�e (en heures).  
Si vous voulez par exemple indiquer une absence prolong�e � partir de 2h, rajouter la valeur -2 dans le p�riph�rique.  
  
  
En pr�-requis, il faut que les d�tecteurs de pr�sences conservent la valeur "Mouvement" au moins 2 mn de plus que le polling de scorePresence (1mn par d�faut).  
Dans le cas contraire, des mouvements peuvent �tre omis.  
  
     
Influman 2019
therealinfluman@gmail.com  
[Paypal Me](https://www.paypal.me/influman "paypal.me")  


  



 

 

  


