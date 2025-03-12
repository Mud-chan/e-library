pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                // Install dependencies
                sh 'composer install --no-dev --optimize-autoloader'

                // Environment setup
                sh 'cp .env.example .env'
                sh 'php artisan key:generate'

                // Prepare for production
                sh 'php artisan config:cache'
                sh 'php artisan route:cache'
                sh 'php artisan view:cache'
                sh 'npm ci'
                sh 'npm run build'
            }
        }

        stage('Test') {
            steps {
                // Run Laravel tests
                sh 'php artisan test --env=testing'
            }
        }

        stage('Deploy') {
            steps {
                // Using SSH to deploy to VPS
                sshagent(['mud-chan']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no root@8.215.105.16 "cd /var/www/laravel && \
                        git pull origin main && \
                        composer install --no-dev --optimize-autoloader && \
                        php artisan migrate --force && \
                        php artisan config:cache && \
                        php artisan route:cache && \
                        php artisan view:cache && \
                        php artisan optimize && \
                        chown -R www-data:www-data /var/www/laravel && \
                        find /var/www/laravel -type f -exec chmod 644 {} \\; && \
                        find /var/www/laravel -type d -exec chmod 755 {} \\; && \
                        chmod -R 775 /var/www/laravel/storage /var/www/laravel/bootstrap/cache && \
                        systemctl restart php8.2-fpm && \
                        systemctl restart nginx"
                    '''
                }
            }
        }

        stage('Verify Deployment') {
            steps {
                // Verify the deployment is working
                sh 'curl -s http://8.215.105.16:8900/api/health-check | grep "ok"'
            }
        }
    }

    post {
        success {
            echo 'Deployment berhasil!'
        }
        failure {
            echo 'Deployment gagal!'
        }
        always {
            // Clean up workspace
            cleanWs()
        }
    }
}