


#include <iostream>
#include <conio.h>
#include <math.h>

using namespace std;

int main()
{
	//for (int n = 10; n >= 1; n--) {
	//	if (n % 3 == 2) {
	//		/*continue;*/
	//		break;
	//	}
	//	cout << " number : " << n;
	//}

	int a[5];

	//a[0] = 2;
	//a[1] = 3;
	//a[2] = 5;
	//a[3] = 8;
	//a[4] = 10;

	int x[] = {1,2,5,8};


	//cout << a[2];

	//for (int n = 0; n < 5;n++) {
	///*	cout << a[n]<< endl;*/
	//	cout << "enter a number";
	//	cin >> a[n];

	//}

	//for (int n = 0; n < 5; n++) {
	//	cout << "---------------------------------"<< endl << a[n] << endl;
	//	//cout << "enter a number";
	//	//cin >> a[n];

	//}

	string letters[2][4] = {
  { "A", "B", "C", "D" },


  { "E", "F", "G", "H" }
	};

	for (int n = 1; n >= 0; n--) {
		for (int j = 3; j >= 0; j--) {
			cout << letters[n][j];
		}
	}

}

