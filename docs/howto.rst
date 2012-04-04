Introduction
============

This script is designed to allow someone with little knowledge of scripting,
but some knowledge of html to create an email "contact" form.  When designing
this script, I had 2 major goals.

1. Little-to-no configuration.
------------------------------

The only necessary configuration in the script is to set your email
address you would like to receive the emails at.  There are other
configuration options if you would like to have extra features (like a
redirect page or captcha spam protection) but you CAN just set your email
address in the config(config.php), point your form to the script 
(<form action='./process.php'>) and it will send you all data from the
sctipt in an email.emails.

2. Compatability
----------------

I wanted this script to be compatible with as many servers as possible
with out having to make any server side settings.  This is why I wrote 
it in php, instead of python.  With most hosts, you will already have
php and sendmail installed, configured and ready to go.

The basic setup
===============

With the most basic setup, you get a script that accepts a form action by the
POST method and then send the information using a template you create to form
the email data how you would like it.

Building the form html
----------------------

In order to have a form on your site, you must add the form to one of your html
pages.  This can be done just by editing the html page with a text editor, or 
by most webbuilding softwares by adding the form fields.  If you use a site
building software, you may still need to edit the html code by hand, so I'll
breifly go over the html tags used to build the form and what they do.

There are 2 basic html tags used when building a form.

1. <form></form> tag
~~~~~~~~~~~~~~~~~~~~

All <input> tags (we'll talk about those next) must go between the <form> and 
</form> tags in your html code.  The <form> tag also contains some info 
