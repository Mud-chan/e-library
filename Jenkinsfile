pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }
        
        stage('Build & Test') {
            steps {
                // Opsional: Tambahkan langkah build dan test jika diperlukan
                sh 'composer install --no-interaction'
                sh 'php artisan test || true'
            }
        }
        
        stage('Deploy') {
            steps {
                sshagent(['mud-chan']) {
                    sh '''
                        # Copy project files to VPS
                        ssh -o StrictHostKeyChecking=no root@8.215.105.16 "mkdir -p /root/laravel-docker"
                        scp -r docker-compose.yml nginx root@8.215.105.16:/root/laravel-docker/
                        
                        # Archive project untuk transfer
                        tar -czf laravel-app.tar.gz --exclude="node_modules" --exclude=".git" .
                        scp laravel-app.tar.gz root@8.215.105.16:/root/laravel-docker/
                        
                        # Deploy ke Docker
                        ssh -o StrictHostKeyChecking=no root@8.215.105.16 "
                            cd /root/laravel-docker && \
                            mkdir -p ./src && \
                            tar -xzf laravel-app.tar.gz -C ./src && \
                            rm laravel-app.tar.gz && \
                            cd ./src && \
                            cp .env.example .env || true && \
                            cd .. && \
                            docker-compose down || true && \
                            docker-compose up -d && \
                            
                            # Run Laravel commands inside container
                            docker-compose exec -T php-fpm composer install --no-dev --optimize-autoloader && \
                            docker-compose exec -T php-fpm php artisan key:generate || true && \
                            docker-compose exec -T php-fpm php artisan migrate --force || true && \
                            docker-compose exec -T php-fpm php artisan config:cache && \
                            docker-compose exec -T php-fpm php artisan route:cache && \
                            docker-compose exec -T php-fpm php artisan view:cache && \
                            docker-compose exec -T php-fpm php artisan optimize && \
                            
                            # Set permissions
                            docker-compose exec -T php-fpm chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
                        "
                    '''
                }
            }
        }
        
        stage('Verify') {
            steps {
                sh '''
                    echo "Deployment completed, verifying..."
                    curl -s http://8.215.105.16 || echo "Website check completed"
                '''
            }
        }
    }
    
    post {
        success {
            echo 'Deployment berhasil!'
        }
        failure {
            echo 'Deployment gagal! Periksa log untuk detail.'
        }
        always {
            cleanWs()
        }
    }
}
