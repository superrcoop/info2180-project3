`CheapoMail`
============


Description
-------------

`CheapoMail` provides a simple messaging system that only sends mail to other CheapoMail users.


Features
---------

**Adding a user**
Users can only be added by an administrator, there is no feature for new users to self-sign up. An administrator logs in and completes the new user form. 

**User login**
The system keeps track of the user using PHP sessions. Once logged in they are presented with the Home Screen which shows their recent messages which they can read and allows them to compose new messages.

**User logout**
There is a logout link/button which a user may click in order to logout of the system. 

**Home Screen**
The home screen allows a logged in user to see their 10 most recent messages. The list of messages should display the senders username, subject and date sent. There should also be a link/button to compose a new message.

**Compose and send a message**
The compose message screen includes a form with "recipients", "subject" and "body" input fields. Once a message is completed the logged in user can click the send button to make the message go to all recipients (please use commas "," to separate recipients). Also ensure the input fields are validated and that user inputs are escaped and sanitized.

**Receive and read a message**
Each recipient of the message should see only messages sent to them on their home
screen. Messages that have not been read are to be bold. When a message is clicked it will open and show the details of the message. These details should include the first and last name of the sender, the subject of the message, the body of the message and the date it was sent. The message opened is immediately "flagged" as being read and should no longer be bold on the home screen.

**No Page Refreshes**
Implemented an AJAX based approach to loading new content into the browser


Getting Started
----------------

This app requires the [PHP](http://php.net) and [MySQL](https://www.mysql.com). For development [Cloud9](https://c9.io)

Clone the repository
`$ git clone https://github.com/{username}/info2180-project3`

Go into the repository
`$ cd info2180-project3`

Using c9:
- Create a Cloud9 workspace
- Enter your git repo clone URL
- Select PHP,Apache & MySQL template

Setting up the database
`$ mysql-ctl start`

`$ mysql-ctl cli`

Load the database
`>source schema.sql`

`>USE schema.sql`

MySQL in PHP-You can do this by clinking **Run Project** at the top of the Cloud9 interface or from your terminal:
`$ apachectl start`

Follow link to view work:
`https://{workspace}-{username}.c9users.io/index.php`


Contributors:
-------------

- [Jordan Cooper](http://jordancooper.me/)
- Ramone Mc
- Khadejah Hylton
- Akeam