(The program was run on a Windows computer)

Installation of XAMPP (for Apache server):
1. Download XAMPP 5.6.15 from https://www.apachefriends.org/download.html 
2. After installation, open XAMPP control panel. 
3. Click Config button displayed to the right of Apache. Open httpd.conf file.
   Replace 80 to 8080 from "ServerName localhost: 80" line. And, in the same file change the
   "Listen 80" to "Listen 8080". And save the file.
4. Click Config button displayed to the right of Apache. Open httpd-ssl.conf file.
   Replace "Listen 43" line with "Listen 4433" line. Replace "<VirtualHost_default_:43>" 
   with "<VirtualHost_default_:4433>. And finally, replace "ServerName localhost: 43" line with
   "ServerName localhost: 4433" line. And save the file.
Note: steps 2-4 are to make sure that apache as access to open and available ports.
5. Open the file "php.ini" from the same location("config") as above steps. Find the 
   line "extension=php_gmp.dll" and uncomment it by removing the semicolon before this line.
   And save the file. 
   Note: gmp extension is needed for some php files to perform arthimetic operations on BigIntegers which
	were used for Bank Account Number.
6. Click "start" on the XAMPP control panel to start the apache server.
7. Go to the file location where the xampp folder was downloaded and installed to. The source files with 
   the html, css and php codes are stored under htdocs folder inside xampp. 
   The contents from Source code folder could be directly extracted to a new folder created in htdocs. 
   example: xampp>htdocs>onlineretail>(all php content).
8. The files from this location could be accessed by typing in the folder name of the folder that 
   contains all the php files. From above example this is the "onlineretail" folder. So the corresponding  
   url for this example would be "localhost:8080/onlineretail/".
   Note: Chrome was used to run and test the files.
   
Setting up MySQL
1. MySQL connection was established with following details:
   Method: Standard(TCP/IP), Hostname:localhost, Port:3306,
   Username: root, Password: 1234
2. Database name: retailpurchase (dump sql file has the accurate name)





