
#include <iostream>
#include <conio.h>
#include <math.h>
using namespace std;
int sum(int a, int b);
float zarb(float a, int b);

int main()
{
	int c = sum(2, 3);
	int b = sum(5, 10);

	//cout << c+5<<endl << b;

	cout << zarb(2.5, 5);



	
}

int sum(int a, int b) {
	int c;
	c = a + b;

	return c;
}
float zarb(float a, int b) {
	float c;
	c = a * b;

	return c;
}
