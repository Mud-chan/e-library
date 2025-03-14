node {
    checkout scm

    // Deploy env dev
    stage("Build") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'composer install --no-interaction --prefer-dist'
        }
    }

    // Database Migration
    stage("Database Migration") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php artisan migrate --force'
        }
    }

    // Testing
    stage("Testing") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php artisan test'
        }
    }
}
