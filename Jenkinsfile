
pipeline {
    agent any
    environment {
        APP_DIR = "/opt/elibrary"
        LARAVEL_CONTAINER = "laravel-app"
    }
    stages {
        stage('Checkout') {
            steps {
                // Checkout code dari repository
                git branch: 'main', url: 'https://github.com/Mud-chan/e-library.git'
            }
        }
        
        stage('Copy to Laravel Folder') {
            steps {
                // Hapus isi folder dan salin kode baru
                sh '''
                rm -rf ${APP_DIR}/*
                cp -r . ${APP_DIR}
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                // Install dependencies dan jalankan migrasi
                sh '''
                echo "Installing composer dependencies..."
                docker exec -i ${LARAVEL_CONTAINER} composer install --no-interaction --no-progress
                
                echo "Running database migrations..."
                docker exec -i ${LARAVEL_CONTAINER} php artisan migrate --force
                '''
            }
        }
        
        stage('Cache Configuration') {
            steps {
                // Optimalkan Laravel dengan cache
                sh '''
                echo "Optimizing Laravel application..."
                docker exec -i ${LARAVEL_CONTAINER} php artisan config:cache
                docker exec -i ${LARAVEL_CONTAINER} php artisan route:cache
                docker exec -i ${LARAVEL_CONTAINER} php artisan view:cache
                '''
            }
        }
        
        stage('Set Permissions') {
            steps {
                // Set permission yang benar
                sh '''
                echo "Setting correct permissions..."
                docker exec -i ${LARAVEL_CONTAINER} chown -R www-data:www-data storage bootstrap/cache
                docker exec -i ${LARAVEL_CONTAINER} chmod -R 775 storage bootstrap/cache
                '''
            }
        }
        
        stage('Restart Application') {
            steps {
                // Restart container untuk menerapkan perubahan
                sh 'docker restart ${LARAVEL_CONTAINER}'
                echo "Deployment completed successfully!"
            }
        }
    }
    
    post {
        success {
            echo "Pipeline executed successfully!"
        }
        failure {
            echo "Pipeline failed. Please check the logs for details."
        }
    }
}
