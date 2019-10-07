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


<dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
  <dt style="font-weight: bold; margin-bottom: 0.1em;">Presentational markup</dt>
  <dd style="margin-left: 1.6em; margin-bottom: 0.1em; margin-right: 0px;">The kind of markup used by traditional word-processing systems: binary codes embedded within document text that produce the&nbsp;
    <a href="https://en.wikipedia.org/wiki/WYSIWYG" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="WYSIWYG">WYSIWYG</a> ("<strong>what you see is what you get</strong>") effect. Such a markup is usually hidden from the human users, even the authors and the editors. Properly speaking, such systems use procedural and/or descriptive markup underneath, but convert it to "present" to the user as geometric arrangements type.</dd>
</dl>
<dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
  <dt style="font-weight: bold; margin-bottom: 0.1em;">Procedural markup</dt>
  <dd style="margin-left: 1.6em; margin-bottom: 0.1em; margin-right: 0px;">Markup is embedded in text, which then provides instructions for programs to process the text. Well-known examples include&nbsp;
    <a href="https://en.wikipedia.org/wiki/Troff" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="Troff">troff</a>,&nbsp;
    <a href="https://en.wikipedia.org/wiki/TeX" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="TeX">TeX</a>, and&nbsp;
    <a href="https://en.wikipedia.org/wiki/PostScript" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="PostScript">PostScript</a>. It is expected that the processor will run through the text from beginning to end, following the instructions as encountered. Text with such markups is often edited with the markups visible and directly manipulated by the author. Popular procedural-markup systems usually include programming constructs so macros or subroutines can be defined and invoked by name.
  </dd>
</dl>
<dl style="margin-top: 0.2em; margin-bottom: 0.5em; color: rgb(34, 34, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;">
  <dt style="font-weight: bold; margin-bottom: 0.1em;">Descriptive markup</dt>
  <dd style="margin-left: 1.6em; margin-bottom: 0.1em; margin-right: 0px;">Markup is used to label parts of the document rather than to provide specific instructions as to how they should be processed. Well-known examples include&nbsp;
    <a href="https://en.wikipedia.org/wiki/LaTeX" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="LaTeX">LaTeX</a>,&nbsp;
    <a href="https://en.wikipedia.org/wiki/HTML" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="HTML">HTML</a>, and&nbsp;
    <a href="https://en.wikipedia.org/wiki/XML" style="text-decoration: none; color: rgb(11, 0, 128); background: none;" title="XML">XML</a>. The objective is to decouple the inherent structure of the document from any particular treatment or rendition of it. Such markups are often described as "semantic". An example of a descriptive markup would be HTML's&nbsp;
    <code style="font-family: monospace, monospace; color: rgb(0, 0, 0); background-color: rgb(248, 249, 250); border: 1px solid rgb(234, 236, 240); border-radius: 2px; padding: 1px 4px;">&lt;cite&gt;</code> tag, which is used to label a citation. Descriptive markup — sometimes called&nbsp;<em>logical markup</em> or&nbsp;<em>conceptual markup</em> — encourages authors to write in a way that describes the material conceptually, rather than visually.<sup class="reference" style="line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-weight: normal; font-style: normal; font-size: 11.2px;">
      <a href="https://en.wikipedia.org/wiki/Markup_language#cite_note-8" style="text-decoration: none; color: rgb(11, 0, 128); background: none;">[8]</a>
    </sup></dd>
</dl>



