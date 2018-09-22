#include <stdio.h>
#include <string.h>
#include <time.h>
#include <stdlib.h>	
#define CREDIT 10

typedef struct Etudiant {
	int idEtudiant;
	int creditM[5];
	int affectation;
} Etudiant;

int main(){
	int nb_etudiant;
	printf("entrez nb etudiant\n");
	scanf("%d",&nb_etudiant);

	/* Création des étudiants + affectations credits */
	srand(time(NULL));
	Etudiant listeEtu[nb_etudiant]; 
	//listeEtu = malloc(sizeof(Etudiant)*nb_etudiant);

	for(int i = 0; i<nb_etudiant; i++){
		listeEtu[i].idEtudiant = i;
		listeEtu[i].affectation = -1;

		for(int j=0; j<CREDIT; j++){

			int tas = rand()%(5-1);	
			while (listeEtu[i].creditM[tas] >= 7)
				tas = rand()%(5-1);

			listeEtu[i].creditM[tas] += 1;			
		}
	}


/* triage des étudiants dans les matieres */

	Etudiant M1[nb_etudiant];
	for (int i=0; i<nb_etudiant; i++){
		M1[i] = listeEtu[i];
	}
	Etudiant M2[nb_etudiant];
	for (int i=0; i<nb_etudiant; i++){
		M2[i] = listeEtu[i];
	}
	Etudiant M3[nb_etudiant];
	for (int i=0; i<nb_etudiant; i++){
		M3[i] = listeEtu[i];
	}
	Etudiant M4[nb_etudiant];
	for (int i=0; i<nb_etudiant; i++){
		M4[i] = listeEtu[i];
	}
	Etudiant M5[nb_etudiant];
	for (int i=0; i<nb_etudiant; i++){
		M5[i] = listeEtu[i];
	}

	tri(M1);
	tri(M2);
	tri(M3);
	tri(M4);
	tri(M5);

	int max;
	for (int i = 0; i < nb_etudiant; ++i)
	{
		max = maximum(listeEtu[i]);
		if(isInTop(max,id));
			
	}
	/* on parcour chaque etudiant, on regarde son choix n 1, si il est 
	dans les 30 premiers on lajoute a l'option sinon on regarde son choix n2 etc
	aussi regarder si il est dans le top 30 dans dautre matieres que celle ou il a 
	ete affecté et le mettre a la fin du tableau de ces matieres la */

}
