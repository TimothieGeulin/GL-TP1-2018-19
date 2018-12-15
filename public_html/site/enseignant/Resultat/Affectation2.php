<?php 
include("createTab.php");
?>

<head>
     <link rel="stylesheet" href="style.css">
</head>

<script> 

var nbAff = <?php echo json_encode($nbOption); ?>;
var resultatAffectation = "";   // Chaine de caractère avec les résultats pour les étudiants
var resultatScolarite = "";     // Chaine de caractère avec les résultats pour la scolarité
var listeEtudiant = [];     // Tableau général avec toute la liste des étudiants + tous les résultats
var allAffectation = [];    // Tableau ou on stocke nos objets de classe Affectation (pouvoir fouiller dans nos data)
var affectationTab = [];    // Tableau avec toutes les affectations déjà effectué   (nos résultats raw pas organisé)
var compteurBricolage = 0;

/* La classe option sert a stocké toutes les informations d'une option / UE */
class UE{  
    constructor(codeModule, nomUE, effectif){
        this.codeModule = codeModule;           // Le code qui correspond a la l'UE 
        this.nomUE = nomUE;                     // Le nom de l'UE
        this.effectif = effectif;               // L'effectif de l'UE
    }

    printOption(){      // Affiche toute les informations de l'option
        return "UE = " + this.nomUE + " | Code module : "+ this.codeModule + " | Effectif : " + this.effectif;
    }

    alertOption(){
        alert("UE = " + this.nomUE + " | Code module : "+ this.codeModule + " | Effectif : " + this.effectif);
    }

    getCodeModule(){ return this.codeModule; }  // Liste des getter
    getName(){ return this.nomUE; }
    getEffectif(){ return this.effectif; }
    
}


/* La classe Etudiant sert a stocké toutes les informations d'un étudiant */
class Etudiant{
    constructor(){
        this.nom;                // Informations personelle de l'étudiant
        this.prenom;
        this.idEtudiant;

        this.creditOption = [];  // Informations sur les choix de l'option du jour 1
        this.choice = [];
        this.affectation = -1;
        this.nombreAffectation = 0;
        // On a aussi un "this.affectationS = []" déclaré plus tard pour géré les plusieurs jours d'affectations
    }
    
    setNom(name){ this.nom = name; }    // Liste des getter / setter
    getNom(){ return this.nom; }
    
    setPrenom(name){ this.prenom = name; }
    getPrenom(){ return this.prenom; }
    
    setId(id){ this.idEtudiant = id; }
    getId(){ return this.idEtudiant; }

}

class Affectation{
    constructor(numAffectation){
        this.numAffectation = numAffectation;   // Le fichier qui contient toutes les informations pour affecter

        
        this.nombreUE;              // Nombre d'UE proposé pour une journée d'option
        this.nombreEtudiant;        // Nombre d'étudiant qui participe a une journée d'option
        this.listeAffectation = []; // Liste des étudiants qu'on doit affecter
        this.optionData = [];       // Tableau de toute les UE d'un jour d'option
        this.effectif = [];         // Récupère les effectifs des UE pour les changer a chaque affectation
        this.optionList = [];       // Tableau de tableau avec la liste des étudiants trié par crédit pour chaque jour d'option
    }

    readDataFromFile(){
        // Utiliser numAffectation pour le jour que l'on veut regarder
        var tableauOption =  <?php echo json_encode($GlobTab); ?>;
        this.nombreUE = tableauOption[this.numAffectation].length;

        var tableauEtu = <?php echo json_encode($tabEtu); ?>;
        this.nombreEtudiant = tableauEtu[this.numAffectation].length;

        var currentOptionO = tableauOption[this.numAffectation];
        for(var i=0; i<this.nombreUE; i++){    //TODO: FIXME: Remettre le parcours normal quand seb a enlevé le blanc
            // idnice 0 = rien ne pas prendre
            // indice 1 = nom UE 
            // indice 2 = code module
            // indice 3 = effectif de l'option
            this.optionData.push(new UE(currentOptionO[i][2], currentOptionO[i][1], currentOptionO[i][3]));
        }

        var currentOptionE = tableauEtu[this.numAffectation];

        for(var i=0; i<this.nombreEtudiant; i++){
            var Etu = new Etudiant();
            Etu.setNom(currentOptionE[i][0]);
            Etu.setPrenom(currentOptionE[i][1]);
            Etu.setId(currentOptionE[i][2]);

            for(var indiceTab = 0; indiceTab<this.nombreUE; indiceTab++){
                Etu.creditOption[indiceTab] = currentOptionE[i][5+indiceTab];
            }
            this.listeAffectation.push(Etu);
        }

        for(var i=0; i<this.optionData.length; i++){
            this.effectif.push(this.optionData[i].effectif);
        }
    }

