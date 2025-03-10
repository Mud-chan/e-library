node {
    checkout scm // Mengambil kode dari repository Git

    // Stage Build
    stage("Build") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'composer install --no-interaction --prefer-dist --optimize-autoloader'
        }
    }

    // Stage Migrate Database
    stage("Migrate Database") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php artisan migrate --force'
        }
    }

    // Stage Testing
    stage("Testing") {
        docker.image('php:8.2-cli').inside('-u root') {
            sh 'php artisan test' // Laravel testing
        }
    }
}
