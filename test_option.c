// gcc test_option.c -std=c99 -o test_option
#include "test_option.h"

//int effectif[Nb_options] = {30, 28, 32, 27, 31}; 	//	effectif max pour les options


/*
void fill_option_list(Etudiant Tab[Nb_etu]){
	//printf("Start %s\n", __func__);
	for(int i=0; i<Nb_options; i++){
		for(int j=0; j<Nb_etu; j++){
			option_list[i][j] = Tab[j];
		}
	} 
	//printf("End %s\n", __func__);
}*/


void array_to_LL(){
	//printf("Start %s\n", __func__);

	for(int index_option = 0; index_option < Nb_options; index_option++){
		LISTE temp = malloc(sizeof(LL_etudiant));
		assert(temp);

		temp->etudiant = option_list[index_option][0];
		temp->suiv = NULL;
		LL_option_list[index_option] = temp;

		for(int i=1; i<Nb_etu; i++){
			LISTE temp2 = malloc(sizeof(LL_etudiant));
			assert(temp2);

			temp->suiv = temp2;
			temp2->etudiant = option_list[index_option][i];
			temp2->suiv = NULL;
			temp=temp2;
		}	
	}
	//printf("End %s\n", __func__);
}

void array_to_LL_day2(){
	//printf("Start %s\n", __func__);

	for(int index_option = 0; index_option < Nb_options_day2; index_option++){
		LISTE temp = malloc(sizeof(LL_etudiant));
		assert(temp);

		temp->etudiant = option_list_day2[index_option][0];
		temp->suiv = NULL;
		LL_option_list_day2[index_option] = temp;

		for(int i=1; i<Nb_etu; i++){
			LISTE temp2 = malloc(sizeof(LL_etudiant));
			assert(temp2);

			temp->suiv = temp2;
			temp2->etudiant = option_list_day2[index_option][i];
			temp2->suiv = NULL;
			temp=temp2;
		}	
	}
	//printf("End %s\n", __func__);
}

void print_LL(){
	//printf("Start %s\n", __func__);
	for(int i=0; i<Nb_options; i++){
		printf("\n-------------\nOPTION %d\n", i);
		if(LL_option_list[i] == NULL){
			exit(0);
		}

		LISTE p = LL_option_list[i];

		while(p != NULL){
			printf("Etudiant %d | Credit : %d\n", p->etudiant.idEtudiant, p->etudiant.creditO[i]);
			p = p->suiv;
		}
	}
	//printf("End %s\n", __func__);
}

void print_LL_day2(){
	//printf("Start %s\n", __func__);
	for(int i=0; i<Nb_options_day2; i++){
		printf("\n-------------\nOPTION %d\n", i);
		if(LL_option_list_day2[i] == NULL){
			exit(0);
		}

		LISTE p = LL_option_list_day2[i];

		while(p != NULL){
			printf("Etudiant %d | Credit : %d\n", p->etudiant.idEtudiant, p->etudiant.creditO_day2[i]);
			p = p->suiv;
		}
	}
	//printf("End %s\n", __func__);
}

void remove_when_assigned(Etudiant current, int indice_option){	/*Enlève un étudiant des autres liste quand on lui affecte une option*/
	//printf("Start %s\n", __func__);
	//printf("AVANT SUPRESSION : ETUDIANT %d \n",current.idEtudiant);
	//print_LL();
	int check_first = 0;

	LISTE old;
	LISTE tmp = LL_option_list[indice_option];
	
	while(tmp->suiv != NULL){
		if(tmp->etudiant.idEtudiant == current.idEtudiant){
			if(check_first == 0){
				LL_option_list[indice_option] = LL_option_list[indice_option]->suiv; 
			}
			else{
				old->suiv=tmp->suiv;
			}
		}
		if(check_first == 0){
			check_first ++;
		}
		old = tmp;
		tmp = tmp->suiv;
	}	
	//printf("-----------\nAPRES SUPRESSION\n");
	//print_LL();				
	//printf("End %s\n", __func__);	
}