    /* On remplie notre optionList qui nous sert a faire nos affectation */
    fillOptionList(){
        for(var i=0; i<this.nombreUE; i++){ // On créer un tableau a deux dimensions
            this.optionList[i] = [];
        }

        for(var i=0; i<this.nombreUE; i++){ // Pour chaque EU on recopie la liste des étudiants dans une colonne
            for(var j=0; j<this.nombreEtudiant; j++){
                this.optionList[i][j] = this.listeAffectation[j];
            }
        }
    }

    /* On tri la liste des étudiants pour chaque jour selon leur nombre de crédits */
    triOptionList(){
        var tmp;
        for(var indiceUE=0; indiceUE<this.optionList.length; indiceUE++){   // On tri chaque liste du tableau
            for(var i=0; i<this.optionList[indiceUE].length; i++){
                for(var j=0; j<this.optionList[indiceUE].length; j++){
                    if(this.optionList[indiceUE][i].creditOption[indiceUE] > this.optionList[indiceUE][j].creditOption[indiceUE]){  // On compare les crédits pour trier par ordre décroissant
                        tmp = this.optionList[indiceUE][i];         // On swap les deux éléments du tableaux
                        this.optionList[indiceUE][i] = this.optionList[indiceUE][j];
                        this.optionList[indiceUE][j] = tmp;
                    }
                }
            }

        }
    }

    // on rempli le tableau tab de nombre appartenant à [min;max] sans doublon dans un ordre aléatoire
    randomGeneration(tab, min, max){
        var taille = max - min +1;
        var rand = Math.floor(Math.random()*(max-min))+min; 
        for(var i=0; i<taille; i++){
            while(isInArray(tab, rand)){
                rand = Math.floor(Math.random()*(max-min+1))+min;
            }
            if(!isInArray(tab, rand)){
                tab.push(rand);
            }
        }
    }

    // Si plusieus étudiants ont le meme nombre de crédit pour matière on les echange aléatoirement pour pas avoir ordre AlphaB
    randomizeOptionList(){
        for(var i=0; i<this.optionList.length; i++){    // On doit mettre une touch d'aléatoire pour chaque liste
            var currentCredit = -1;
            var nbRandom = 0;   // nombre d'étudiant avec le meme nombre de crédit qu'on va devoir randomiser
            for(var j=0; j<this.optionList[i].length-1; j++){   // On parcourt notre liste d'étudiant
                if (currentCredit != this.optionList[i][j].creditOption[i]){ // Si on a pas déjà traité le cas alors on le traite
                    currentCredit = this.optionList[i][j].creditOption[i];
                    var k=j+1;
                    if(k<this.optionList[i].length){    // Si on est pas a la fin de la liste
                        while (this.optionList[i][k].creditOption[i] == currentCredit){ // On la parcours pour savoir combien d'autre étudiant ont le meme nombre de crédit pour l'UE
                            nbRandom ++;    // On incrémente notre nombre tant qu'on a le meme nombre de crédit
                            k ++;
                            if(k == this.optionList[i].length){ // Quand on a passé le dernier étudiant on arete
                                break;
                            }
                        }
                    }
                    if(nbRandom > 0){   // Si on a plusieurs étu avec le meme nombre 
                        var randomizedRange = [];
                        this.randomGeneration(randomizedRange, j, (j+nbRandom));    // On sort un ordre random

                        for(var change=0; change<randomizedRange.length; change++){ // Et on swap tout les étu entre eux pour avoir un ordre !=
                            var tmp = this.optionList[i][j+change];
                            this.optionList[i][j+change] = this.optionList[i][randomizedRange[change]];
                            this.optionList[i][randomizedRange[change]] = tmp;
                        }
                    }   
                }
                nbRandom = 0; // On reset notre nombre d'étu avec même nombre de crédit
                
            }
        }

    }


