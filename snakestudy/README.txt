Snake Study 2013
Nic Linscott, Dan Guinto, Graham Montague, Tanner Hadick
Supervisor: Nic Linscott
Advisor: Scott Maretka

Create the datefile with ownership as the webserver user. (i.e. apache)
Example:
	sudo chown apache snakes.csv
	echo "Board;Species;Eaches;Lengths (inches);Date
	" > snakes.csv


The script can now properly handle when the snakes.csv is empty, but it still requires read/write access. 
