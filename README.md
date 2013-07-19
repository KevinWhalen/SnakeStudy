
###THINKS TO KNOW:

This is an example of how to integrate Google Maps API and JQuery Mobile forms. 

The Google Maps 'Info Windows' are incapable of creating forms in which the action is a PHP file.
The forms are usually creaded in the map init() script, declaring a variable to be a string of html, 
then appnding it to the info window via Infowindow.SetContent();. 

Using jQuery Mobile and jQuery scripts, this example shows how to effectively submit data with google maps and forms. 

The jQuery script uses AJAX to send the data, allowing it to be sent to a PHP file without navigating to it. 

I didn't put a WHOLE lot of effort into the Themeroller aspect of JQM because, well, I just wanted to get it working. 

- Nic Linscott


---
>Changed output file format from a human read-able .txt to a smaller, more easily machine read-able .csv.

>Added input validation/sanitation.

>Added persistant markings on the map.

>Added a dialog on marker click to allow it to be edited *(edit is really just 'add to file')* or deleted.

>Added a clear all button to remove all persistant map markers at once.

>The file cgi/test.py can be used to verify the CGI setup. 
>http://exampleurl.com/cgi-bin/test.py

####Note:

Knowledge of how to setup a webserver with CGI may be needed to deploy this site as well as knowing how to configure the permissions of the accessed files.
Most likely puting the CGI files in a directory at the root of the webserver with a name like 'cgi-bin' and doing a chown to apache for them as well as the used data files will cut it. 
The python files also have to be executable. (sudo chmod +x)
The CGI directory and the webserver username depend on individual installiations and configurations. 
The new backend scripts were done with the CGI to allow me to learn some more Python. 

- Kevin Whalen

