#!/bin/bash -eux

docker exec brix_db mysql -uroot -pchangeme -e 'DROP DATABASE IF EXISTS brix;'
docker exec brix_db mysql -uroot -pchangeme -e 'CREATE DATABASE brix;'

docker exec brix_db mysql -uroot -pchangeme -e 'DROP DATABASE IF EXISTS test_brix;'
docker exec brix_db mysql -uroot -pchangeme -e 'CREATE DATABASE test_brix;'

docker exec brix_db chmod 777 /vagrant/vagrant/db/init.sql

docker exec brix_db sh -c 'mysql -uroot -pchangeme brix < /vagrant/vagrant/db/init.sql'
docker exec brix_db sh -c 'mysql -uroot -pchangeme test_brix < /vagrant/vagrant/db/init.sql'
