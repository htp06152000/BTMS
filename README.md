# X-Framework

**X-Framework** is a simple PHP tool for beginners.

By default it has a _User Management Module_ where you can test/perform CRUD operations.

It consists of the following files:
- **_.htaccess_** file for server configurations
- **_db-config.php_** - for database configurations/connectivity
- **_functions.php_** - for custom functions
- **_index.php_** - the index file (db-config.php and functions.php is already included here - no need to take action)

And four folders:
1. actions - this is where all page actions is located (CRUD Operations)
2. layout - this includes the layout elements (header, footer, sidebar, etc.)
3. pages - this is where you add your pages
4. resources - all resources like css, javascripts, images are added in this folder

Note, this tool uses the following libraries via CDN (you can localize it if you want):
1. **Twitter Bootstrap** (4.6.0) - User Interface
2. **Font Awesome** (6.1.1) - Icons
3. **Animate CSS** (4.1.1) - Animations
4. **jQuery** (3.6.0) - DOM Manipulations


To get started, follow the steps below: 
1. Create your database and connect it via **dcb-onfig.php**
2. Import **btms7.sql** to your database
3. Test login - the default username & password is **_admin_**

**Note:** Table and data generated via _btms7.sql_ is for testing purposes only, please change it with your actual DB Structure.
