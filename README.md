# Johanlopes.fr

## Development

> Note: The `$` stands for your machine CLI, while the `⇒` stands for the VM CLI

### Requirements

* [Vagrant 1.7.2+](http://www.vagrantup.com/downloads.html)
* [VirtualBox 4.3.28+](https://www.virtualbox.org/wiki/Downloads)
* [Ansible 1.9.2+](http://docs.ansible.com/intro_installation.html)
* [Vagrant Landrush 0.18.0+](https://github.com/phinze/landrush) or [Vagrant Host Manager plugin 1.5.0+](https://github.com/smdahlen/vagrant-hostmanager)

### Setup

Clone the project in your workspace, and launch setup

    $ make setup

You should access the project via http://johanlopes.dev/app_dev.php

### Usage

Launch vagrant box, and ssh into it

    $ vagrant up
    $ vagrant ssh

Build assets

    ⇒ gulp

Enable/Disable php xdebug

    ⇒ elao_php_xdebug [on|off]

* *Supervisor*: http://{{ app_host }}.dev:9001
* *Mailcatcher*: http://{{ app_host }}.dev:1080
* *Log.io*: http://{{ app_host }}.dev:28778
* *phpMyAdmin*: http://{{ app_host }}.dev:1979

## Deployment

### Requirements

* [Capifony 2.8.2+ < 3.0.0](http://capifony.org/)

### Usage

    $ cap demo deploy

### SSH local configuration

Going to demo/production means to have a proper ssh local configuration (as following) for both environments (Beware of the declaration order)

in ~/.ssh/config

```
# Infra demo ELAO
Host *.elao.ninja.local
        User                    deploy
        IdentityFile            ~/.ssh/elao
        ForwardAgent            yes
        ProxyCommand            ssh gateway@hv-1.elao.ninja "nc %h %p"
        StrictHostKeyChecking   no
        HashKnownHosts          no

# Infra prod ELAO
Host *.elao.local
        ForwardAgent            yes
        IdentityFile            ~/.ssh/elao
        ProxyCommand            ssh gateway@sting.elao.com "nc %h %p"
        StrictHostKeyChecking   no
        HashKnownHosts          no
```
