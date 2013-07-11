This is the main README file for the BZFlag GameStats/Bzstats site

This Bzstats site is built on the Qore framework, which was built for this site.

The Qore framework is meant to be simple, small, and easily extendable so that third party
components can be easily snapped in, and used. For more info, please see the docs directory.

BzStats itself is in the early stages, and will get better with time. 
If you have any recommendations, please see Quol on #bzflag on IRC (Freenode).

ToDos
-----
* DateTime fixes (everything server side should be GMT - Quol is working on it..)

Feature Requests
-----
* Pagination where it makes sense
* Translations/preferences to show preferred language
* Bzflag authentication (Quol is working on it..porting it over from previous work..)

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