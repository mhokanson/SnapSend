# SnapSend
A small webapp for taking a picture with a mobile device and, utilizing a server, emailing that photo to someone without storing the photo in the device's photo roll.

## Getting Started
### Requirements
This project assumes you already have a working PHP server with the PHPMailer plugin configured to use your mail relay.

### Installing
1) To install this webapp just put the index.html, sendInfo.php, and uploads folder in a folder managed by a web server (IIS, Apache, etc.) that can be accessed from a browser.
2) You need to update the email addresses in sendInfo.php to send to valid email addresses.

*Optional - You can replace the Icon.png with your own logo. The logo was provided to make saving the website as a WebClip/Favorite more recognizable on mobile devices.

## Built with 
This project uses the Webix javascript framework, along with the PHPMailer plugin on the server. It was attempted to place other sources in comments, though some were missed..