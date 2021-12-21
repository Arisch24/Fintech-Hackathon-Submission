# Fintech Hackathon Submission

This is a submission for my hackathon project. The title is to create an innovative fintech product. My submission is incomplete but is able to run.
___

### Requirements
* Have xampp on local machine. Get it here: [Xampp](https://www.apachefriends.org/download.html)
* A `HCK.p12` file which contains a private certificate and private key. You can get it from [Finexus Group](https://www.finexusgroup.com/myxaas/)
*Note: you need to have an account.*
* Extract the `HCK.p12` file using the command in terminal
```
openssl pkcs12 -in mycert.p12 -out file.key.pem -nocerts -nodes
openssl pkcs12 -in mycert.p12 -out file.crt.pem -clcerts -nokeys
```
___
### Steps
1. Open `Xampp`.
2. Click Start for `Apache` and `MYSQL`.
3. Open your browser and navigate to [http://localhost/Hackathon/home/index.php](http://localhost/Hackathon/home/index.php).
4. That's it the project is running.