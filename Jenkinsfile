pipeline {
    agent {
        dockerfile true
    }
    stages {
        stage("Build") {
            steps {
                sh 'php --version'
                sh 'composer install'
                sh 'composer --version'
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'
            }
        }
        stage("Unit test") {
            steps {
                script {
                    docker.image('mysql:5.7').withRun('-e "MYSQL_DATABASE=testing" -e "MYSQL_ROOT_PASSWORD=root"') { c ->
                        docker.image('mysql:5').inside("--link ${c.id}:db") {
                            /* Wait until mysql service is up */
                            sh 'while ! mysqladmin ping -hdb --silent; do sleep 1; done'
                        }
                        sh "./vendor/bin/phpunit"
                    }
                }
            }
        }
    }
}
