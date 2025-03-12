pipeline {
    agent any

    stages {
        stage("Checkout") {
            steps {
                checkout scm
            }
        }

        stage("Build") {
            steps {
                script {
                    docker.image('shippingdocker/php-composer:7.4').inside('-u root') {
                        sh 'rm composer.lock'
                        sh 'composer install'
                    }
                }
            }
        }

        stage("Testing") {
            steps {
                script {
                    docker.image('ubuntu').inside('-u root') {
                        sh 'echo "Ini adalah test"'
                    }
                }
            }
        }
    }
}
