all : executable

executable : test_option.o
	gcc -o executable test_option.o
test_option.o : test_option.c test_option.h
	gcc -c test_option.c
clean :
	rm *.o      