void remove_when_assigned_day2(Etudiant current, int indice_option){	/*Enlève un étudiant des autres liste quand on lui affecte une option*/
	//printf("Start %s\n", __func__);
	//printf("AVANT SUPRESSION : ETUDIANT %d \n",current.idEtudiant);
	//print_LL();
	int check_first = 0;

	LISTE old;
	LISTE tmp = LL_option_list_day2[indice_option];
	
	while(tmp->suiv != NULL){
		if(tmp->etudiant.idEtudiant == current.idEtudiant){
			if(check_first == 0){
				LL_option_list_day2[indice_option] = LL_option_list_day2[indice_option]->suiv; 
			}
			else{
				old->suiv=tmp->suiv;
			}
		}
		if(check_first == 0){
			check_first ++;
		}
		old = tmp;
		tmp = tmp->suiv;
	}	
	//printf("-----------\nAPRES SUPRESSION\n");
	//print_LL();				
	//printf("End %s\n", __func__);	
}
 
int is_in_array(int tab[Nb_options], int check, int taille){
	//printf("Start %s\n", __func__);
	for(int i=0; i<taille; i++){
		if (tab[i] == check)
		return 1;
	}
	return 0;
	//printf("End %s\n", __func__);
}

void print_choice(){
	//printf("Start %s\n", __func__);
	for(int i = 0; i<Nb_etu; i++){
		printf("---------------------\nEtudiant %d :\n", i);
		for(int j = 0; j<Nb_options; j++){
			printf("Choix %d = Option %d\n", j, listeEtu[i].choice[j]);
		}
	}
	//printf("End %s\n", __func__);
}

void print_choice_day2(){
	//printf("Start %s\n", __func__);
	for(int i = 0; i<Nb_etu; i++){
		printf("---------------------\nEtudiant %d :\n", i);
		for(int j = 0; j<Nb_options_day2; j++){
			printf("Choix %d = Option %d\n", j, listeEtu[i].choice_day2[j]);
		}
	}
	//printf("End %s\n", __func__);
}

int check_if_everyone_is_assigned(){
	//printf("Start %s\n", __func__);

	for (int i=0; i<Nb_etu; i++){
		if(listeEtu[i].affectation == -1)
			//printf("End %s\n", __func__);
			return 0;
	}
	//printf("End %s\n", __func__);
	return 1;
}

void get_choice_for_everyone(){
	//printf("Start %s\n", __func__);
	int best_choice;
	int best_index;

	for(int i=0; i<Nb_etu; i++){
		listeEtu[i].choice = malloc(sizeof(int) * Nb_options);
		best_index = -1;
		for(int j=0; j<Nb_options; j++){
			listeEtu[i].choice[j] = -1;
		}

		for(int j=0; j<Nb_options; j++){	// Permet d'avoir les options par ordre de demande dans choice[]
			best_choice = -1;
			for(int k=0; k<Nb_options; k++){
				if(best_choice < listeEtu[i].creditO[k]){
					if(!is_in_array(listeEtu[i].choice, k, Nb_options)){
						best_choice = listeEtu[i].creditO[k];
						best_index = k;
					}
				}
			}
		listeEtu[i].choice[j]=best_index;
		}
	}
	//printf("End %s\n", __func__);
}

void get_choice_for_everyone_day2(){
	//printf("Start %s\n", __func__);
	int best_choice;
	int best_index;

	for(int i=0; i<Nb_etu; i++){
		listeEtu[i].choice_day2 = malloc(sizeof(int) * Nb_options_day2);
		best_index = -1;
		for(int j=0; j<Nb_options_day2; j++){
			listeEtu[i].choice_day2[j] = -1;
		}

		for(int j=0; j<Nb_options_day2; j++){	// Permet d'avoir les options par ordre de demande dans choice[]
			best_choice = -1;
			for(int k=0; k<Nb_options_day2; k++){
				if(best_choice < listeEtu[i].creditO_day2[k]){
					if(!is_in_array(listeEtu[i].choice_day2, k, Nb_options_day2)){
						best_choice = listeEtu[i].creditO_day2[k];
						best_index = k;
					}
				}
			}
		listeEtu[i].choice_day2[j]=best_index;
		}
	}
	//printf("End %s\n", __func__);

}

int new_affect(int choice_index){	// renvoi 1 si une affectation a eu lieu, sinon 0
	//printf("Start %s\n", __func__);

	int change = 0;
	for (int i=0; i<Nb_etu; i++){
		if(listeEtu[i].affectation == -1){
			int option = listeEtu[i].choice[choice_index];	//On récupère le choix de l'étudiant qu'on va traiter
			int compteur = 0;
			LISTE tmp = LL_option_list[option];
			while (compteur < effectif[option] && tmp != NULL){
				if (tmp->etudiant.idEtudiant == listeEtu[i].idEtudiant){
					if(change == 0)
						change = 1;
					effectif[option]--;
					listeEtu[i].affectation = option;
					for(int index_option = 0; index_option < Nb_options; index_option ++){
						remove_when_assigned(listeEtu[i], index_option);
					}
				}
				tmp = tmp->suiv;
				compteur ++;
			}
		}
	}

	//printf("End %s\n", __func__);
	return change;
}

