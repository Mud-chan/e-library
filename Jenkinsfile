pipeline {
    agent any

    environment {
        APP_DIR = "/opt/elibrary"
    }

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/Mud-chan/e-library.git'
            }
        }

        stage('Copy to Laravel Folder') {
            steps {
                sh '''
                rm -rf ${APP_DIR}/*
                cp -r . ${APP_DIR}
                '''
            }
        }

        stage('Install Dependencies') {
            steps {
                sh '''
                docker exec -i laravel-app composer install
                docker exec -i laravel-app php artisan migrate --force
                '''
            }
        }

        stage('Permissions') {
            steps {
                sh '''
                docker exec -i laravel-app chown -R www-data:www-data storage bootstrap/cache
                docker exec -i laravel-app chmod -R 775 storage bootstrap/cache
                '''
            }
        }
    }
}
