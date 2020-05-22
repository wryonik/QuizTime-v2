# Quiz Platform

## How to run

1. `git clone https://github.com/shubhamgupta2956/quiz_platform ~/quiz_platform`
2. `cd ~/quiz_platform`
3. Change the paths in `mvc_php.sdslabs.local.conf` pointing to the `public` folder of this project
4. `sudo cp ~/quiz_platform/mvc_php.sdslabs.local.conf /etc/apache2/sites-available/`
5. Add `mvc_php.sdslabs.local` entry to your `/etc/hosts`
6. `sudo a2ensite mvc_php.sdslabs.local.conf`
7. `sudo service apache2 restart`
8. Open [http://mvc_php.sdslabs.local](mvc_php.sdslabs.local) in your browser
