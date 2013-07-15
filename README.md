
THINKS TO KNOW:

This is an example on how to integrate Google Maps API and JQuery Mobile forms.

The Google Maps 'Info Windows' are incapable of creating forms in which the action is a PHP file.
The forms are usually creaded in the map init() script, declaring a variable to be a string of html, 
then appnding it to the info window via Infowindow.SetContent();.
Since PHP is server side code and Javascript is client side, javascript cannot make initiate PHP in this manner. 

Save yourself the headache, it just doesnt work.

Using Jquery Mobile and Jquery scripts, this example shows how to effectively submit data with google maps and forms.

The Jquery Script usues AJAX to send the data, allowing it to be sent to a PHP file without going to website.com/data.php.
It truly makes it a background process and also saves the points on the map because there is no page refresh.

I didnt put a WHOLE lot of effort into the Themeroller aspect of JQM because, well, i just wanted to get it working.

At first i tried to implement Bootstrap as well as JQM, but with Google Maps in the equation, nobody got along very well.
I scrapped bootstrap and just used JQM because the 'data-role="dialog"' attribute made it much smoother than 
any other method of forms.