node {
    checkout scm
    
    stage("Build") {
        withEnv([
            'DOCKER_HOST=tcp://docker:2376',
            'DOCKER_CERT_PATH=/certs/client',
            'DOCKER_TLS_VERIFY=1'
        ]) {
            docker.image('shippingdocker/php-composer:7.4').inside("--network jenkins") {
                sh 'if [ -f composer.lock ]; then rm composer.lock; fi'
                sh 'composer install'
            }
        }
    }
    
    stage("Test") {
        withEnv([
            'DOCKER_HOST=tcp://docker:2376',
            'DOCKER_CERT_PATH=/certs/client',
            'DOCKER_TLS_VERIFY=1'
        ]) {
            docker.image('ubuntu').inside("--network jenkins") {
                sh 'echo "Ini adalah test"'
            }
        }
    }

    stage("Deploy") {
        // Deploy ke env prod
        docker.image('agung3wi/alpine-rsync:1.1').inside('-u root') {
            sshagent (credentials: ['ssh-prod']) {
                sh 'mkdir -p ~/.ssh'
                sh 'ssh-keyscan -H "$PROD_HOST" > ~/.ssh/known_hosts'
                sh "rsync -rav --delete ./laravel/ ubuntu@$PROD_HOST:/home/ubuntu/prod.kelasdevops.xyz/ --exclude=.env --exclude=storage --exclude=.git"
            }
        }
    }
}
