# Installation 

### Proxy
```cmd
SET HTTP_PROXY=http://10.118.1.254:3128
SET HTTPS_PROXY=http://10.118.1.254:3128
```
* On met le proxy dans le terminal

## Commandes Vagrant

### Installations des plugins
```vagrant
vagrant plugin install vagrant-proxyconf
```
* On installe le plugin gérant la configuration proxy

```vagrant
vagrant plugin install vagrant-vbguest --plugin-version 0.21
```
* On installe les additions d'invitées

```vagrant
vagrant init debian/buster64
```
* On initialise le fichier `VagrantFile` depuis le *VagrantStore*

## VagrantFile

* Dans le fichier ***VagrantFile***, ligne `26` & `27`
```ruby
  config.vm.network "forwarded_port", guest: 80, host: 80
  config.vm.network "forwarded_port", guest: 3306, host: 3306
```

* Dans le fichier ***VagrantFile***, line `16` & `17`
```ruby
  config.proxy.http     = "http://10.118.1.254:3128/"
  config.proxy.https    = "http://10.118.1.254:3128/"
```

## Connexion
```vagrant
vagrant up
```

* On allume la machine, <br>
  Si l'on a un proxy, par défaut apt-get générera une erreur :
  > Failed to fetch ...:... Cannot initiate the connection ... (...) <br>
  > ... <br> ... <br> ... <br>
  > E: Unable to fetch some archives, maybe run apt-get update or try with --fix-missing?

---

```vagrant
vagrant ssh
```
* on établit la connexion `SSH`

# Paramétrage de la vm

## Proxy apt-get
```bash
sudo nano /etc/apt/apt.conf
```
* On ouvre le fichier de configuration de apt-get, et on rajoute le proxy :
> Acquire::http::Proxy "http://10.118.1.254:3128"; <br>
> Acquire::http::Proxy "http://10.118.1.254:3128";
* On sauvegarde

---

```bash
sudo apt-get update
```
* mise à jour du système

## Apache

### Installation Apache

```bash
sudo apt-get install apache2 -y
```
* On installe apache

### Configuration du dossier racine
```bash
sudo nano /etc/apache2/sites-enabled/000-default.conf
```
* ligne `3`: 
> DocumentRoot /var/app/

### Ajout du dossier partagé

```sudo
sudo mkdir /var/app
```
* on créer un fichier pour stocker notre projet

```bash
exit
```

* On edite la *VagrantFile*, ligne 47
> config.vm.synced_folder "build", "/var/app"
---

```vagrant
vgarant reload
```
* On relance la machine
---