    /* On enlève un étudiant de toutes les listes a quand on lui affecte une option */
    removeWhenAssigned(etudiantCourant){
        for(var i=0; i<this.nombreUE; i++){
            this.optionList[i] = arrayRemove(this.optionList[i], etudiantCourant);
        }
    }

    /* On tri les indices des choix du meilleur au pire */
    getChoiceForEveryone(){
        var tmpNombreUE = this.nombreUE;    // Sinon c'est undefined je sais pas pourquoi :c
        this.listeAffectation.forEach(function(item){
            var meilleurIndex = -1;
            for(var i=0; i<tmpNombreUE; i++){ // On initialise notre tableau à -1
                item.choice[i]=-1;
            }
            for(var i=0; i<tmpNombreUE; i++){       // On parcourt notre nos options
                var meilleurChoix = -1;
                for(var j=0; j<tmpNombreUE;j++){
                    if(meilleurChoix<item.creditOption[j]){
                        if(!isInArray(item.choice, j)){
                            meilleurChoix=item.creditOption[j];
                            meilleurIndex=j;
                        }
                    }
                }
            item.choice[i]=meilleurIndex;
            }
        })
    }

    /* Tous le processus d'affectation */
    affectEveryone(){

        var checkChange;
        for(var i=0; i<this.nombreUE; i++){ // On affecte le choix 1, puis le choix 2 etc... pour chaque étudiant
            checkChange=1;      
            while(checkChange){ // Tant qu'on a un changement on essaie de réaffecter les étudiants pas affecté
                checkChange=this.affect(i);
            }
        }
    }

    /* On affecte tous les étudiants */
    affect(choiceIndex){    
    // choiceIndex est le numéro de l'option que l'on regarde
        var change=0;   // Valeur pour savoir si on a au moins une affectation
        for(var i=0; i<this.nombreEtudiant; i++){   // On parcours chaque étudiant pour les affecter
            if(this.listeAffectation[i].affectation == -1){ // Si l'étudiant n'est pas encore affecté
                var option=this.listeAffectation[i].choice[choiceIndex];    // On récupère l'option de l'étudiant 
                var positionListe=0;    // Position dans la liste
                //console.log("effectif = " + this.effectif[option])
                while(positionListe<this.effectif[option] ){ // Tant qu'on parcours la liste sans dépasser l'effectif de l'option
                    if(positionListe >= this.optionList[option].length){
                        break;
                    }
                    //console.log('PL = ' + positionListe + "current liste = " + this.optionList[option].length);
                    if(this.optionList[option][positionListe].idEtudiant == this.listeAffectation[i].idEtudiant){   // Si on trouve l'étudiant dans la liste
                        
                        if(change==0){
                            change=1;   // Variable pour savoir si on a eu au moins une affectation
                        }
                        this.effectif[option]--;
                        this.listeAffectation[i].affectation=option;    // On l'affecte a l'option
                        this.listeAffectation[i].nombreAffectation++;
                        this.removeWhenAssigned(this.listeAffectation[i]);  // On l'enlève des listes d'affectation
                       }
                    positionListe ++; // Sinon on regarde la prochaine position sur la liste
                }
            }
        }
        return change;
    }

