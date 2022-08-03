# Laravel 9 starter kit with Bootstrap 4,API Multi Auth and some package that provide you to build website more faster.

Please let me know your feedback and comments.

**Laravel 9.x requires a minimum PHP version of 8.1.** for more information visit -  https://laravel.com/docs/9.x/releases

# Demo
Check the following demo project. It is just a straight installation of the project without any modification.

Demo URL: rahuljat.in

```
User: rahuljat@firsteconomy.com
Pass: 12345678
```

For additional demo data you may use the following command. By using this you can  update the `posts,setting,user` table and insert new demo data. `--fresh` option will truncate the tables, without this command new set to data will be inserted only.

### Installation Instructions
Run
```
git clone https://github.com/coderahuljat/laravel-9-starter-kit.git
```
From the projects root run 
```
cp .env.example .env
```
Configure your `.env` file
```
composer install
```
```
php artisan migrate:fresh --seed
```
Clear All Cache:
```
 php artisan optimize:clear
```

Link storage directory:
```
 php artisan storage:link
```
You may create a virtualhost entry to access the application or run `php artisan serve` from the project root and visit `http://127.0.0.1:8000`


##### Seeded Users

|Email|Password|Access|
|:------------|:------------|:------------|
|rahuljat@firsteconomy.com|12345678|Admin Access|

# Features

The `Laravel Starter` comes with a number of features which are the most common in almost all the applications. It is a template project which means it is intended to build in a way that it can be used for other projects.

It is a modular application, and a number of modules are installed by default. It will be helpful to use it as a base for the future applications.

* Admin feature and public views are completely separated as `Backend` and `Frontend` namespace.
* Major feature are developed as `Modules`. Module like Posts, Comments, Tags are separated from the core features like User, Role, Permission


## Core Features

* User Authentication with API
* Setting
* User Profile with Avatar
  * Separate User Profile table
* Role-Permissions for Users
* Policies

* Backend Theme
  * Admin LTE
  * All Fontawesome available
* Frontend Theme
  * Bootstrap 4, Impact Design Kit
  * Fontawesome 5
* Article Module
  * Posts
* Application Settings
* External Libraries
  * bootstrap4
  * bootstrap-colorpicker
  * bootstrap-slider
  * bootstrap-switch
  * bootstrap4-duallistbox
  * bs-custom-file-input
  * bs-stepper
  * chart.js
  * codemirror
  * datatables
  * datatables-autofill
  * datatables-bs4
  * datatables-buttons
  * datatables-colreorder
  * datatables-fixedcolumns
  * datatables-fixedheader
  * datatables-keytable
  * datatables-responsive
  * datatables-rowgroup
  * datatables-rowreorder
  * datatables-scroller
  * datatables-searchbuilder
  * datatables-searchpanes
  * datatables-select
  * datepicker
  * daterangepicker
  * dropzone
  * ekko-lightbox
  * fastclick
  * filterizr
  * flag-icon-css
  * flot
  * fontawesome-free
  * fullcalendar
  * icheck-bootstrap
  * inputmask
  * ion-rangeslider
  * jquery
  * jquery-knob
  * jquery-mapael
  * jquery-mousewheel
  * jquery-ui
  * jquery-validation
  * jqvmap
  * jsgrid
  * jszip
  * moment
  * overlayScrollbars
  * pace-progress
  * pdfmake
  * popper
  * raphael
  * select2
  * select2-bootstrap4-theme
  * sparklines
  * summernote
  * sweetalert2
  * sweetalert2-theme-bootstrap-4
  * tempusdominus-bootstrap-4
  * toastr
  * uplot
  * Multiselect
  * Sweet Alert
  * Date Time Picker
  * DatePicke
* Log Viewer
* Notification
  * Dashboard and details view
## Icons
FontAwesome & CoreUI Icons, two different font icon library is installed for the Backend theme and only FontAwesome for the Frontend. For both of the cases we used the free version. You may install the pro version separately for your own project.

* **FontAwesome** - https://fontawesome.com/icons?d=gallery&m=free



# Reporting a Vulnerability
If you discover any security related issues, please send an e-mail to Rahul Jat via imrjat@gmail.com instead of using the issue tracker.
