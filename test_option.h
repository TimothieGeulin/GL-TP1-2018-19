#ifndef AFFECT_H
#define AFFECT_H 
#include <stdio.h>
#include <string.h>
#include <time.h>
#include <stdlib.h>
#include <limits.h>
#include <assert.h>
#include "data_read.h"

typedef struct Options{
	char *code_module;
	char nom_UE[100];
	int effectif;
} Options;


typedef struct Etudiant {
	char Nom[50];
    char Prenom[50];
	int idEtudiant;

	// Premier jour d'affectation
	int *creditO;
	int *choice;
	int affectation;

	// Deuxieme jour d'affectation
	int *creditO_day2;
	int *choice_day2;
	int affectation_day2;
} Etudiant;


typedef struct s_LL_etudiant LL_etudiant;

struct s_LL_etudiant{
	Etudiant etudiant;
	LL_etudiant* suiv;
};

typedef LL_etudiant *LISTE;


/*Etudiant option_list[Nb_options][Nb_etu];			//La liste de tout les étudiants pour chaque Options
LISTE LL_option_list[Nb_options];
int effectif[Nb_options] = {6,4,3,5,4};

*/
Etudiant *listeEtu;


//Premier jour d'affectation
int *effectif;
Etudiant **option_list;
LISTE *LL_option_list;
Options *option_data;

int Nb_etu;
int Nb_options;
int CREDIT;


//Deuxieme jour d'affectation
Etudiant *listeEtu_test;
int *effectif_day2;
Etudiant **option_list_day2;
LISTE *LL_option_list_day2;
Options *option_data_day2;

int Nb_etu_day2;	// inutile pour le moment
int Nb_options_day2;
int CREDIT_day2;


void remove_when_assigned(Etudiant current, int indice_option);
int check_assignement(int choice[Nb_options], Etudiant current, int cursor);
int is_in_array(int tab[Nb_options], int check, int taille);
void get_choice_for_everyone();
void new_affect_all();
void fill_option_list();
void tri_option_list();
void print_option_list();
void print_affectations();
void everything_day1();
void everything_day2();
#endif

/*CLAIN
jordan
15020014
5
1
4
3
2
0
0*/