int new_affect_day2(int choice_index){	// renvoi 1 si une affectation a eu lieu, sinon 0
	//printf("Start %s\n", __func__);

	int change = 0;
	for (int i=0; i<Nb_etu; i++){
		if(listeEtu[i].affectation_day2 == -1){
			int option = listeEtu[i].choice_day2[choice_index];	//On récupère le choix de l'étudiant qu'on va traiter
			int compteur = 0;
			LISTE tmp = LL_option_list_day2[option];
			while (compteur < effectif_day2[option] && tmp != NULL){
				if (tmp->etudiant.idEtudiant == listeEtu[i].idEtudiant){
					if(change == 0)
						change = 1;
					effectif_day2[option]--;
					listeEtu[i].affectation_day2 = option;
					for(int index_option = 0; index_option < Nb_options_day2; index_option ++){
						remove_when_assigned_day2(listeEtu[i], index_option);
					}
				}
				tmp = tmp->suiv;
				compteur ++;
			}
		}
	}

	//printf("End %s\n", __func__);
	return change;
}

void new_affect_all(){
	//printf("Start %s\n", __func__);

	get_choice_for_everyone();
	//print_choice();	

	int check_change;
	for(int i=0; i<Nb_options; i++){
		check_change = 1;
		while (check_change){
			check_change = new_affect(i);
			//printf("check_change = %d\n", check_change);
		}
		//printf("Aucun changement on regarde les choix %d -> check_change = %d\n", i+1, check_change);
	}
	//printf("End %s\n", __func__);
} 

void new_affect_all_day2(){
	//printf("Start %s\n", __func__);

	//get_choice_for_everyone_day2();
	//print_choice_day2();	

	int check_change;
	for(int i=0; i<Nb_options_day2; i++){
		check_change = 1;
		while (check_change){
			check_change = new_affect_day2(i);
			//printf("check_change = %d\n", check_change);
		}
		//printf("Aucun changement on regarde les choix %d -> check_change = %d\n", i+1, check_change);
	}
	//printf("End %s\n", __func__);
} 

/* Ajoutes tous les étudiants a toutes les listes d'options pour la trié par la suite */
void fill_option_list(){
	//printf("Start %s\n", __func__);

	option_list = malloc(sizeof(Etudiant) * Nb_options);
	assert(option_list);
	for (int i=0; i<Nb_options; i++){
		option_list[i] = malloc(sizeof(Etudiant) * Nb_etu);
	}

	for(int i=0; i<Nb_options; i++){
		for(int j=0; j<Nb_etu; j++){
			option_list[i][j] = listeEtu[j];
		}
	} 
	//printf("End %s\n", __func__);
}

/* Pareil mais pour le second jour d'option */
void fill_option_list_day2(){
	//printf("Start %s\n", __func__);

	option_list_day2 = malloc(sizeof(Etudiant) * Nb_options_day2);
	assert(option_list_day2);
	for (int i=0; i<Nb_options_day2; i++){
		option_list_day2[i] = malloc(sizeof(Etudiant) * Nb_etu);
	}

	for(int i=0; i<Nb_options_day2; i++){
		for(int j=0; j<Nb_etu; j++){
			option_list_day2[i][j] = listeEtu[j];
		}
	} 
	//printf("End %s\n", __func__);
}

/* tri la liste des options par étudiants selon ceux qui ont le plus de crédits */
void tri_option_list(){
	//printf("Start %s\n", __func__);
	Etudiant tmp;
	for(int indice_option=0; indice_option<Nb_options; indice_option++){
		for(int i=0; i<=Nb_etu -1; i++)
			for(int j=0; j<Nb_etu; j++)
				if (option_list[indice_option][i].creditO[indice_option] >
							option_list[indice_option][j].creditO[indice_option]) {	
					tmp = option_list[indice_option][i];
					option_list[indice_option][i] = option_list[indice_option][j];
					option_list[indice_option][j] = tmp;
				}
	}
	//printf("End %s\n", __func__);
}

