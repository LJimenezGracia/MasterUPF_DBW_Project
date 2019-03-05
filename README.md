# MasterUPF_DBW_Project

## PrimerSTOCK

PrimerSTOCK is a new web application that provides a personalized and dynamic primer database for private laboratory use, allowing a quick and effective primer search.

## Getting Started

As PrimerSTOCK has been designed as a web application, you can get a copy of the project and run it on your local machine for development and testing purposes, but to use it among different laboratories and several users you will need to upload the project to a server linked to a web page domain.

### Prerequisites

To be able to run the whole project, you must have installed the following softwares:

* Apache Web Server (v. 2.x), with PHP 5.x and mysql support

* MYSQL server (v. 5.x)

* MYSQL Workbench or phpMyAdmin

* Blast (v. 2.7.1), from National Center for Biotechnology Information (NCBI)

Ideally work with **Linux** (Ubuntu, Debian, and others) as you might need root privileges, but you can also work with **MacOS**. Please, take into account that MacOS has already installed some of the needed softwares.

### Installing

You can download all the project information from any of the authors GitHub accounts to your computer, for instance:

```
$ git clone https://github.com/LJimenezGracia/MasterUPF_DBW_Project
```

Now, you can proceed to build the required database model. You first need access your MYSQL (server based or own computer), and create a database called 'primerstock_db'.

```
CREATE database primerstock_db;
```
Later on, you will be able to upload the PrimerSTOCK data model script (OurDB_final.sql) from your terminal to the MYSQL.

```
$ sudo mysql -u root -p primerstock_db < PATH/OurDB_final.sql
``` 

Once the datamodel has been created, you can upload all the remaining files and directories to the working server or, alternatively, to your localhost.


## Running PrimerSTOCK

Before start working with primer stock, you must modify the connection file (connection.php), which contains the information that will allow the web connecting to the database model built in MYSQL. In that file, you should check you have properly defined the following fields according to you: host, user, password, and database name. Otherwise, it will not work.


## Programming languages used

* PHP
* JavaScript
* CSS
* HTML
* Hack

## Authors

PrimerSTOCK is a web application created by a group of four students from Pompeu Fabra  University (UPF) of Barcelona during their Master's degree subject Databases and Web Development.

* **Carla Castignani**. BSc in Human Biology at Pompeu Fabra University.
    * [Linkedin](https://www.linkedin.com/in/carla-castignani-viladomiu-a34202171/)
    * [Github](https://github.com/ccastignani)  
    * carla.castignani@gmail.com 

* **Laura Jiménez**. BSc in Biomedical Sciences at University of Barcelona.
    * [Linkedin](https://www.linkedin.com/in/ljimenezgracia/)  
    * [Github](https://github.com/LJimenezGracia) 
    * laurajimenez2095@gmail.com 

* **Alda Sabalić**. BSc in Physics at University of Zagreb.
    * [Linkedin](https://www.linkedin.com/in/alda-sabalic/) 
    * [Github](https://github.com/AldaSabalic)   
    * alda.sabalic@gmail.com 

* **Beatriz Urda**. BSc in Biochemistry at University of Granada.
    * [Linkedin](https://www.linkedin.com/in/beatriz-urda-a55864a9/)
    * [Github](https://github.com/bzuaga)  
    * beatriz.urda.g@gmail.com 

### Supervisor
* **Prof. Dr. Josep Lluis Gelpí**. Department of Biochemistry and Molecular Biomedicine, University of Barcelona (UB), Computational Bioinformatics Node of Instituto Nacional de Bioinformática (INB) and Barcelona Supercomputing Centre (BSC), Barcelona (Spain).
    * Group webpage: http://mmb.pcb.ub.es/www/ 
    * Contact email: gelpi@ub.edu 

### Collaborators

We want to specially thank some researchers that provided us some tips in our first steps:
* **PhD. Oriol Gallego Moli**. Department of Experimental and Health Sciences (DCEXS) and Pompeu Fabra University (UPF), Barcelona (Spain)
    * Group webpage: http://gallegolab.org/
    * Contact email: oriol.gallego@upf.edu 

* **PhD Student. Aitor Blanco-Míguez**. Department of Computer Science of University of Vigo (UVIGO), Vigo (Spain)
    * Group webpage: http://www.sing-group.org
    * Contact email: aiblanco@uvigo.es 
