# Makefile de compilation pour le projet de GL || 09/2018

SHELL   = /bin/bash
CC      = gcc
MKDEP   = gcc -MM
RM      = rm -f

# Pour utiliser des fonctions de <math.h>, rajouter "-lm" a la fin de LIBS.
CFLAGS  = -std=c99
LIBS    =

# Mettre ici la liste des fichiers .c separes par un espace ;
# si besoin on peut eclater la liste sur plusieurs lignes avec "\".
CFILES  = test_option.c data_read.c

# Mettre ici le nom de l'executable.
EXEC    = affect

# Calcul automatique de la liste des fichiers ".o" a partir de CFILES.
OBJECTS := $(CFILES:%.c=%.o)

%.o : %.c
	$(CC) $(CFLAGS) -c $*.c

all :: $(EXEC)

$(EXEC) : $(OBJECTS)
	$(CC) -o $@ $^ $(LIBS)

clean ::
	$(RM) *.o *~ $(EXEC) depend

depend : *.c *.h
	$(MKDEP) *.c >| depend

# Inclut le fichier des dependances. 
# Le "-" devant include supprime l'erreur si le fichier est absent.
-include depend

