#used settings

created this practical by using xampp with the phpstorm editor.
Not tested on centos 7 but it should run on any OS.

#how to use
1. download from github or clone from github to appropriate folder based on your OS.
2. Here used composer for auto loading in PHP code and classes as well as used phpunit.xml for bootstraping unit test.
3. for run the application in browser use appropriate folder structure in browser. for e.g. I used in my PC.
http://localhost/aligentf/index.html
4. make sure you had composer installed and here I Include my composer generated vendor folder also but need to make changes according to your settings and folder structure.
for e.g. in composer.json file i used psr-4 for auto loading and class map like below
"autoload": {
    "psr-4": {
      "Calc\\": "Calc/Classes"
    } so in your case make sure it apply as per your folder structure.
5. in PHP file used require __DIR__ . '/vendor/autoload.php'; so make sure make path as per your folder structure.
6. in phpunit.xml file make sure you used proper folder structure for bootstrap.
7. double check your entry in vendor/composer/autoload_classmap.php and if it is not correct than make changes in composer.json file as per
your folder structure and run "composer dump-autoload -o" and recheck classmap entry in vendor/composer/autoload_classmap.php  
8. for run unit test you need to open command line and run "phpunit".
9. created Unit test for each class each method with data provider functions so you can make change value in data provider array and check the result passed or failed.
10. in PHP passed value in each function after checking input parameter is valid or not so in some function there is no need to create invalid data provider function in unit test.
 