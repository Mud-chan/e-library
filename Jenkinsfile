node {
    checkout scm
    stage("Build") {
        docker.image('shippingdocker/php-composer:7.4').inside("--network jenkins") {
            sh 'if [ -f composer.lock ]; then rm composer.lock; fi'
            sh 'composer install'
        }
    }
    stage("Test") {
        docker.image('ubuntu').inside("--network jenkins") {
            sh 'echo "Ini adalah test"'
        }
    }
}
