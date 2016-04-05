ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'

VAGRANTFILE_API_VERSION = "2"

CURRENT_DIR = Dir.pwd

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|


    # config.vm.box = 'vinik/ubuntu'

    config.vm.define "db" do |db|
        db.vm.provider "docker" do |docker|
            docker.name = "brix_db"
            docker.image = "mysql"
            docker.remains_running = true
            docker.ports = [ "3306:3306" ]
            docker.volumes = [
                CURRENT_DIR + ":/root"
            ]
            docker.expose = [ 3306 ]
            docker.env = {
                "MYSQL_ROOT_PASSWORD" => "changeme"
            }
            docker.cmd = ["mysqld"]
        end

        db.vm.provider "virtualbox" do |virtualbox|
            virtualbox.name = "brix_db"
            virtualbox.memory = 512
            config.vm.synced_folder CURRENT_DIR, "/workspace"
        end

        db.vm.provision "shell", inline: "echo hello"
    end


    config.vm.define "web" do |web|

        web.vm.provider "docker" do |docker|
            docker.name = "brix_web"
            docker.build_dir = "."
            # docker.cmd = ["apachectl", "-D", "FOREGROUND"]
            # docker.image = "php:5.6-apache"
            docker.ports = [ "80:80" ]
            docker.privileged = true
            docker.link 'brix_db:brix_db'
            docker.volumes = [
            #    CURRENT_DIR + "/php:/var/www/html",
            #    CURRENT_DIR + "/php/vendor/phpunit/phpunit/PHPUnit:/var/www/html/vendors/PHPUnit",
                # CURRENT_DIR + "/vagrant.php.ini:/etc/php5/apache2/php.ini",
            #    "/tmp" + ":/var/www/html/app/tmp"
            ]
            docker.env = {
                'OPENSHIFT_MYSQL_DB_HOST' => 'brix_db',
                'OPENSHIFT_MYSQL_DB_PORT' => 3306,
                'OPENSHIFT_MYSQL_DB_USERNAME' => 'root',
                'OPENSHIFT_MYSQL_DB_PASSWORD' => 'changeme',
                'OPENSHIFT_GEAR_NAME' => 'brix'

            }
        end

        web.vm.provider "virtualbox" do |virtualbox|
            virtualbox.name = "brix_web"
            virtualbox.memory = 512
            config.vm.synced_folder CURRENT_DIR, "/workspace"
        end

        # web.vm.provision "shell", inline: "echo 'foo'"



    end

end
