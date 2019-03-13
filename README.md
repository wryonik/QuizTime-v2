# mvc_assign

How to run :-

git clone https://github.com/alphadose/MVC-Project ~/mvc
cd ~/mvc
Change the paths in mvc.sdslabs.local.conf pointing to the public folder of this project
sudo cp ~/mvc/mvc.sdslabs.local.conf /etc/apache2/sites-available/.
Add mvc.sdslabs.local entry to your /etc/hosts
sudo a2ensite mvc.sdslabs.local.conf
sudo service apache2 restart
Open http://mvc.sdslabs.local in your browser
