pipeline {
    agent any
    environment {
        WORKSPACE_DIR = "${env.WORKSPACE}"
        LARAVEL_CONTAINER = "laravel-app"
        TARGET_DIR = "/var/www/html"  // Direktori di dalam container Laravel
    }
    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/Mud-chan/e-library.git'
            }
        }
        
        stage('Copy to Laravel Container') {
            steps {
                // Salin kode langsung ke container Laravel
                sh '''
                # Buat tar dari workspace
                tar -czf /tmp/laravel-app.tar.gz -C ${WORKSPACE_DIR} .
                
                # Salin tar ke container dan ekstrak
                docker cp /tmp/laravel-app.tar.gz ${LARAVEL_CONTAINER}:${TARGET_DIR}/laravel-app.tar.gz
                docker exec -i ${LARAVEL_CONTAINER} bash -c "cd ${TARGET_DIR} && tar -xzf laravel-app.tar.gz && rm laravel-app.tar.gz"
                
                # Bersihkan
                rm /tmp/laravel-app.tar.gz
                '''
            }
        }
        
        stage('Install Dependencies') {
            steps {
                sh '''
                docker exec -i ${LARAVEL_CONTAINER} composer install --no-interaction --no-progress
                docker exec -i ${LARAVEL_CONTAINER} php artisan migrate --force
                '''
            }
        }
        
        stage('Cache Configuration') {
            steps {
                sh '''
                docker exec -i ${LARAVEL_CONTAINER} php artisan config:cache
                docker exec -i ${LARAVEL_CONTAINER} php artisan route:cache
                docker exec -i ${LARAVEL_CONTAINER} php artisan view:cache
                '''
            }
        }
        
        stage('Set Permissions') {
            steps {
                sh '''
                docker exec -i ${LARAVEL_CONTAINER} chown -R www-data:www-data storage bootstrap/cache
                docker exec -i ${LARAVEL_CONTAINER} chmod -R 775 storage bootstrap/cache
                '''
            }
        }
        
        stage('Restart Application') {
            steps {
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