/* tri la liste des options de la deuxieme journée */
void tri_option_list_day2(){
	//printf("Start %s\n", __func__);
	Etudiant tmp;
	for(int indice_option=0; indice_option<Nb_options_day2; indice_option++){
		for(int i=0; i<=Nb_etu -1; i++)
			for(int j=0; j<Nb_etu; j++)
				if (option_list_day2[indice_option][i].creditO_day2[indice_option] >
							option_list_day2[indice_option][j].creditO_day2[indice_option]) {	
					tmp = option_list_day2[indice_option][i];
					option_list_day2[indice_option][i] = option_list_day2[indice_option][j];
					option_list_day2[indice_option][j] = tmp;
				}
	}
	//printf("End %s\n", __func__);
}

void print_option_list(){
	//printf("Start %s\n", __func__);
	for(int i=0; i<Nb_options; i++){
		printf("	||| Option %d |||\n", i);
		for (int j=0; j<Nb_etu; j++) {
			printf("	  Etudiant n°%d\n", option_list[i][j].idEtudiant);
		}
		printf("  --------------------------------------------\n");
		printf("  --------------------------------------------\n");
		printf("  --------------------------------------------\n");
	}
	//printf("End %s\n", __func__);
}

void print_option_list_day2(){
	//printf("Start %s\n", __func__);
	for(int i=0; i<Nb_options_day2; i++){
		printf("	||| Option %d |||\n", i);
		for (int j=0; j<Nb_etu; j++) {
			printf("	  Etudiant n°%d\n", option_list_day2[i][j].idEtudiant);
		}
		printf("  --------------------------------------------\n");
		printf("  --------------------------------------------\n");
		printf("  --------------------------------------------\n");
	}
	//printf("End %s\n", __func__);
}

void satisfaction(){
	int tab_count[Nb_options];
	for(int i=0; i<Nb_options; i++){
		tab_count[i] = 0;
	}

	for(int i=0; i<Nb_etu; i++){
		for(int j=0; j<Nb_options; j++){
			if(listeEtu[i].choice[j] == listeEtu[i].affectation){
				tab_count[j]++;
			}
		}

	}

	for(int i=0; i<Nb_options; i++){
		printf("CHOIX n°%d: %d sur %d étudiant = %f\n",i, tab_count[i], Nb_etu, (double) ((double)tab_count[i]/(double)Nb_etu)*100);
	}
}

void print_affectations(){
	//printf("Start %s\n", __func__);
	for (int i=0; i<Nb_etu; i++){
		printf("\nETUDIANT %d\n", i);
		for (int j=0; j<Nb_options; j++){
			printf("Option %d : %d\n", j, listeEtu[i].creditO[j]);
			//printf("Option %d / %s : %d\n", j, option_data[j].nom_UE, listeEtu[i].creditO[j]);
		}
		//printf("Affectation : %d / %s : \n", listeEtu[i].affectation, option_data[listeEtu[i].affectation].nom_UE);
		printf("Affectation : %d \n", listeEtu[i].affectation);

		for (int j=0; j<Nb_options_day2; j++){
			printf("Option %d : %d\n", j, listeEtu[i].creditO_day2[j]);
			//printf("Option %d / %s : %d\n", j, option_data[j].nom_UE, listeEtu[i].creditO[j]);
		}
		//printf("Affectation : %d / %s : \n", listeEtu[i].affectation, option_data[listeEtu[i].affectation].nom_UE);
		printf("Affectation : %d \n", listeEtu[i].affectation_day2);

	}

	//printf("End %s\n", __func__);
}

void everything_day1(){

	fill_option_list();
	//print_option_list();
	tri_option_list();
	//print_option_list();
	array_to_LL();
	//print_LL();
	new_affect_all();
	//print_LL();
	//print_affectations();
	
	/*for(int i=0; i<Nb_options; i++){	//	Affiche les effectifs restants
		printf("%d / ",effectif[i]);
	}*/
}

void everything_day2(){

	fill_option_list_day2();
	tri_option_list_day2();
	//print_option_list();
	array_to_LL_day2();
	//print_LL_day2();
	new_affect_all_day2();
	//print_LL_day2();s
	//print_affectations();
}

