#include "data_read.h"
#include "test_option.h"


void get_data(char *filename){
    FILE *file = fopen(filename, "r");
    if(file == NULL){
        printf("fichier vide\n");
        exit(0);
    }

    if(fscanf(file, "%d", &Nb_options));
    if(fscanf(file, "%d", &Nb_etu));

    //printf("Options = %d / Etudiants = %d\n", Nb_options, Nb_etu);

    option_data = malloc(sizeof(Options)*Nb_options);
    assert(option_data);

    listeEtu = malloc(sizeof(Etudiant)*Nb_etu);
    assert(listeEtu);

    // Récupération des informations concernants les options
    char tmp_bidon[1000];
    for(int i=0; i<Nb_options +2; i++){ // Magie noire ? Je sais pas pourquoi ni comment ça marche mais ça marche
        if(i<2){
           if(fgets(tmp_bidon, 1000, file));
        }
        else
            if(fgets(option_data[i-2].nom_UE, 1000, file));
            option_data[i-2].nom_UE[strcspn(option_data[i-2].nom_UE, "\n")] = 0; // Remove "\n" from the string
    }

    //Affichage des informations des options
    /*for(int i=0; i<Nb_options; i++){
        printf("UE %d = %s\n", i, option_data[i].nom_UE);
    }*/

    //Lecture + Ajout des étudiants dans la liste
    for(int i=0; i<Nb_etu; i++){
        if(fgets(listeEtu[i].Nom, 50, file));
        listeEtu[i].Nom[strcspn(listeEtu[i].Nom, "\n")] = 0;
        if(fgets(listeEtu[i].Prenom, 50, file));
        listeEtu[i].Prenom[strcspn(listeEtu[i].Prenom, "\n")] = 0;

        if(fscanf(file, "%d", &listeEtu[i].idEtudiant));

        listeEtu[i].creditO = malloc(sizeof(int)*Nb_options);
        for(int j=0; j<Nb_options; j++){
            if(fscanf(file, "%d", &listeEtu[i].creditO[j]));
        }
        char pass[10];              // Pour sauter "\n" a la fin de la ligne qui fait bugger le prochain fgets
        if(fgets(pass, 10, file));

        listeEtu[i].affectation = -1;
    }

    //Affichage des étudiants 
/*    for(int i=0; i<Nb_etu; i++){
        printf("\n\nNOM : %s\nPRENOM : %s\nID : %d\nCREDITS : ", listeEtu[i].Nom, listeEtu[i].Prenom, listeEtu[i].idEtudiant);
        for(int j=0; j<Nb_options; j++){
            printf("%d ", listeEtu[i].creditO[j]);
        }
    }*/

}


void get_data_day2(char *filename){
    FILE *file = fopen(filename, "r");
    if(file == NULL){
        printf("fichier vide\n");
        exit(0);
    }

    if(fscanf(file, "%d", &Nb_options_day2));
    if(fscanf(file, "%d", &Nb_etu_day2));

    printf("Options = %d / Etudiants = %d\n", Nb_options_day2, Nb_etu_day2);

    option_data_day2 = malloc(sizeof(Options)*Nb_options_day2);
    assert(option_data_day2);

    listeEtu_test = malloc(sizeof(Etudiant)*Nb_etu_day2);
    assert(listeEtu_test);

    // Récupération des informations concernants les options
    char tmp_bidon[1000];
    for(int i=0; i<Nb_options_day2 +2; i++){ // Magie noire ? Je sais pas pourquoi ni comment ça marche mais ça marche
        if(i<2){
           if(fgets(tmp_bidon, 1000, file));
        }
        else
            if(fgets(option_data_day2[i-2].nom_UE, 1000, file));
            option_data_day2[i-2].nom_UE[strcspn(option_data_day2[i-2].nom_UE, "\n")] = 0; // Remove "\n" from the string
    }


    //Affichage des informations des options
    for(int i=0; i<Nb_options_day2; i++){
        printf("UE %d = %s\n", i, option_data_day2[i].nom_UE);
    }


    //Lecture + Ajout des étudiants dans la liste
    for(int i=0; i<Nb_etu_day2; i++){
        
        if(fgets(listeEtu_test[i].Nom, 50, file));
        listeEtu_test[i].Nom[strcspn(listeEtu_test[i].Nom, "\n")] = 0;
        if(fgets(listeEtu_test[i].Prenom, 50, file));
        listeEtu_test[i].Prenom[strcspn(listeEtu_test[i].Prenom, "\n")] = 0;

        if(fscanf(file, "%d", &listeEtu_test[i].idEtudiant));

        listeEtu_test[i].creditO_day2 = malloc(sizeof(int)*Nb_options_day2);
        for(int j=0; j<Nb_options_day2; j++){
            if(fscanf(file, "%d", &listeEtu_test[i].creditO_day2[j]));
        }
        char pass[10];              // Pour sauter "\n" a la fin de la ligne qui fait bugger le prochain fgets
        if(fgets(pass, 10, file));

        listeEtu_test[i].affectation_day2 = -1;


        for(int i=0; i<Nb_etu_day2; i++){        // On fait correspondre les etudiants
            if(listeEtu[i].idEtudiant == listeEtu_test[i].idEtudiant){
                listeEtu[i].creditO_day2 = listeEtu_test[i].creditO_day2;
                listeEtu[i].affectation_day2 = listeEtu_test[i].affectation_day2;
            }
        }

    }
    

  /*  for(int i=0; i<Nb_etu_day2; i++){
        if(fgets(listeEtu_test[i].Nom, 50, file));
        listeEtu_test[i].Nom[strcspn(listeEtu_test[i].Nom, "\n")] = 0;
        if(fgets(listeEtu_test[i].Prenom, 50, file));
        listeEtu_test[i].Prenom[strcspn(listeEtu_test[i].Prenom, "\n")] = 0;

        if(fscanf(file, "%d", &listeEtu_test[i].idEtudiant));

        listeEtu_test[i].creditO = malloc(sizeof(int)*Nb_options);
        for(int j=0; j<Nb_options_day2; j++){
            if(fscanf(file, "%d", &listeEtu_test[i].creditO[j]));
        }
        char pass[10];              // Pour sauter "\n" a la fin de la ligne qui fait bugger le prochain fgets
        if(fgets(pass, 10, file));

        listeEtu[i].affectation = -1;
    }*/

	// Affiche la liste d'élève
    /*for(int i=0; i<Nb_etu_day2; i++){
        printf("\n\nNOM : %s\nPRENOM : %s\nID : %d\nCREDITS : ", listeEtu_test[i].Nom, listeEtu_test[i].Prenom, listeEtu_test[i].idEtudiant);
        for(int j=0; j<Nb_options_day2; j++){
            printf("%d ", listeEtu_test[i].creditO_day2[j]);
        }
    }*/
}