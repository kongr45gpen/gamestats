This is the main README file for the BZFlag GameStats/Bzstats site

This Bzstats site is built on the Qore framework, which was built for this site.

The Qore framework is meant to be simple, small, and easily extendable so that third party
components can be easily snapped in, and used. For more info, please see the docs directory.

BzStats itself is in the early stages, and will get better with time. 
If you have any recommendations, please see Quol on #bzflag on IRC (Freenode).

Installation
=====

Stats collector
-----
First of all, you need to get your hands on the BZFlag stats collector, which can be cloned using SVN:

    svn co svn://svn.code.sf.net/p/bzflag/code/trunk/tools/BZStatCollector
	
Then, you need to compile the CollectorCLI sources. If you are on Windows, you should open the solution file
(CollectorCLI.sln) using Visual C# (any version should work). If you are on Linux or any Unix-based operating system,
install monodevelop and run the following commands on the CollectorCLI directory:

    ln -s ../DatabaseStore/MySql.Data.dll .
    gmcs -r:"System.Data" -r:MySql.Data.dll Program.cs ../Connector/BZConnect.cs ../Connector/BZFSList.cs ../Connector/StatRecords.cs ../DatabaseStore/DBStore.cs

These should get you a working Program.exe executable.

Database
-----
Using your favourite MySql database administration tool (such as PhpMyAdmin), create the database where all the data
is going to be stored. You should create the table structure using the schemas provided on the schema/database.sql
file of BZStatCollector and the config/db/sessions-mysql.sql file on this repository.

Configuration
-----
There are 2 configuration files which you need to change: The first one is CollectorCLI/config.xml of BZStatCollector,
which should contain the details of the database you just created (don't forget to properly close the XML
tags - e.g: `<Database \>` should become `<Database>bzstats</Database>`). The second is config.example.php,
which you should copy under the name config.php, and update so it contains the details of the same database (both
on `$cfg['db']['default']` and `$cfg['db']['sessions']`).

Running
-----
You should configure your web server using the configuration samples for both Apache and Nginx provided on [README-BZSTATS](README-BZSTATS).
You should also keep BZStatCollector's Program.exe open at all times (it's possible to use `nohup ./Program.exe &` to do this
on linux).

Misc
=====

Reasons why a larger framework wasn't selected
-----
* Wanted clean IP
* Didn't want bloat (most framework that do all have lots of stuff a project like this will not need)
* Wanted custom controller logic that wasn't available in other frameworks (see Qore docs for controller processing logic)
* Wanted an easy entry point for new developers who may not know other frameworks - Qore is small and easy to get into
* Wanted something that was completely understood - no (or very few) "black magic" sections
* Wanted flexibility at the DB level (didn't want restrictions on naming table/models certain things in order to make it work)

The developer tools Quol uses
-----
* Local instance of Apache, PHP 5.3, MySQL, PostgreSQL, 
* Netbeans IDE (with PHP stuff and XDEBUG to breakpoint/step through code), HeidiMysql, Git, SVN (CLI and RapidSVN)