void prevent_double_affecation(){		// TODO à vérif si ça marche en changeant les fichiers d'entrées en y ajoutant les code d'ue.
	//printf("Start %s\n", __func__);

	get_choice_for_everyone_day2();
	for(int i=0; i<Nb_etu; i++){
		int credit_a_redistribuer = 0;
		int current = listeEtu[i].affectation;
		for(int j=0; j<Nb_options_day2; j++){
			if(listeEtu[i].creditO_day2[j] > 0){
				if(option_data[listeEtu[i].affectation].code_module == option_data_day2[j].code_module){
					credit_a_redistribuer = listeEtu[i].creditO_day2[j];
					int indice_option = 0;

					while(credit_a_redistribuer > 0){		// On redistribue les credits
						if(listeEtu[i].choice_day2[indice_option] != j){
							if(listeEtu[i].creditO_day2[listeEtu[i].choice_day2[indice_option]] < ((Nb_options_day2 * 2) * 70)/100){	// inférieur à 70% des credits totaux
								listeEtu[i].creditO_day2[listeEtu[i].choice_day2[indice_option]] ++;
								credit_a_redistribuer --;
							}
							else indice_option ++;
						}
						else indice_option ++;
					}
				}
				listeEtu[i].creditO_day2[j] = 0;

			}
		}
	}
	//printf("End %s\n", __func__);

}


int main(int argc, char const *argv[]){

	// --- Récupération des données de l'option numéro 1 --- //
	get_data("data_setup.txt");

	option_list = malloc(sizeof(Etudiant) * Nb_options);
	assert(option_list);
	for (int i=0; i<Nb_options; i++){
		option_list[i] = malloc(sizeof(Etudiant) * Nb_etu);
		assert(option_list);
	}
	
	/*printf("Options = %d / Etudiants = %d\n", Nb_options, Nb_etu);
	// Affiche la liste d'élève
	for(int i=0; i<Nb_etu; i++){
        printf("\n\nNOM : %s\nPRENOM : %s\nID : %d\nCREDITS : ", listeEtu[i].Nom, listeEtu[i].Prenom, listeEtu[i].idEtudiant);
        for(int j=0; j<Nb_options; j++){
            printf("%d ", listeEtu[i].creditO[j]);
        }
    }*/
	
	LL_option_list = malloc(sizeof(LISTE) * Nb_options);
	assert(LL_option_list);
	


	// --- Récupération des données de l'option numéro 2 --- //
	get_data_day2("data_setup2.txt");

	option_list_day2 = malloc(sizeof(Etudiant) * Nb_options);
	assert(option_list_day2);
	for (int i=0; i<Nb_options_day2; i++){
		option_list_day2[i] = malloc(sizeof(Etudiant) * Nb_etu_day2);
		assert(option_list_day2);
	}

	LL_option_list_day2 = malloc(sizeof(LISTE) * Nb_options_day2);
	assert(LL_option_list_day2);

	// printf("Options = %d / Etudiants = %d\n", Nb_options_day2, Nb_etu);
	// // Affiche la liste d'élève
	// for(int i=0; i<Nb_etu_day2; i++){
    //     printf("\n\nNOM : %s\nPRENOM : %s\nID : %d\nCREDITS : ", listeEtu[i].Nom, listeEtu[i].Prenom, listeEtu[i].idEtudiant);
    //     for(int j=0; j<Nb_options_day2; j++){
    //         printf("%d ", listeEtu[i].creditO_day2[j]);
    //     }
    // }

	/*printf("Options = %d / Etudiants = %d\n", Nb_options, Nb_etu);
	// Affiche la liste d'élève
	for(int i=0; i<Nb_etu; i++){
        printf("\n\nNOM : %s\nPRENOM : %s\nID : %d\n", listeEtu[i].Nom, listeEtu[i].Prenom, listeEtu[i].idEtudiant);
		printf("CREDITS JOUR 1 : ");
        for(int j=0; j<Nb_options; j++){
            printf("%d ", listeEtu[i].creditO[j]);
        }
		printf("\nCREDITS JOUR 2 : ");
		for(int j=0; j<Nb_options_day2; j++){
            printf("%d ", listeEtu[i].creditO_day2[j]);
        }
    }
    printf("\n");*/



	effectif = malloc(sizeof(int) * Nb_options);
	assert(effectif);
	for(int i=0; i<Nb_options; i++){
		effectif[i]=28;
	}

	effectif_day2 = malloc(sizeof(int) * Nb_options_day2);
	assert(effectif_day2);
	for(int i=0; i<Nb_options_day2; i++){
		effectif_day2[i]=28;
	}

	everything_day1();
	//prevent_double_affecation();
	everything_day2();
	
	print_affectations();
	satisfaction();


	return 0;

}
