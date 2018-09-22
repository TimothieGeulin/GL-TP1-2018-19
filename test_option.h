#include <stdio.h>
#include <string.h>
#include <time.h>
#include <stdlib.h>	
#define CREDIT 10
#define NBPARCLASSE 2


typedef struct Etudiant {
	int idEtudiant;
	int creditM[5];
	int affectation;
} Etudiant;

int maximum(Etudiant *Etu, int j);
void tri(Etudiant * M, int tailleM, int numOpt);
void permut (Etudiant * Tab, int index1, int index2);
int isOnTop(int cred, int idEtu, Etudiant *M1, Etudiant *M2, Etudiant *M3, Etudiant *M4, Etudiant *M5);