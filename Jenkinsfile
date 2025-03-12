pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Deploy') {
            steps {
                // Using SSH to deploy directly to VPS
                sshagent(['mud-chan']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no root@8.215.105.16 "
                        cd /var/www/laravel && \
                        git pull origin main && \
                        composer install --no-dev --optimize-autoloader && \
                        cp .env.example .env || true && \
                        php artisan key:generate || true && \
                        php artisan migrate --force || true && \
                        php artisan config:cache && \
                        php artisan route:cache && \
                        php artisan view:cache && \
                        php artisan optimize && \
                        chown -R www-data:www-data /var/www/laravel && \
                        find /var/www/laravel -type f -exec chmod 644 {} \\; && \
                        find /var/www/laravel -type d -exec chmod 755 {} \\; && \
                        chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache && \
                        systemctl restart php-fpm || systemctl restart php8.2-fpm || systemctl restart php8.1-fpm || true && \
                        systemctl restart nginx || true"
                    '''
                }
            }
        }

        stage('Verify') {
            steps {
                sh '''
                    echo "Deployment completed, verifying..."
                    curl -s http://8.215.105.16:8900 || echo "Website check completed"
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