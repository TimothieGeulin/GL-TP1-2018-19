#include "test_option.h"

int main(){
	int nb_etudiant = 10;
	// printf("entrez nb etudiant\n");
	// scanf("%d",&nb_etudiant);

	/* Création des étudiants + affectations credits */
	srand(time(NULL));
	Etudiant listeEtu[nb_etudiant]; 
	//listeEtu = malloc(sizeof(Etudiant)*nb_etudiant);

	for(int i = 0; i<nb_etudiant; i++){
		listeEtu[i].idEtudiant = i;
		listeEtu[i].affectation = -1;
		for (int k = 0; k < 5; ++k){
			listeEtu[i].creditM[k]=0;
		}
		for(int j=0; j<CREDIT; j++){

			int tas = rand()%(5);
				
			while (listeEtu[i].creditM[tas]+1 > 7){
				tas = rand()%(5);
			}

			listeEtu[i].creditM[tas] += 1;			
		}
		printf("ETU : %d ===> M1 %d M2 %d M3 %d M4 %d M5 %d \n",listeEtu[i].idEtudiant, listeEtu[i].creditM[0], listeEtu[i].creditM[1], listeEtu[i].creditM[2], listeEtu[i].creditM[3], listeEtu[i].creditM[4]);
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

	tri(M1,nb_etudiant,1);
	tri(M2,nb_etudiant,2);
	tri(M3,nb_etudiant,3);
	tri(M4,nb_etudiant,4);
	tri(M5,nb_etudiant,5);

	int max;
	for (int i = 0; i < nb_etudiant; ++i)
	{
		max = maximum(listeEtu, i);
		while(!isOnTop(max, listeEtu[i].idEtudiant, M1, M2, M3, M4, M5)){
			max = maximum(listeEtu, i);
		}
		listeEtu[i].affectation = max;
		
		tri(M1,nb_etudiant,1);
		tri(M2,nb_etudiant,2);
		tri(M3,nb_etudiant,3);
		tri(M4,nb_etudiant,4);
		tri(M5,nb_etudiant,5);
	}
	printf("\n");
	/* on parcour chaque etudiant, on regarde son choix n 1, si il est 
	dans les 30 premiers on lajoute a l'option sinon on regarde son choix n2 etc
	aussi regarder si il est dans le top 30 dans dautre matieres que celle ou il a 
	ete affecté et le mettre a la fin du tableau de ces matieres la */
	for (int i = 0; i < nb_etudiant; ++i)
	{
		printf("ETU : %d ===> affected %d\n", listeEtu[i].idEtudiant, listeEtu[i].affectation);
	}
	return 0;

}

int maximum(Etudiant *Etu, int j){
	int max = 0;
	int tmpi;
	for (int i = 0; i < 5; ++i)
	{
		if (Etu[j].creditM[i] > max)
		{
			tmpi = i;
			max  = Etu[j].creditM[i];
		}
	}
	Etu[j].creditM[tmpi] = 0;
	return tmpi;
}

void tri(Etudiant * M, int tailleM, int numOpt){
	for (int i = tailleM; i >= 0; --i)
	{
		for (int j = 0; j < i; ++j)
		{
			if (M[j+1].creditM[numOpt] < M[j].creditM[numOpt])
			{
				permut(M,j+1,j);
			};
		}
	}
}

void permut (Etudiant * Tab, int index1, int index2){
	Etudiant tmpEtu = Tab[index1];
	Tab[index1] = Tab[index2];
	Tab[index2] = tmpEtu;
}

int isOnTop(int cred, int idEtu, Etudiant *M1, Etudiant *M2, Etudiant *M3, Etudiant *M4, Etudiant *M5){
	switch (cred){
		case 1: 
			for (int i = 0; i < NBPARCLASSE; ++i)
			{
				if (M1[i].idEtudiant = idEtu)
				{
					return 1;
					break;
				}
			}

		case 2: 
			for (int i = 0; i < NBPARCLASSE; ++i)
			{
				if (M2[i].idEtudiant = idEtu)
				{
					return 1;
					break;
				}
			}
		case 3: 
			for (int i = 0; i < NBPARCLASSE; ++i)
			{
				if (M3[i].idEtudiant = idEtu)
				{
					return 1;
					break;
				}
			}
		case 4: 
			for (int i = 0; i < NBPARCLASSE; ++i)
			{
				if (M1[4].idEtudiant = idEtu)
				{
					return 1;
					break;
				}
			}
		case 5: 
			for (int i = 0; i < NBPARCLASSE; ++i)
			{
				if (M5[i].idEtudiant = idEtu)
				{
					return 1;
					break;
				}
			}
		default :
			break;
	}
	return 0;
	
}

// void etuiGoesDown(Etudiant *listeEtu,int i,Etudiant * M1,Etudiant * M2,Etudiant * M3,Etudiant * M4,Etudiant * M5){
// 	int tmpAffect = listeEtu[i].affectation;

// }