    preventDoubleAffectation(){
        for(var i=0; i<this.listeAffectation.length; i++){
            var creditRedistribuer = 0;
            for(var find=0; find<listeEtudiant.length; find++){
                if(this.listeAffectation[i].idEtudiant == listeEtudiant[find].idEtudiant){ // On cherche l'étudiant dans la liste générale
                    var current = this.listeAffectation[i];  // l'étudiant courant sur l'affectation actuelle
                    var same = listeEtudiant[find];                    // le même étudiant sur une affectation antérieure

                    for(var j=0; j<this.nombreUE; j++){
                        if(current.creditOption[j] > 0){   // Pour chaque matière ou il y a des crédits
                            var codeUE = this.optionData[j].codeModule;
                            for(var check=0; check<same.affectationS.length; check++){  // On regarde dans toutes les affectations déja faite
                                var estAffecte = same.affectationS[check];
                                if(estAffecte != null){
                                    if(codeUE == allAffectation[check].optionData[estAffecte].codeModule){   // On a des crédits dans une matière ou on est déjà affecté
                                        creditRedistribuer = current.creditOption[j];
                                        var indiceOption = 0;
                                        while (creditRedistribuer > 0){     // On redistribue les credits
                                            if(current.choice[indiceOption] != j){
                                                var tmp = current.choice[indiceOption];
                                                if(current.creditOption[tmp] < ((this.nombreUE*2)*70)/100){ // inférieur à 70% des credits totaux
                                                    current.creditOption[tmp] ++;
                                                    creditRedistribuer --;
                                                }
                                                else indiceOption ++;
                                            }
                                            else indiceOption ++;
                                        }
                                        current.creditOption[j]=0;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    faireAffectation(){
        this.readDataFromFile();
        this.getChoiceForEveryone();
        this.preventDoubleAffectation();
        this.getChoiceForEveryone();
        this.fillOptionList();
        this.triOptionList();
        //this.printOptionList();
        this.randomizeOptionList();
        //this.printOptionList();
        this.affectEveryone();
        //this.printAffectation()
        affectationTab.push(this.listeAffectation);
        completerListeEtudiant(this.listeAffectation);

    }

    /*  --------------------- */
    /*  Fonctions d'affichage */
    /*  --------------------- */

    printCreditOption(etu){
        for(var i=0; i<etu.creditOption.length; i++){
            console.log(etu.creditOption[i]);
        }
  
    }

    printChoiceEtudiant(){
        this.listeAffectation.forEach(function(item){
            console.log(item.nom + " :");
            for(var i=0; i<this.nombreUE; i++){
                console.log("\t" + item.choice[i]);
            }
        });
    }

    printOptionData(){
        if(this.optionData.length == 0){
            console.log("Le tableau des options est vide pour le moment");
        }

        else{
            this.optionData.forEach(function(item, index, array){
                console.log(item.printOption());
            });
        }
    }

    alertOptionData(){
        if(this.optionData.length == 0){
            alert("Le tableau des options est vide pour le moment");
        }

        else{
            this.optionData.forEach(function(item, index, array){
                item.alertOption();
            });
        }
    
    }

    printlisteAffectation(){
        this.listeAffectation.forEach(function(item, index, array){
            console.log(item);
        });
    }

    alertListeAffectation(){
        this.listeAffectation.forEach(function(item, index, array){
            alert(item.prenom + " " + item.nom + " " + item.idEtudiant);
        });
    }

    printOptionList(){
        for(var i=0; i<this.nombreUE; i++){
            console.log("\nOption " + i + " :");
            this.optionList[i].forEach(function(item, index, array){
                console.log(item.nom + " choix des crédits : " + item.creditOption[i]);
            })
        }
    }

    printEffectif(){
        for(var i=0; i<this.effectif.length; i++){
            console.log("Option " + i + " crédit : " + this.effectif[i]);
        }
    }

    printAffectation(){
        this.listeAffectation.forEach(function(item){
            console.log(item.nom + " est affecté a l'option " + item.affectation);
        });
    }

    //Afficher le taux de satisfaction de l'affectation
    printSatisfaction(){
        var tabStat = [];
        for(var i=0; i<this.nombreUE; i++){
            tabStat[i]=0;
        }

        for(var i=0; i<this.nombreEtudiant; i++){
            for(var j=0; j<this.nombreUE; j++){
                if(this.listeAffectation[i].choice[j] == this.listeAffectation[i].affectation){
                    tabStat[j]++;
                }
            }
        }
        
        for(var i=0; i<this.nombreUE; i++){
            console.log("CHOIX n°" + i + " : " + tabStat[i] + " sur " + this.nombreEtudiant + 
            " étudians = " + (tabStat[i]/this.nombreEtudiant)*100 + "%");
        }
    }

}


/* Fonction pour supprimer un élément d'un tableau */
function arrayRemove(arr, value) { 

    return arr.filter(function(ele){
        return ele != value;
    });

}

/* Fonction pour regarder si un élément appartient au tableau */
function isInArray(tab, varCheck){
    for(var i=0; i<tab.length; i++){
        if(tab[i]==varCheck){
            return 1;
        }
    }
    return 0;
}

function printAffectationTab(){
    for(var i=0; i<affectationTab.length; i++){
        console.log("\n\tAffectation pour le jour n°" + i + "\n");
        for(var j=0; j<affectationTab[i].length; j++){
            console.log(affectationTab[i][j].nom + " affecté a l'option " + affectationTab[i][j].affectation);
        }
    }
}

function printListeEtudiant(){
    for(var i=0; i<listeEtudiant.length; i++){
        console.log(listeEtudiant[i]);
    }
}

function creerSortie(){
    for(var i=0; i<listeEtudiant.length; i++){
        resultatAffectation += "• " + listeEtudiant[i].nom;
        resultatAffectation += " " + listeEtudiant[i].prenom;
        resultatAffectation += " " + listeEtudiant[i].idEtudiant + " :\n";
        for(var j=0; j<listeEtudiant[i].affectationS.length; j++){
            if(listeEtudiant[i].affectationS[j] != null){
                var indice = listeEtudiant[i].affectationS[j];
                var opt = allAffectation[j].optionData[indice];

                resultatAffectation += '\t\t' + opt.codeModule + " " +  opt.nomUE + ",\n";
            }
        }
    }
}

function creerListeScolarite(){

for(var i=0; i<affectationTab.length; i++){
    resultatScolarite += "\n\n\t\t$ Option n°" + i + ",";
    for(var j=0; j<allAffectation[i].optionData.length; j++){
        var current = allAffectation[i].optionData[j]
        resultatScolarite += "\n\t $ * " + current.nomUE + "\t" + current.codeModule +",\n";
        for(var k=0; k<allAffectation[i].listeAffectation.length; k++){

            if(allAffectation[i].listeAffectation[k].affectation == j){
                //console.log(allAffectation[i].listeAffectation[k].affectation);
                currentEtu = allAffectation[i].listeAffectation[k];
                resultatScolarite += currentEtu.nom + " " + currentEtu.prenom + " " + currentEtu.idEtudiant + " ,\n";
            }

        }
    }
}
}

function completerListeEtudiant(tab){

    var tableau = []; // Recopie de notre tab 
    for(var i=0; i<tab.length; i++){
        var recopieEtudiant = new Etudiant();
        recopieEtudiant.setNom(tab[i].nom);
        recopieEtudiant.setPrenom(tab[i].prenom);
        recopieEtudiant.setId(tab[i].idEtudiant);
        recopieEtudiant.affectation = tab[i].affectation;
        recopieEtudiant.nombreAffectation = tab[i].nombreAffectation;

        tableau.push(recopieEtudiant);
    }

    if(listeEtudiant[0] == null){   // La liste est vide donc on vient de faire la première affectation
        for(var i=0; i<tableau.length; i++){
            listeEtudiant.push(tableau[i]);     // On ajoute les étudiants de "tableau" à notre listeEtudiants
            listeEtudiant[i].affectationS = []; // On crée un tableau avec TOUTES les affectations pour chaques jours d'options.
            listeEtudiant[i].affectationS[compteurBricolage]=listeEtudiant[i].affectation;
        }
    }   
    else{
        for(var i=0; i<tableau.length; i++){
            var checkEtudiant = 0;
            for(var j=0; j<listeEtudiant.length; j++){
                if(tableau[i].idEtudiant == listeEtudiant[j].idEtudiant){   // On regarde si l'étudiant est déjà dans la liste
                    if(listeEtudiant[j].nombreAffectation > 0){
                        checkEtudiant = 1;
                        listeEtudiant[j].affectationS[compteurBricolage] = tableau[i].affectation;
                        listeEtudiant[j].nombreAffectation ++;
                    }
                }
                
            }
            if(checkEtudiant == 0){ // L'étudiant n'est pas dans la liste donc on l'add
                listeEtudiant.push(tableau[i]);
                listeEtudiant[listeEtudiant.length-1].affectationS = [];
                listeEtudiant[listeEtudiant.length-1].affectationS[compteurBricolage]=listeEtudiant[listeEtudiant.length-1].affectation;
            }
        }
    }
    compteurBricolage ++;

    // On supprime les informations inutiles de la liste
    for(var i=0; i<listeEtudiant.length; i++){
        delete listeEtudiant[i].creditOption;
        delete listeEtudiant[i].choice;
        delete listeEtudiant[i].affectation;
    }
    // On complète avec des null pour pas avoir des missing item
    for(var i=0; i<listeEtudiant.length; i++){
        if(listeEtudiant[i].affectationS.length != compteurBricolage){
            listeEtudiant[i].affectationS.push(null);
        }
    }
    // On remplace "empty item" par des null
    for(var i=0; i<listeEtudiant.length; i++){
        for(var j=0; j<listeEtudiant[i].affectationS.length; j++){
            if(listeEtudiant[i].affectationS[j] == undefined){
                listeEtudiant[i].affectationS[j] = null;
            }
        }
    }  
    
    
}

for(var i=0; i<nbAff; i++){
    var affectation = new Affectation(i);
    affectation.faireAffectation();
    allAffectation.push(affectation);
}

creerSortie();
creerListeScolarite();
console.log(resultatScolarite);
console.log(resultatAffectation);


function resultat(){
    resultatAffectation;
}

function cleartext()
{
  document.nomformulaire.nomtexte.value = resultatAffectation;
  document.nomformulaire.nomtexte2.value = resultatScolarite;
  alert("L'algorithme a bien été effectué !");
}

</script> 

<html>
    <body>
        <div class="haut"></div>
        <div class="login" style="text-align: center;"> 
            <img src="logo_amu_rvb" style="width: 650px; height: 220px; text-align: center; margin-bottom: 5%; margin-top: 2%;">
           <form name="nomformulaire" method="post" action="testSortie.php">
                <input name="nomtexte" class="textfield" type="text" size="40" maxlength="6000000" 
                            value="Taper un texte">
                <input name="nomtexte2" class="textfield" type="text" size="40" maxlength="6000000" 
                            value="Taper un texte">
                <div class="encadrer">
                <p style="text-align: center;">Cliquez dans un premier temps sur encoder les fichiers pour pouvoir générer vos listes etudiantes,<br>puis ensuite sur générer les pdfs pour qu'il soit ajouté dans votre répertoire courant.<br>
                  Vous pouvez également visualisé vos pdfs une fois que vous avez terminé l'étape numéro 2 </p>
                </div>
                <br>
                <br>

                <p>Étape 1</p>  <input type="submit" value="Lancer l'algorithme" onClick="cleartext()"><br>
                <p style="text-align: center;">
                </p>
                <p>Étape 2</p> <input type="button" value="Générer les pdfs" id="refresh" onclick="window.location.href='genrationPDF.php'"/>
                <br>
                <br>

               <p>Étape 3</p> <input type="button" value="Visualiser le pdf étudiant"  onclick="window.location.href='Resultat-Etudiant.php'"/>
              
              <input type="button" value="Visualiser le pdf scolarité"  onclick="window.location.href='Resultat-Scolarite.php'"/>
              <br>
              <br>
              
              <p>Étape 4</p> <input type="button" value="Envoi des affectations aux étudiants"  onclick="window.location.href='EnvoiAffectEtu.php'"/>
              
              <input type="button" value="Envoi des affectations à la scolarité"  onclick="window.location.href='EnvoiAffectScol.php'"/>
              <br>
              <br>
              <input style="margin-top: 2%;" type="button" value="Retour à l'accueil" onclick="window.location.href='/site/enseignant/AccueilEnseignant.php'"/>
          </form>
        </div>
        <div class="footer" style="text-align: center; margin-top: 5%;"> Affectation des options 1</div>
    </body>
</html>

<?php 

    $resultat = $_POST['nomtexte'];  // Recupére la variable js en php à l'aide d'un input html.
    $scolarite = $_POST['nomtexte2'];  // Recupére la variable js en php à l'aide d'un input html.
    $resultat = str_replace("• ", "\n • ", $resultat); // Remplace • par un \n
    $scolarite = str_replace(",", "\n", $scolarite); // Remplace , par un \n
?>




