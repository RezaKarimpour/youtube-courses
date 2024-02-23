
/*  https://youtube.com/@root_one */

#include <iostream>
#include <conio.h>
using namespace std;

int main()
{

	/*class rectangle
	{
	private:
		int x, y;
		int test(){
			cout << 'rootone';
		}

	public:
		void set(int m , int n) {
			x = m;
			y = n;
		}

		int masahat() {
			return x * y;
		}

		int mohit() {
			return 2 * (x + y);
		}


	}r1;


		r1.set(1,5);
		cout << r1.masahat() << endl;
		cout << r1.mohit();*/



	class person {
	protected:
		string name;
		string lname;
		int age;
	public:
		person() {
			name = "reza";
			lname = "rootone";
			age = 25;
		}
		void print() {
			cout << "name:" << name << endl << "last name:" << lname << endl << "age:" << age;
		}

	};

	class student:public person
	{
	private:
		string reshte;
		string code;

	public:
		student() {
			reshte = "computer";
			code = "123456789";
		}
		 
		void print() {
			cout << "name:" << name << endl << "last name:" << lname << endl << "age:" << age <<endl << "reshte:" << reshte <<endl << "code:" << code;
		}



	}s1;

	s1.print();

}

