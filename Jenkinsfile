node {
    checkout scm
    stage("Build") {
        withEnv([
            'DOCKER_HOST=tcp://docker:2376',
            'DOCKER_CERT_PATH=/certs/client',
            'DOCKER_TLS_VERIFY=1'
        ]) {
            docker.image('shippingdocker/php-composer:7.4').inside("--network=jenkins") {
                sh 'rm composer.lock'
                sh 'composer install'
            }
        }
    }
    stage("Test") {
        docker.image('ubuntu').inside("--network=jenkins") {
            sh 'echo "Ini adalah test"'
        }
    }
}
