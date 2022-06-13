# Wordsearch Read Me template
This is a document to help set standards for each template. Each template will use the following:

- NPM
- SASS
- GIT COMMANDS
- Knowledge of CLI

### Template installation
To install a template you need to first clone the repo into your local machine. Each repo will only have the _wp-content/theme/theme-folder_ in with the configuration to set up the theme, so you need to download this to a folder where you have an active install of WordPress. The .gitignore file should remove everything else from being added to the repo.

For the purpose of the Readme, we will always used the template starter as an example. For each repo, please use the correct repo address.

#### Clone Repo
Open Terminal (or equivalent) and navigate to the folder where you are going to set up wordpress for this install:
```
cd wordsearch/sites/
```
Cloning into this folder above will create a folder called 'template-starter', however you can adjust what you want to call this folder in the command line by using a folder name after:
```
git clone https://github.com/Wordsearch-Communications-LTD/template-starter.git new-project
cd new-project
```

This will automatically download the master branch of the project so we need to then checkout the development branch and pull all files:

```
git checkout development
git pull
```
Now copy and paste the WordPress install into this folder making sure to not overwrite the wp-content folder you have just cloned. 

#### If you already have a project and need to add to repo
If you have an existing project and just need to upload it to a designated repo, make sure you have the .gitignore in your root folder (copied from the template-starter repo) then use terminal to go into this folder and use the following commands (please replace the url with the repo address).

```
git init
git remote add origin https://github.com/Wordsearch-Communications-LTD/template-starter.git
git branch -M development
git push -u origin development
```

#### Setting up Template
As mentioned above, each template will run using NPM and SASS to compile CSS. Installing this will require you have node.js installed on your computer.

Within the root folder where you have cloned the repo, you will find the package.json file. This will have various [CHANGE ME] elements within this file. These will relate direclty to your template folder. So say for example the theme is called "Wordsearch", these need to be changed to match the theme folder. Once this has been changed and saved, type the following:

```
npm i -D autoprefixer browser-sync node-sass npm-run-all postcss-cli
```

This will install all the compilers for the css and browser sync so you can work locally
PLEASE NOTE: (this assumes your are using a local database server, DBengine and tablepress are great and free examples to use. Make sure the wp-config.php has the local database details in and npm will create a localurl for you.)

Once you have done this, we need to add a configuration to the Hosts file. THIS IS REALLY IMPORTANT. To do this on a Mac, we will open 
```
sudo vim /etc/hosts
```
It will ask you for your system passwrd. Enter this to view the file. 
Once in the file, you will need to add the line below. To insert into this you need to use the key "i". Navigate down past any # marks and paste:
```
127.0.0.1:7008 local.wordsearch.com
```
Because we are in sudo (or admin mode) we are able to write this file. To save, press "esc" followed by
```
:w
:q
```

We then need to restart Apache on your computer

```
sudo apachectl restart
```

Once this is all done, you should now be able to serve the site!

Please note: the above steps will act as a local server proxy. you will then be able to navigate to local.wordsearch.com and see your site once you use ``` npm run dev``` however, this will open the browser for you and sync any changes automatically.

###IMPORTANT
If you chose to rename your template (from starter-temp) you will need to update the package.json file with your new folder name in the scripts section. Once this has been done, delete "node_modules" folder and run the following command again before running the site again:


```
npm i -D autoprefixer browser-sync node-sass npm-run-all postcss-cli
```
-------

To run the site, type:
```
npm run dev
```
This will watch for any changes made to the SCSS files and compile them to a main SCSS file

### Database
Set your database up locally using the SQL from the _dev folder. 

Wordpress admin

username: admin_starter
password: demo123

# !!NO CHANGES TO BE MADE DIRECTLY TO THE .css FILE DIRECTLY!!
Any changes made directly to any of the .css files will be overwritten by the compilers. All CSS needs to be in the .scss files.

### Create another repo
Create another repo for your new template. Only ever push to this repo if changes need to be made to the template starter. 

Change the URL to the repo by following the instructions once you have set up the repo

### Using the Template

The template is set up using modules on flexible content. These are all residing in templates/components. They are then controlled in the ACF field Groups.

These are a starting point and all the modules can be found on the home page on the initial set up

To amend the styling, with npm run dev running, changes to the style are made in the scss files. This will automatically compile the css files directly.

