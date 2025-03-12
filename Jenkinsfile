node {
    checkout scm
    
    stage("Build") {
        // Gunakan Docker dari host langsung tanpa TLS
        docker.withServer('unix:///var/run/docker.sock') {
            docker.image('shippingdocker/php-composer:7.4').inside("--network jenkins") {
                sh 'if [ -f composer.lock ]; then rm composer.lock; fi'
                sh 'composer install'
            }
        }
    }
    
    stage("Test") {
        // Gunakan Docker dari host langsung tanpa TLS
        docker.withServer('unix:///var/run/docker.sock') {
            docker.image('ubuntu').inside("--network jenkins") {
                sh 'echo "Ini adalah test"'
            }
        }
    }
}
